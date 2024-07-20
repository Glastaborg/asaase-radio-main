<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

                $query = "SELECT *, DATEDIFF(date_to,date_from) AS date_diff FROM employee
                                  INNER JOIN employee_leave ON employee.employee_id = employee_leave.employee_id
                                  WHERE archive_leave = 'No'
                                  AND leave_status = 'Pending' 
                                 AND employee.job_description='Employee'
                                 AND employee.department='Programs'
            ORDER BY applied_date DESC";
$result = mysqli_query($dbcon, $query);



// Function to check if a date is a holiday
function isHoliday($date, $holidays)
{
  return in_array($date, $holidays);
}

function calculate_days_left($date_from, $date_to)
{
  $start_date = new DateTime($date_from);
  $end_date = new DateTime($date_to);

  // Array of holidays (in YYYY-MM-DD format)
  $holidays = [
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

  // Initialize working days count
  $working_days = 0;

  // Loop through each day between start and end dates
  $current_date = clone $start_date;
  while ($current_date <= $end_date) { // Check if current day is not a weekend and not a holiday if ($current_date->format('N') < 6 && !isHoliday($current_date->format('Y-m-d'), $holidays)) {
    if ($current_date->format('N') < 6 && !isHoliday($current_date->format('Y-m-d'), $holidays)) {
      $working_days++;
    }
    // Move to the next day
    $current_date->modify('+1 day');
  }

  return $working_days;
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asaase Radio || Department Head Leave </title>
  <!-- CSS Links-->
  <?php include("../includes/includes_css.php"); ?>
  <!-- Js Scripts-->
  <?php include("../includes/includes_js.php"); ?>
</head>

<body class="has-background-light">
  <div class="columns">
    <?php include('includes/sidebar.php'); ?>
    <div class="column is-10 has-background-light" id="main">
      <?php include('includes/navbar.php'); ?>
      <nav class="breadcrumb p-3" aria-label="breadcrumbs">
        <ul>
          <li><a href="dashboard.php"><i class="fas fa-home"></i> &nbsp; Dashboard</a></li>
          <li class="is-active"><a href="#" aria-current="page">Employee Leave</a></li>
        </ul>
      </nav>
      <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
        <div class="column is-full">
          <div class="columns is-align-items-center py-1">
            <div class="column is-two-thirds">
              <h1 class="title is-size-5">Employee Leave</h1>
            </div>
            <div class="column">
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="text" placeholder="Search employee" id="search">
                  <span class="icon is-small is-left">
                    <i class="fas fa-search"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="column is-full">
          <div class="columns">
            <div class="column is-half">
              <!-- <a href="addleave.php" class="button is-info " type="button" name="button" id="addbtn">Add Employee Leave</a> -->
            </div>
            <div class="column is-half">
              <p class="has-text-right">
                <a href="genleave.php" class="button is-white" type="button" name="button" id="addbtn">
                  <i class="fas fa-print"></i>&nbsp; Generate Report
                </a>
              </p>
            </div>
          </div>
        </div>

        <div class="column is-full">
          <div class="columns">
            <div class="column is-half">
            </div>
            <div class="column is-half">
              <p class="has-text-right">
                <a href="archiveleave.php" class="button is-white" type="button" name="button" id="addbtn">
                  <i class="fas fa-archive"></i>&nbsp; View Archived Data
                </a>
              </p>
            </div>
          </div>
        </div>

        <div class="column is-full is-align-items-center">
          <div class="table-container">
            <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
              <thead>
                <tr>
                  <th class="is-size-6 is-size-7-mobile">Name</th>
                  <th class="is-size-6 is-size-7-mobile">Job Description</th>
                  <th class="is-size-6 is-size-7-mobile">Applied Date</th>
                  <th class="is-size-6 is-size-7-mobile has-text-centered">Leave Status</th>
                  <th class="is-size-6 is-size-7-mobile">Reason for Request</th>
                  <th class="is-size-6 is-size-7-mobile">Date From</th>
                  <th class="is-size-6 is-size-7-mobile">Date To</th>
                  <th class="is-size-6 is-size-7-mobile">No of Days</th>
                  <th class="is-size-6 is-size-7-mobile">No of Days Left</th>
                  <th class="is-size-6 is-size-7-mobile">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                  if ($row['leave_status'] === 'Granted') {
                    $style = "has-background-success has-text-light";
                  } elseif ($row['leave_status'] === 'Pending') {
                    $style = "has-background-warning";
                  } elseif ($row['leave_status'] === 'Rejected') {
                    $style = "has-background-danger has-text-light";
                  }
                  $days_left = calculate_days_left($row['date_from'], $row['date_to']);
                ?>
                  <tr>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['job_description']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['applied_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile has-text-centered">
                      <div class="<?php echo $style; ?> p-2 "><?php echo $row['leave_status']; ?>
                    </td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['reason']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['date_from']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['date_to']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo calculate_days_left($row['date_from'], $row['date_to']); ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $days_left; ?></td> <!-- Display days left -->
                    <td class="is-size-6 is-size-7-mobile">
                      <?php if ($row['leave_status'] !== 'Granted' and $row['leave_status'] !== 'Rejected') {

                      ?>
                        <a class="button is-size-7 is-info m-1" title="update leave" href="editsubleaverequests.php?leave_id=<?php echo $row['leave_id']; ?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="button is-size-7 is-danger m-1" title="delete leave" href="subleaverequests.php?leave_id=<?php echo $row['leave_id']; ?>">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      <?php } ?>
                    </td>
                  </tr>
              </tbody>
            <?php } ?>
            </table>
          </div>
        </div>


      </div>
    </div>
  </div>
</body>

</html>

<script>
  //Sidebar Menu
  function sideBar() {
    var aside = document.getElementById("aside");
    aside.classList.toggle("active");
  }

  //Search  Function
  $(document).ready(function() {
    $('#search').on('keyup', function() {
      var searchTerm = $(this).val().toLowerCase();
      $('#table tbody tr').each(function() {
        var lineStr = $(this).text().toLowerCase();
        if (lineStr.indexOf(searchTerm) === -1) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
    });
  });
</script>