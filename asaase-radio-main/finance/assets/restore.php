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
if (isset($_GET['week_col_id'])) {
  $week_col_id = $_GET['week_col_id'];
  $archive_wcol = 'No';

  $query = "UPDATE week_collection SET archive_wcol = '$archive_wcol' WHERE week_col_id = '$week_col_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['year_col_id'])) {
  $year_col_id = $_GET['year_col_id'];
  $archive_ycol = 'No';

  $query = "UPDATE year_collection SET archive_ycol = '$archive_ycol' WHERE year_col_id = '$year_col_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['pay_rec_id'])) {
  $pay_rec_id = $_GET['pay_rec_id'];
  $archive_payrec = 'No';


  $query = "UPDATE pay_rec SET archive_payrec = '$archive_payrec' WHERE pay_rec_id = '$pay_rec_id'";
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

<?php
if (isset($_GET['ann_exp_id'])) {
  $ann_exp_id= $_GET['ann_exp_id'];
  $archive_exp = 'No';

  $query = "UPDATE annual_expense SET archive_exp = '$archive_exp' WHERE ann_exp_id = '$ann_exp_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>
