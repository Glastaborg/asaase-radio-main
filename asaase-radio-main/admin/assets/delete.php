<?php
if (isset($_GET['activity_id'])) {
  $activity_id = $_GET['activity_id'];

  $query = "DELETE FROM activities WHERE activity_id = '$activity_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['employee_report_id'])) {
  $employee_report_id = $_GET['employee_report_id'];

  $query = "DELETE FROM employee_report WHERE employee_report_id = '$employee_report_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['branch'])) {
  $branch = $_GET['branch'];

  $query = "DELETE FROM branch WHERE branch = '$branch'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['team_id'])) {
  $team_id = $_GET['team_id'];


  $querydel = "SELECT activity_id FROM activities
                  WHERE activity_id IN (
                    SELECT activity_id FROM teammembers
                    WHERE id ='$team_id'
                  )";
  $resultdel = mysqli_query($dbcon, $querydel);
  $rowdel = mysqli_fetch_array($resultdel);
  $delactivity_id = $rowdel['activity_id'];

  if($resultdel){
    $query = "DELETE FROM teammembers WHERE id = '$team_id'";
    $result = mysqli_query($dbcon, $query);
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
//delete Employee department

if (isset($_GET['department'])) {
  $department = $_GET['department'];

  $query = "DELETE FROM department WHERE department = '$department'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>


<?php
//delete Employee Department
if (isset($_GET['unit'])) {
  $department = $_GET['department'];
  $unit = $_GET['unit'];

  $query = "DELETE FROM department_unit WHERE unit = '$unit' ";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['job_description'])) {
  $job_description = $_GET['job_description'];

  $query = "DELETE FROM job WHERE job_description = '$job_description'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['employee_id'])) {
  $employee_id = $_GET['employee_id'];

   //  $query = "UPDATE `employee` SET deleted='1' WHERE employee_id = '$employee_id'";

  $query = "DELETE FROM employee WHERE employee_id = '$employee_id'";
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

  $query = "DELETE FROM week_sales WHERE week_sales_id = '$week_sales_id'";
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

  $query = "DELETE FROM yet_sales WHERE yet_sales_id = '$yet_sales_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['week_col_id'])) {
  $week_col_id = $_GET['week_col_id'];

  $query = "DELETE FROM week_collection WHERE week_col_id = '$week_col_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['year_col_id'])) {
  $year_col_id = $_GET['year_col_id'];

  $query = "DELETE FROM year_collection WHERE year_col_id = '$year_col_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['pay_rec_id'])) {
  $pay_rec_id = $_GET['pay_rec_id'];

  $query = "DELETE FROM pay_rec WHERE pay_rec_id = '$pay_rec_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['break_id'])) {
  $break_id = $_GET['break_id'];

  $query = "DELETE FROM breaking_news WHERE break_id = '$break_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['neg_fed_id'])) {
  $neg_fed_id = $_GET['neg_fed_id'];

  $query = "DELETE FROM negative_fed WHERE neg_fed_id = '$neg_fed_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['insets_id'])) {
  $insets_id = $_GET['insets_id'];

  $query = "DELETE FROM insets WHERE insets_id = '$insets_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['asset_id'])) {
  $asset_id = $_GET['asset_id'];

  $query = "DELETE FROM assets WHERE asset_id = '$asset_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['asset_status_id'])) {
  $asset_status_id = $_GET['asset_status_id'];

  $query = "DELETE FROM asset_status WHERE asset_status_id = '$asset_status_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['asset_employee_id'])) {
  $asset_employee_id = $_GET['asset_employee_id'];

  $query = "DELETE FROM asset_employee WHERE asset_employee_id = '$asset_employee_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['facility_id'])) {
  $facility_id = $_GET['facility_id'];

  $query = "DELETE FROM facility WHERE facility_id = '$facility_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['facility_status_id'])) {
  $facility_status_id = $_GET['facility_status_id'];

  $query = "DELETE FROM facility_status WHERE facility_status_id = '$facility_status_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['session_id'])) {
  $session_id = $_GET['session_id'];

  $query = "DELETE FROM sessions WHERE session_id = '$session_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>
