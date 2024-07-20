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
if (isset($_GET['week_sales_id'])) {
  $week_sales_id = $_GET['week_sales_id'];
  $archive_wsales = 'No';

  $query = "UPDATE week_sales SET archive_wsales = '$archive_wsales' WHERE week_sales_id = '$week_sales_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['yet_sales_id'])) {
  $yet_sales_id = $_GET['yet_sales_id'];
  $archive_ysales = 'No';

  $query = "UPDATE yet_sales SET archive_ysales = '$archive_ysales' WHERE yet_sales_id = '$yet_sales_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['agency_id'])) {
  $agency_id = $_GET['agency_id'];
  $archive_agency = 'No';

  $query = "UPDATE sales_agency SET archive_agency = '$archive_agency' WHERE agency_id = '$agency_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>
