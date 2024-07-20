

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
  $jr_status = $_POST['jr_status'];
  $jr_budgeted = $_POST['jr_budgeted'];
  $jr_decline = $_POST['jr_decline'];

  //budgeted for option
  if (empty($jr_salary)) {
    $jr_salary = "0.00";
  }

  if (empty($jr_reason)) {
    $jr_reason = "";
  }

  if ($_POST['jr_decline']) {
    $jr_decline = $_POST['jr_decline'];
  } else {
    $jr_decline = "";
  }


  $query = "UPDATE job_request SET
            jr_request = '$jr_request',
            jr_department = '$jr_department',
            jr_branch = '$jr_branch',
            jr_salary = '$jr_salary',
            jr_exp_date = '$jr_exp_date',
            jr_role = '$jr_role',
            jr_reason = '$jr_reason',
            jr_status = '$jr_status',
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
  $departure = $_POST['departure'];
  $destination = $_POST['destination'];
  $request_time = $_POST['request_time'];
  $drop_off = $_POST['drop_off'];

  $query = "UPDATE asset_request SET  departure = '$departure', 
              destination = '$destination', request_time = '$request_time', drop_off = '$drop_off'
              WHERE asset_request_id  = '$ar_id'";
  $result = mysqli_query($dbcon, $query);
  if ($result) {
    include "includes/updatesuccessmsg.php";
  } else {
    include "includes/updateerrormsg.php";
  }
}
?>