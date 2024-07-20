<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/update.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asaase Radio || Admin Add Employees Leave </title>
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
          <li><a href="#" aria-current="page">Employee Leave</a></li>
          <li class="is-active"><a href="#" aria-current="page">Edit Employee Leave</a></li>
        </ul>
      </nav>
      <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
        <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
          <h1 class="title is-size-5">Edit Employee Leave</h1>
        </div>

        <div class="column is-full">
          <?php
          $leave_id = $_GET['leave_id'];
          $dataquery = "SELECT * FROM employee_leave
                              INNER JOIN employee ON employee.employee_id = employee_leave.employee_id
                              WHERE leave_id ='$leave_id'";
          $dataresult = mysqli_query($dbcon, $dataquery);
          if (mysqli_num_rows($dataresult) > 0) {
            $data = mysqli_fetch_array($dataresult);
          ?>
            <form class="columns is-multiline" action="editleave.php?leave_id=<?php echo $leave_id; ?>" method="post" enctype="multipart/form-data">
              <div class="column is-half">
                <div class="field">
                  <label class="label">Employee <span class="has-text-danger">*</span></label>
                  <div class="control">
                    <input type="text" name="leave_id" value="<?php echo $data['leave_id']; ?>" hidden required>
                    <input type="text" class="input" name="employee_id" value="<?php echo $data['firstname']; ?> <?php echo $data['lastname']; ?> - <?php echo $data['department']; ?>" readonly disabled>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Applied Date<span class="has-text-danger">*</span></label>
                  <div class="control">
                    <input class="input has-background-light" name="applied_date" type="date" value="<?php echo $data['applied_date']; ?>" required readonly>
                  </div>
                </div>
                <div class="field">
                  <label for="" class="label">Reason for Requested leave <span class="has-text-danger">*</span></label>
                  <div class="control">
                    <!-- Update to include a text area or input field -->
                    <input type="text" class="input has-background-light" name="selected_reason" value="<?php echo htmlspecialchars($data['reason']); ?>" readonly>
                  </div>
                  <div class="field">
                    <span class="has-text-danger" id="duration"></span>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Date Requested: Leave From</label>
                  <div class="control">
                    <input class="input has-background-light" name="date_from" type="date" value="<?php echo $data['date_from']; ?>" required readonly>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Date Requested: Leave To</label>
                  <div class="control">
                    <input class="input has-background-light" name="date_to" type="date" value="<?php echo $data['date_to']; ?>" required readonly>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Leave Status<span class="has-text-danger">*</span></label>
                  <div class="control ">
                    <div class=" ">
                      <select name="leave_status" class="input" required>
                        <option value="" disabled>--select--</option>
                        <option <?php if ($data['leave_status'] == "Pending") {
                                  echo 'selected';
                                } ?>>Pending</option>
                        <option <?php if ($data['leave_status'] == "Granted") {
                                  echo 'selected';
                                } ?>>Granted</option>
                        <option <?php if ($data['leave_status'] == "Rejected") {
                                  echo 'selected';
                                } ?>>Rejected</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="field is-grouped my-5">
                  <p class="control is-expanded is-size-6">

                  </p>
                  <p class="control">
                    <button class="button is-info" name="updateleave">
                      &nbsp; Update &nbsp;
                    </button>
                  </p>
                </div>

              </div>
            </form>
          <?php } else {
            echo 'No data found for this leave_id.';
          } ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>