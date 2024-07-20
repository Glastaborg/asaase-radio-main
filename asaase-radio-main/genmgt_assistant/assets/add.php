
<?php
//Adding Job Request Backend
if (isset($_POST['add_jr'])) {
  $jr_request = $_POST['jr_request'];
  $jr_department = $_POST['jr_department'];
  $jr_branch = $_POST['jr_branch'];
  //$jr_req_date = $_POST['jr_req_date'];
  $jr_salary = $_POST['jr_salary'];
  $jr_exp_date = $_POST['jr_exp_date'];
  $jr_role = $_POST['jr_role'];
  $jr_reason = $_POST['jr_reason'];
  $jr_status = $_POST['jr_status'];
  $jr_budgeted = $_POST['jr_budgeted'];
  $jr_decline = $_POST['jr_decline'];

  //budgeted for option
  if (empty($jr_salary)) {
    $jr_salary = "0.00";
  }

  if (empty($jr_reason)) {
    $jr_reason = " ";
  }

  if (empty($jr_decline)) {
    $jr_decline = " ";
  }


  $query = "INSERT INTO job_request (jr_request, jr_department, jr_branch, jr_req_date, jr_status, jr_salary, jr_budgeted, jr_exp_date, jr_role, jr_reason, jr_decline)
            VALUES ('$jr_request', '$jr_department', '$jr_branch', NOW(), '$jr_status', '$jr_salary', '$jr_budgeted', '$jr_exp_date', '$jr_role', '$jr_reason', '$jr_decline')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Employee Leave Backend
if (isset($_POST['addleave'])) {  
   
  $employee_id = $sessemp_id;
  $leave_status = "Pending";
  $date_from = $_POST['date_start'];
  $date_end = $_POST['date_end'];
  $reason = $_POST['reason'];
  $archive_leave = "No";
   $extra_comments=" ";
   $unit= $sessunit;
  $query = "INSERT INTO employee_leave (employee_id, leave_status, reason, applied_date, date_from, date_to, archive_leave, extra_comments)
            VALUES ('$employee_id', '$leave_status', '$reason', NOW(), '$date_from', '$date_end', '$archive_leave','$extra_comments')";
  $result = mysqli_query($dbcon, $query);
  
  
  
  
  if($result){
     include"includes/successmsg.php";
  }else{
    include"includes/errormsg.php";
  }
}
?>

<?php
// Adding a vehicle request
if (isset($_POST['vehicle_book'])) {
    $employee_id = $_SESSION['employee_id'];
    $department = $_SESSION['department'];
    $departure = $_POST['departure'];
    $destination = $_POST['destination'];
    $request_time = $_POST['request_time'];
    $drop_off = $_POST['drop_off'];

    $query = "INSERT INTO asset_request (employee, department, departure, destination, request_time, drop_off, driver, request_status)
              VALUES ('$employee_id', '$department', '$departure', '$destination', '$request_time', '$drop_off', 'Unassigned', 'Pending')";
    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/successmsg.php";
    }else{
       include"includes/errormsg.php";
    }
}
?>

<?php
// Adding a part a 
if (isset($_POST['add_part_a'])) {
   $perf_id = $_POST['perf_id'];
   $key_results = $_POST['key_results'];
   $part_a_w = $_POST['part_a_w'];
   $part_a_ws = "0";
   $target_desc = $_POST['target_desc']; 
   $outcome_desc = $_POST['outcome_desc'];
   $part_a_rating = "0";
   $part_a_act_score = "0";

   $query = "INSERT INTO perf_part_a (perf_id, key_results, part_a_w, part_a_ws, target_desc, outcome_desc, part_a_rating, part_a_act_score)
            VALUES ('$perf_id', '$key_results', '$part_a_w', '$part_a_ws', '$target_desc', '$outcome_desc', '$part_a_rating', '$part_a_act_score')";
   $result = mysqli_query($dbcon, $query);
   if($result){
      include"includes/successmsg.php";
   }else{
      include"includes/errormsg.php";
   }
}
?>

<?php
// Adding a part b
if (isset($_POST['add_part_b'])) {
   $perf_id = $_POST['perf_id'];
   $dev_target = $_POST['dev_target'];
   $part_b_w = $_POST['part_b_w'];
   $part_b_ws = "0";
   $dev_targ_def = $_POST['dev_targ_def'];
   $assestment = $_POST['assestment'];
   $part_b_rating = "0";
   $part_b_act_score = "0";

   $query = "INSERT INTO perf_part_b (perf_id, dev_target, part_b_w, part_b_ws, dev_targ_def, assestment, part_b_rating, part_b_act_score)
            VALUES ('$perf_id', '$dev_target', '$part_b_w', '$part_b_ws', '$dev_targ_def', '$assestment', '$part_b_rating', '$part_b_act_score')";
   $result = mysqli_query($dbcon, $query);
   if($result){
      include"includes/successmsg.php";
   }else{
      include"includes/errormsg.php";
   }
}
?>

<?php
// Adding a part c
if (isset($_POST['add_part_c'])) {
   $perf_id = $_POST['perf_id'];
   $sum_of_id = $_POST['sum_of_id'];
   $dev_sup_need = $_POST['dev_sup_need'];

   $query = "INSERT INTO perf_part_c (perf_id, sum_of_id, dev_sup_need) VALUES ('$perf_id', '$sum_of_id', '$dev_sup_need')";
   $result = mysqli_query($dbcon, $query);
   if($result){
      include"includes/successmsg.php";
   }else{
      include"includes/errormsg.php";
   }
}
?>

<?php
// Adding a part d
if (isset($_POST['add_part_d'])) {
   $perf_id = $_POST['perf_id'];
   $ts_target = $_POST['ts_target'];
   $ts_job_fund = $_POST['ts_job_fund'];
   $final_score = $_POST['final_score'];
   $final_rating = $_POST['final_rating'];
   $emp_comment = $_POST['emp_comment'];

   $query = "INSERT INTO perf_part_d (perf_id, ts_target, ts_job_fund, final_score, final_rating, emp_comment, emp_date)
            VALUES ('$perf_id', '$ts_target', '$ts_job_fund', '$final_score', '$final_rating', '$emp_comment', NOW())";
   $result = mysqli_query($dbcon, $query);
   if($result){
      include"includes/successmsg.php";
   }else{
      include"includes/errormsg.php";
   }
}
?>



<?php
// Adding probation form
if (isset($_POST['add_probation'])) {
   $file = $_FILES['filename']['name'];
   $tmpfile = $_FILES['filename']['tmp_name'];
   $emp_id = $_SESSION['employee_id'];
   $year = date("Y");
   $extension  = pathinfo($file, PATHINFO_EXTENSION );
   $filename   = $emp_id."-".$year.".".$extension;


   $query = "INSERT INTO probation (employee_id, `filename`) VALUES ('$emp_id', '$filename')";
   $result = mysqli_query($dbcon, $query);
   if($result){
      move_uploaded_file($tmpfile,"../files/".$filename);
      include"includes/successmsg.php";
   }else{
      include"includes/errormsg.php";
   }
}
?>