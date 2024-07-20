<?php
if (isset($_GET['employee_id'])) {
  $employee_id = $_GET['employee_id'];
  $archive_emp = 'No';

  $query = "UPDATE `employee` SET archive_emp = '$archive_emp' WHERE employee_id = '$employee_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['activity_id'])) {
  $activity_id = $_GET['activity_id'];
  $archive_act = 'No';

  $query = "UPDATE activities SET archive_act = '$archive_act' WHERE activity_id = '$activity_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['employee_report_id'])) {
  $employee_report_id = $_GET['employee_report_id'];
  $archive_emp_rep = 'No';

  $query = "UPDATE employee_report SET archive_emp_rep= '$archive_emp_rep' WHERE employee_report_id = '$employee_report_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['session_id'])) {
  $session_id = $_GET['session_id'];
  $archive_session = 'No';

  $query = "UPDATE sessions SET archive_session = '$archive_session' WHERE session_id = '$session_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['leave_id'])) {
  $leave_id = $_GET['leave_id'];
  $archive_leave = 'No';

  $query = "UPDATE employee_leave SET archive_leave = '$archive_leave' WHERE leave_id = '$leave_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>


<?php
if (isset($_GET['asset_id'])) {
  $asset_id = $_GET['asset_id'];
  $archive_asset = 'No';

  $query = "UPDATE assets SET archive_asset = '$archive_asset' WHERE asset_id = '$asset_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['asset_status_id'])) {
  $asset_status_id = $_GET['asset_status_id'];
  $archive_asset_status = 'No';

  $query = "UPDATE asset_status SET archive_asset_status = '$archive_asset_status' WHERE asset_status_id = '$asset_status_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['asset_employee_id'])) {
  $asset_employee_id = $_GET['asset_employee_id'];
  $archive_asset_employee = 'No';

  $query = "UPDATE asset_employee SET archive_asset_employee = '$archive_asset_employee' WHERE asset_employee_id = '$asset_employee_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['facility_id'])) {
  $facility_id = $_GET['facility_id'];
  $archive_facility = 'No';

  $query = "UPDATE facility SET archive_facility = '$archive_facility' WHERE facility_id = '$facility_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['facility_status_id'])) {
  $facility_status_id = $_GET['facility_status_id'];
  $archive_facility_status = 'No';

  $query = "UPDATE facility_status SET archive_facility_status = '$archive_facility_status' WHERE facility_status_id = '$facility_status_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['activity_budget_id'])) {
  $activity_budget_id= $_GET['activity_budget_id'];
  $archive_activity_budget = 'No';

  $query = "UPDATE activity_budget SET archive_activity_budget = '$archive_activity_budget' WHERE activity_budget_id = '$activity_budget_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>
