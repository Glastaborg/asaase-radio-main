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
