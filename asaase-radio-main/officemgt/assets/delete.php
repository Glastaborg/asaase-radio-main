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
//delete leave form
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
if (isset($_GET['asset_id'])) {
  $asset_id = $_GET['asset_id'];
  $archive_asset = 'Yes';

  $query = "UPDATE assets SET archive_asset = '$archive_asset' WHERE asset_id = '$asset_id'";
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
  $archive_asset_status = 'Yes';

  $query = "UPDATE asset_status SET archive_asset_status = '$archive_asset_status' WHERE asset_status_id = '$asset_status_id'";
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
  $archive_asset_employee = 'Yes';

  $query = "UPDATE asset_employee SET archive_asset_employee = '$archive_asset_employee' WHERE asset_employee_id = '$asset_employee_id'";
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
  $archive_facility = 'Yes';

  $query = "UPDATE facility SET archive_facility = '$archive_facility' WHERE facility_id = '$facility_id'";
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
  $archive_facility_status = 'Yes';

  $query = "UPDATE facility_status SET archive_facility_status = '$archive_facility_status' WHERE facility_status_id = '$facility_status_id'";
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
