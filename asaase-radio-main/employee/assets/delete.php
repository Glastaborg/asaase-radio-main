<?php
if (isset($_GET['leave_id'])) {
  $leave_id = $_GET['leave_id'];

  $query = "DELETE FROM employee_leave WHERE leave_id = '$leave_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['event_id'])) {
  $event_id = $_GET['event_id'];

  $query = "DELETE FROM `event` WHERE event_id = '$event_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['ar_id'])) {
  $ar_id= $_GET['ar_id'];

  $query = "DELETE FROM asset_request WHERE asset_request_id  = '$ar_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['perf_id'])) {
  $perf_id= $_GET['perf_id'];

  $query = "DELETE FROM perf_rev WHERE perf_id  = '$perf_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['del_part_a_id'])) {
  $part_a_id= $_GET['del_part_a_id'];

  $perf_id = $_SESSION['perf_id'];

  $query = "DELETE FROM perf_part_a WHERE part_a_id  = '$part_a_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
      echo "<script> alert('Data was deleted'); window.location.href('part-a.php?perf_part_a_id=".$perf_id."');</script>";
      include"includes/deletesuccessmsg.php";
  }else{
      echo "<script> alert('Data was not deleted'); window.location.href('part-a.php?perf_part_a_id=".$perf_id."');</script>";
      include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['probation_id'])) {
  $probation_id= $_GET['probation_id'];

  $query = "DELETE FROM probation WHERE probation_id  = '$probation_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>


<?php
if (isset($_GET['week_sales_id'])) {
  $week_sales_id = $_GET['week_sales_id'];
  $archive_wsales = 'Yes';

  $query = "UPDATE week_sales SET archive_wsales = '$archive_wsales' WHERE week_sales_id = '$week_sales_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['yet_sales_id'])) {
  $yet_sales_id = $_GET['yet_sales_id'];
  $archive_ysales = 'Yes';

  $query = "UPDATE yet_sales SET archive_ysales = '$archive_ysales' WHERE yet_sales_id = '$yet_sales_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['agency_id'])) {
  $agency_id = $_GET['agency_id'];
  $archive_agency = 'Yes';

  $query = "UPDATE sales_agency SET archive_agency = '$archive_agency' WHERE agency_id = '$agency_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['file_id'])) {
  $file_id = $_GET['file_id'];
  $archive = 'Yes';

  $query = "UPDATE employee_works SET archived = '$archive' WHERE id = '$file_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>