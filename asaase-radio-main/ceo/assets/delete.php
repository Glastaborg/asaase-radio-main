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
//Update Sub Employee Leave Backend
 function console_log($output, $with_script_tags = true) {
       $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
         ');';
       if ($with_script_tags) {
           $js_code = '<script>' . $js_code . '</script>';
       }
       echo $js_code;
   } 
if (isset($_POST['updatesubleave'])) {
  $leave_id = $_GET['leave_id'];

  console_log("hello world");
  
  $leave_status = $_POST['leave_status'];
  $applied_date = $_POST['applied_date'];
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];


    $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$reason'
              WHERE leave_id =  '$leave_id'";
  

  $result = mysqli_query($dbcon, $query);
  
  console_log(mysqli_error($dbcon));
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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