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
//delete leave requests
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
if (isset($_GET['week_col_id'])) {
  $week_col_id = $_GET['week_col_id'];
  $archive_wcol = 'Yes';

  $query = "UPDATE week_collection SET archive_wcol = '$archive_wcol' WHERE week_col_id = '$week_col_id'";
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
  $archive_ycol = 'Yes';

  $query = "UPDATE year_collection SET archive_ycol = '$archive_ycol' WHERE year_col_id = '$year_col_id'";
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
  $archive_payrec = 'Yes';


  $query = "UPDATE pay_rec SET archive_payrec = '$archive_payrec' WHERE pay_rec_id = '$pay_rec_id'";
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
if (isset($_GET['activity_budget_id'])) {
  $activity_budget_id= $_GET['activity_budget_id'];
  $archive_activity_budget = 'Yes';

  $query = "UPDATE activity_budget SET archive_activity_budget = '$archive_activity_budget' WHERE activity_budget_id = '$activity_budget_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['ann_exp_id'])) {
  $ann_exp_id= $_GET['ann_exp_id'];
  $archive_exp = 'Yes';

  $query = "UPDATE annual_expense SET archive_exp = '$archive_exp' WHERE ann_exp_id = '$ann_exp_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/deletesuccessmsg.php";
  }else{
     include"includes/deleteerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['jr_id'])) {
  $jr_id= $_GET['jr_id'];

  $query = "DELETE FROM job_request WHERE jr_id = '$jr_id'";
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