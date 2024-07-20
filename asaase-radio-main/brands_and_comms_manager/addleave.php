<?php
session_start();
include('../connection.php');
include('includes/auth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Fetch form data
  $employee_id = $_SESSION['employee_id']; // Assuming employee ID is stored in session
  $reason = $_POST['reason'] ?? null;
  $date_from = $_POST['date_start'] ?? null;
  $date_to = $_POST['date_end'] ?? null;
  $leave_status = 'Pending'; // Default status
  $archive_leave = 'No'; // Default archive status
  $applied_date = date('Y-m-d');

  // Ensure all required fields are filled
  if ($employee_id && $reason && $date_from && $date_to) {
    // Function to check if a date is a weekend
    function isWeekend($date)
    {
      $day = date('w', strtotime($date));
      return ($day == 0 || $day == 6);
    }

    // Array of holidays (in YYYY-MM-DD format)
    $holidays = [
      "2024-01-01", "2024-01-07", "2024-03-06", "2024-03-29",
      "2024-04-01", "2024-05-01", "2024-08-04", "2024-09-21",
      "2024-12-06", "2024-12-25", "2024-12-26"
    ];

    // Function to check if a date is a holiday
    function isHoliday($date, $holidays)
    {
      return in_array($date, $holidays);
    }

    // Calculate working days
    $currentDate = strtotime($date_from);
    $endDate = strtotime($date_to);
    $workingDays = 0;

    while ($currentDate <= $endDate) {
      $currentDateFormatted = date('Y-m-d', $currentDate);
      if (!isWeekend($currentDateFormatted) && !isHoliday($currentDateFormatted, $holidays)) {
        $workingDays++;
      }
      $currentDate = strtotime('+1 day', $currentDate);
    }

    // Fetch the remaining leave days and role for the employee
    $result = mysqli_query($dbcon, "SELECT remaining_leave_days, leave_limit FROM employee WHERE employee_id = '$employee_id'");
    $employee = mysqli_fetch_assoc($result);
    $remaining_leave_days = $employee['remaining_leave_days'];
    $leave_limit = $employee['leave_limit'];

    if ($workingDays > $remaining_leave_days || $workingDays > $leave_limit) {
      echo "<script>alert('Error: You can only request up to $remaining_leave_days leave days.'); window.location.href='addleave.php';</script>";
    } else {
      // Insert the leave request
      $query = "INSERT INTO employee_leave (employee_id, leave_status, applied_date, reason, date_from, date_to, days_requested, archive_leave)
                      VALUES ('$employee_id', '$leave_status', '$applied_date', '$reason', '$date_from', '$date_to', '$workingDays', '$archive_leave')";
      if (mysqli_query($dbcon, $query)) {
        echo "<script>alert('Leave request submitted successfully. Please wait for approval.'); window.location.href='addleave.php';</script>";
      } else {
        $error_message = mysqli_error($dbcon);
        echo "<script>alert('Error: $error_message'); window.location.href='addleave.php';</script>";
      }
    }
  } else {
    echo "<script>alert('Error: Please fill in all required fields.'); window.location.href='addleave.php';</script>";
  }
}
?>





<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asaase Radio || Employees Leave</title>
  <!-- CSS Links-->
  <?php include("../includes/includes_css.php"); ?>
  <!-- Js Scripts-->
  <?php include("../includes/includes_js.php"); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
</head>

<body class="has-background-light">
  <div class="columns">
    <?php include('includes/sidebar.php'); ?>
    <div class="column is-10 has-background-light" id="main">
      <?php include('includes/navbar.php'); ?>
      <nav class="breadcrumb p-3" aria-label="breadcrumbs">
        <ul>
          <li><a href="dashboard.php"><i class="fas fa-home"></i> &nbsp; Dashboard</a></li>
          <li><a href="leave.php" aria-current="page">Employee Leave</a></li>
          <li class="is-active"><a href="#" aria-current="page">Add Employee Leave</a></li>
        </ul>
      </nav>
      <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
        <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
          <h1 class="title is-size-5">Add Employee Leave</h1>
        </div>

        <div class="column is-full">
          <form class="columns is-multiline" action="" method="post" enctype="multipart/form-data" onsubmit="return validateLeavePeriod()">
            <div class="column is-half">
              <div class="field">
                <label for="" class="label">Reason for Requested leave <span class="has-text-danger">*</span></label>
                <div class="control">
                  <select name="reason" class="input" id="reason" required>
                    <option value="">--Select--</option>
                    <option value="Annual Leave">Annual Leave</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Complaints Leave">Complaints Leave</option>
                    <option value="Unpaid Leave">Unpaid Leave</option>
                    <option value="Casual Leave">Casual Leave</option>
                    <option value="Paternity Leave">Paternity Leave</option>
                    <option value="Maternity Leave">Maternity Leave</option>
                    <option value="Study Leave with Pay">Study Leave with Pay</option>
                    <option value="Study Leave without Pay">Study Leave without Pay</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="field">
                  <span class="has-text-danger " id="duration"></span>
                </div>
              </div>
              <div class="field">
                <label class="label">Date Requested: Leave Start <span class="has-text-danger">*</span></label>
                <div class="control">
                  <input class="input" id="start_date" name="date_start" min="<?php echo date("Y-m-d"); ?>" type="date" required>
                </div>
              </div>
              <div class="field">
                <label class="label">Date Requested: Leave End <span class="has-text-danger">*</span></label>
                <div class="control">
                  <input class="input" id="end_date" name="date_end" min="<?php echo date("Y-m-d"); ?>" type="date" required>
                </div>
              </div>

              <div class="field is-grouped my-5">
                <p class="control is-expanded is-size-6"></p>
                <p class="control">
                  <button class="button is-info" name="addleave">
                    &nbsp; Save &nbsp;
                  </button>
                </p>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  // Array of holidays (in YYYY-MM-DD format)
  const holidays = [
    "2024-01-01", // New Year's Day
    "2024-01-07", // Constitution Day
    "2024-03-06", // Independence Day
    "2024-03-29", // Good Friday
    "2024-04-01", // Easter Monday
    "2024-05-01", // May Day (Workers' Day)
    "2024-08-04", // Founders’ Day
    "2024-09-21", // Kwame Nkrumah Memorial Day
    "2024-12-06", // Farmer’s Day
    "2024-12-25", // Christmas Day
    "2024-12-26", // Boxing Day
    // Add more holidays if needed
  ];

  function isWeekend(date) {
    const day = date.getDay();
    return day === 0 || day === 6; // 0 = Sunday, 6 = Saturday
  }

  function isHoliday(date) {
    const formattedDate = date.toISOString().split('T')[0];
    return holidays.includes(formattedDate);
  }

  function disableInvalidDates(input) {
    input.addEventListener('input', function() {
      const date = new Date(this.value);
      if (isWeekend(date) || isHoliday(date)) {
        alert('Selected date is a weekend or holiday. Please choose another date.');
        this.value = '';
      }
    });
  }

  function validateLeavePeriod() {
    const startDateInput = document.getElementById('start_date').value;
    const endDateInput = document.getElementById('end_date').value;

    if (!startDateInput || !endDateInput) {
      alert('Please select both start and end dates.');
      return false;
    }

    const startDate = new Date(startDateInput);
    const endDate = new Date(endDateInput);
    // const maxWorkingDays = 20;

    if (startDate > endDate) {
      alert('End date must be after the start date.');
      return false;
    }

    let currentDate = new Date(startDate);
    let workingDays = 0;

    while (currentDate <= endDate) {
      if (!isWeekend(currentDate) && !isHoliday(currentDate)) {
        workingDays++;
      }
      currentDate.setDate(currentDate.getDate() + 1);
    }

    if (workingDays > maxWorkingDays) {
      alert(`The leave period cannot exceed ${maxWorkingDays} working days. You have selected ${workingDays} working days.`);
      return false;
    }

    return true;
  }

  document.addEventListener('DOMContentLoaded', function() {
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');

    disableInvalidDates(startDateInput);
    disableInvalidDates(endDateInput);
  });
</script>