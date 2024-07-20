<?php
//Updating Activity Backend
if (isset($_POST['updateactivity'])) {
  $activity_id = $_POST['activity_id'];
  $activity_name = $_POST['activity_name'];
  $activity_date = $_POST['activity_date'];
  $assignment = $_POST['assignment'];
  $estimates = $_POST['estimates'];
  $activity_status = $_POST['activity_status'];
  $branch = $sessbranch;
  $department = $sessdepartment;
  $observation = $_POST['observation'];
  $end_date = $_POST['end_date'];

  if (empty($observation) && !empty($end_date)) {
    $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
  } elseif (!empty($observation) && empty($end_date)) {
    $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
  } elseif (empty($observation) && empty($end_date)) {
    $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
  } elseif (!empty($observation) && !empty($end_date)) {
    $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
  }


  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Sub Employee Leave Backend
function console_log($output, $with_script_tags = true)
{
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
    ');';
  if ($with_script_tags) {
    $js_code = '<script>' . $js_code . '</script>';
  }
  echo $js_code;
}

if (isset($_POST['updatesubleave'])) {
  $leave_id = $_GET['leave_id'];



  $leave_status = $_POST['leave_status'];
  $applied_date = $_POST['applied_date'];
  $reason = $_POST['reason'];
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];


  $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',date_from = '$date_from', date_to = '$date_to',
              reason = '$reason'
              WHERE leave_id =  '$leave_id'";


  $result = mysqli_query($dbcon, $query);

  console_log(mysqli_error($dbcon));
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>


<?php
//Updating Employee Report Backend
if (isset($_POST['updatempreport'])) {
  $employee_report_id = $_POST['employee_report_id'];
  $employee_id = $_POST['employee_id'];
  $activity_id = $_POST['activity_id'];
  $date = $_POST['date'];
  $progress = $_POST['progress'];
  $next_step = $_POST['next_step'];
  $cost_value = $_POST['cost_value'];
  $require_attention = $_POST['require_attention'];
  $challenge = $_POST['challenge'];
  $improve = $_POST['improve'];

  $query = "UPDATE employee_report SET employee_id='$employee_id', activity_id='$activity_id', date='$date', progress='$progress',
              next_step='$next_step', cost_value='$cost_value', require_attention='$require_attention', challenge='$challenge', improve='$improve'
              WHERE employee_report_id = '$employee_report_id'";
  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Profile Backend
if (isset($_POST['updateprofile'])) {
  $employee_id = $sessemp_id;
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $sessfirstname = $_POST['firstname'];
  $sesslastname = $_POST['lastname'];

  $query = "UPDATE `employee` SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone'
              WHERE employee_id = '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/successmsg.php";
  } else {
    include "includes/errormsg.php";
  }
}
?>

<?php
//Updating Password Backend
if (isset($_POST['updatepassword'])) {
  $employee_id = $sessemp_id;

  $npassword = $_POST['npassword'];
  $cpassword = $_POST['cpassword'];

  if ($cpassword !== $npassword) {
    include "includes/passmatch.php";
  } else {
    $password = base64_encode($npassword);
    $query = "UPDATE `employee` SET password='$password'
                WHERE employee_id = '$employee_id'";
    $result = mysqli_query($dbcon, $query);
    if ($result) {
      include "includes/passsuccessmsg.php";
    } else {
      include "includes/passerrormsg.php";
    }
  }
}
?>

<?php
//Updating Assets Backend
if (isset($_POST['updateasset'])) {
  $asset_id = $_POST['asset_id'];
  $asset = $_POST['asset'];
  $serialno = $_POST['serialno'];
  $date = $_POST['date'];
  $branch = $sessbranch;

  $query = "UPDATE `assets` SET asset='$asset', asset_id='$serialno', date='$date', branch='$branch'
            WHERE asset_id = '$asset_id'";
  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Assets Status Backend
if (isset($_POST['updateassetstatus'])) {
  $asset_status_id = $_POST['asset_status_id'];
  $asset_id = $_POST['asset_id'];
  $description = $_POST['description'];
  $status = $_POST['status'];
  $date = $_POST['date'];

  $query = "UPDATE `asset_status` SET asset_id='$asset_id', description='$description', status='$status', date='$date'
            WHERE asset_status_id = '$asset_status_id'";
  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Assets Employee Backend
if (isset($_POST['updateassetemployee'])) {
  $asset_employee_id = $_POST['asset_employee_id'];
  $asset_id = $_POST['asset_id'];
  $employee_id = $_POST['employee_id'];
  $description = $_POST['description'];
  $col_date = $_POST['col_date'];
  $col_time = $_POST['col_time'];
  $return_date = $_POST['return_date'];
  $return_time = $_POST['return_time'];

  if (!empty($return_date) && !empty($return_time)) {
    $query = "UPDATE `asset_employee` SET asset_id='$asset_id',employee_id='$employee_id',description='$description',
              col_date='$col_date',col_time='$col_time',return_date='$return_date',return_time='$return_time'
              WHERE asset_employee_id = '$asset_employee_id'";
  } elseif (empty($return_date) && empty($return_time)) {
    $query = "UPDATE `asset_employee` SET asset_id='$asset_id',employee_id='$employee_id',description='$description',
              col_date='$col_date',col_time='$col_time'
              WHERE asset_employee_id = '$asset_employee_id'";
  }

  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Job Request Backend
if (isset($_POST['update_jr'])) {
  $jr_id = $_POST['jr_id'];
  $jr_request = $_POST['jr_request'];
  $jr_department = $_POST['jr_department'];
  $jr_branch = $_POST['jr_branch'];
  //$jr_req_date = $_POST['jr_req_date'];
  $jr_salary = $_POST['jr_salary'];
  $jr_exp_date = $_POST['jr_exp_date'];
  $jr_role = $_POST['jr_role'];
  $jr_reason = $_POST['jr_reason'];
  //$jr_status = $_POST['jr_status'];
  $jr_budgeted = $_POST['jr_budgeted'];

  //budgeted for option
  if (empty($jr_salary)) {
    $jr_salary = "0.00";
  }

  if (empty($jr_reason)) {
    $jr_reason = " ";
  }

  if ($_POST['jr_decline']) {
    $jr_decline = $_POST['jr_decline'];
  } else {
    $jr_decline = " ";
  }


  $query = "UPDATE job_request SET
            jr_request = '$jr_request',
            jr_department = '$jr_department',
            jr_branch = '$jr_branch',
            jr_salary = '$jr_salary',
            jr_exp_date = '$jr_exp_date',
            jr_role = '$jr_role',
            jr_reason = '$jr_reason',
            jr_decline = '$jr_decline',
            jr_budgeted = '$jr_budgeted'
            WHERE jr_id = '$jr_id'";
  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>


<?php
// Update Employee Leave Backend
if (isset($_POST['updateleave'])) {
  $leave_id = $_POST['leave_id'];
  $leave_status = $_POST['leave_status'];
  $selected_reason = $_POST['selected_reason']; // Use this to retain the selected reason
  $applied_date = $_POST['applied_date'];
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];

  if ($leave_status === 'Rejected' or $leave_status === 'Pending') {
    $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$selected_reason',date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
  } else {
    $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$selected_reason', date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
  }

  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>


<?php
// Update a vehicle request
if (isset($_POST['update_vehicle_book'])) {
  $ar_id = $_POST['ar_id'];
  $employee = $_POST['employee_id'];
  $department = $_POST['department'];
  $departure = $_POST['departure'];
  $destination = $_POST['destination'];
  $request_time = $_POST['request_time'];
  $drop_off = $_POST['drop_off'];
  $driver = $_POST['driver'];
  $request_status = $_POST['request_status'];

  $query = "UPDATE asset_request SET  employee = '$employee', department = '$department', departure = '$departure', 
              destination = '$destination', request_time = '$request_time', drop_off = '$drop_off',
              driver = '$driver', request_status = '$request_status'
              WHERE asset_request_id  = '$ar_id'";
  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
  $_SESSION['query'] = $query;
}
?>
