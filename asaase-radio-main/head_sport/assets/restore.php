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
if (isset($_GET['insets_id'])) {
  $insets_id = $_GET['insets_id'];
  $archive_inset = 'No';

  $query = "UPDATE insets SET archive_inset = '$archive_inset' WHERE insets_id = '$insets_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['program_id'])) {
  $program_id= $_GET['program_id'];
  $archive_program = 'No';

  $query = "UPDATE programs SET archive_program = '$archive_program' WHERE program_id = '$program_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['neg_fed_id'])) {
  $neg_fed_id = $_GET['neg_fed_id'];
  $archive_neg = 'No';

  $query = "UPDATE negative_fed SET archive_neg = '$archive_neg' WHERE neg_fed_id = '$neg_fed_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/restoresuccessmsg.php";
  }else{
     include"includes/restoreerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['break_id'])) {
  $break_id = $_GET['break_id'];
  $archive_break = 'No';

  $query = "UPDATE breaking_news SET archive_break = '$archive_break' WHERE break_id = '$break_id'";
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
