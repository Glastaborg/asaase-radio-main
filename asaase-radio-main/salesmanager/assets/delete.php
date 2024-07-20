<?php
if (isset($_GET['activity_id'])) {
  $activity_id = $_GET['activity_id'];
  $archive_act = 'Yes';

  $query = "UPDATE activities SET archive_act = '$archive_act' WHERE activity_id = '$activity_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php

//delete procured item
   
if (isset($_GET['item_id'])) {
  $item_id = $_GET['item_id'];

  $query = "DELETE FROM procurement WHERE item_id = '$item_id'";
  $result = mysqli_query($dbcon, $query);



  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

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
//delete event 
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
if (isset($_GET['employee_report_id'])) {
  $employee_report_id = $_GET['employee_report_id'];
  $archive_emp_rep = 'Yes';

  $query = "UPDATE employee_report SET archive_emp_rep= '$archive_emp_rep' WHERE employee_report_id = '$employee_report_id'";
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
if (isset($_GET['collection_id'])) {
  $collection_id = $_GET['collection_id'];
  $archive_ysales = 'Yes';

  $query = "UPDATE collections SET archive_ysales = '$archive_ysales' WHERE collection_id = '$collection_id'";
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
