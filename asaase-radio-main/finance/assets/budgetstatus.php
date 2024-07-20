<?php
if (isset($_GET['approve_budget_id'])) {
  $activity_budget_id= $_GET['approve_budget_id'];
  $budget_status = 'Approved';

  $query = "UPDATE activity_budget SET budget_status = '$budget_status' WHERE activity_budget_id = '$activity_budget_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/approvesuccessmsg.php";
  }else{
     include"includes/approveerrormsg.php";
  }
}
?>

<?php
if (isset($_GET['decline_budget_id'])) {
  $activity_budget_id= $_GET['decline_budget_id'];
  $budget_status = 'Declined';

  $query = "UPDATE activity_budget SET budget_status = '$budget_status' WHERE activity_budget_id = '$activity_budget_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
     include"includes/declinesuccessmsg.php";
  }else{
     include"includes/declineerrormsg.php";
  }
}
?>
