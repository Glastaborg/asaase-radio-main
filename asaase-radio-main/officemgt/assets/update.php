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

    if (empty($observation) && !empty($end_date)){
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }elseif (!empty($observation) && empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }elseif (empty($observation) && empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }elseif (!empty($observation) && !empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }


    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/updatesuccessmsg.php";
    }else{
       include"includes/updateerrormsg.php";
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
    if($result){
       include"includes/updatesuccessmsg.php";
    }else{
       include"includes/updateerrormsg.php";
    }
  }
?>

<?php
//Updating Profile Backend
  if (isset($_POST['updateprofile'])) {
    $employee_id= $sessemp_id;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sessfirstname = $_POST['firstname'];
    $sesslastname = $_POST['lastname'];

    $query = "UPDATE `employee` SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone'
              WHERE employee_id = '$employee_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/successmsg.php";
    }else{
       include"includes/errormsg.php";
    }
  }
?>

<?php
//Updating Password Backend
  if (isset($_POST['updatepassword'])) {
    $employee_id= $sessemp_id;

    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];

    if ($cpassword !== $npassword) {
      include"includes/passmatch.php";
    }else{
      $password = base64_encode($npassword);
      $query = "UPDATE `employee` SET password='$password'
                WHERE employee_id = '$employee_id'";
      $result = mysqli_query($dbcon, $query);
      if($result){
         include"includes/passsuccessmsg.php";
      }else{
         include"includes/passerrormsg.php";
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
  $asset_type = $_POST['asset_type'];
  $date = $_POST['date'];
  $branch = $sessbranch;

  $query = "UPDATE `assets` SET asset='$asset', asset_id='$serialno', asset_type='$asset_type', date='$date', branch='$branch'
            WHERE asset_id = '$asset_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
  }
  elseif (empty($return_date) && empty($return_time)) {
    $query = "UPDATE `asset_employee` SET asset_id='$asset_id',employee_id='$employee_id',description='$description',
              col_date='$col_date',col_time='$col_time'
              WHERE asset_employee_id = '$asset_employee_id'";
  }

  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Facility Backend
if (isset($_POST['updatefacility'])) {
  $facility_id = $_POST['facility_id'];
  $facility = $_POST['facility'];
  $date = $_POST['date'];
  $branch = $sessbranch;

  $query = "UPDATE `facility` SET facility='$facility', date='$date', branch='$branch'
            WHERE facility_id = '$facility_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Facility Status Backend
if (isset($_POST['updatefacilitystatus'])) {
  $facility_status_id = $_POST['facility_status_id'];
  $facility_id = $_POST['facility_id'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $status = $_POST['status'];

  $query = "UPDATE `facility_status` SET facility_id='$facility_id', description='$description', date='$date', status='$status'
            WHERE facility_status_id = '$facility_status_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>
