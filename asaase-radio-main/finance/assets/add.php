<?php
//Adding Employee Report Backend
  if (isset($_POST['addempreport'])) {
    $employee_id = $_POST['employee_id'];
    $activity_id = $_POST['activity_id'];
    $date = $_POST['date'];
    $progress = $_POST['progress'];
    $next_step = $_POST['next_step'];
    $cost_value = $_POST['cost_value'];
    $require_attention = $_POST['require_attention'];
    $challenge = $_POST['challenge'];
    $improve = $_POST['improve'];
    $archive_emp_rep = 'No';

    $query = "INSERT INTO `employee_report` (employee_id, activity_id, date, progress, next_step, cost_value, require_attention, challenge, improve, archive_emp_rep)
              VALUES ('$employee_id', '$activity_id', '$date', '$progress', '$next_step', '$cost_value', '$require_attention', '$challenge', '$improve', '$archive_emp_rep')";
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
 function console_log($output, $with_script_tags = true) {
       $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
         ');';
       if ($with_script_tags) {
           $js_code = '<script>' . $js_code . '</script>';
       }
       echo $js_code;
   } 
if (isset($_POST['addleave'])) {

  
   
   
  $employee_id = $sessemp_id;
  $leave_status = "Granted";
  $date_from = $_POST['date_start'];
  $date_end = $_POST['date_end'];
  $reason = $_POST['reason'];
  $archive_leave = "No";
   $extra_comments=" ";
   $unit= $sessunit;
  $query = "INSERT INTO employee_leave (employee_id, leave_status, reason, applied_date, date_from, date_to, archive_leave, extra_comments)
            VALUES ('$employee_id', '$leave_status', '$reason', NOW(), '$date_from', '$date_end', '$archive_leave','$extra_comments')";
  $result = mysqli_query($dbcon, $query);
  
  
   console_log($result);  
  if($result){
     include"includes/successmsg.php";
  }else{

    include"includes/errormsg.php";
  }
}
?>


<?php
//Adding Team Backend
if (isset($_POST['addteam'])) {
  $activity_id = $_POST['activity_id'];
  $employee_id = $_POST['employee_id'];
  $member_type = $_POST['member_type'];

  $query = "INSERT INTO `teammembers` (employee_id, activity_id, member_type)
            VALUES ('$employee_id','$activity_id','$member_type')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Activity Backend
if (isset($_POST['addactivity'])) {
  $activity_id = date('YmdHis');
  $activity_name = $_POST['activity_name'];
  $activity_date = $_POST['activity_date'];
  $assignment = $_POST['assignment'];
  $estimates = $_POST['estimates'];
  $activity_status = $_POST['activity_status'];
  $branch = $_POST['branch'];
  $department = $sessdepartment;
  $observation = $_POST['observation'];
  $end_date = $_POST['end_date'];
  $archive_act = 'No';

  $_SESSION["activity_id"] = $activity_id;
  $sess_activity_id = $_SESSION["activity_id"];


  if (empty($observation) && !empty($end_date)) {
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, end_date, department, branch, archive_act)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$end_date', '$department', '$branch', '$archive_act')";
  }
  elseif(empty($end_date) && !empty($observation)) {
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, observation, department, branch, archive_act)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$observation', '$department', '$branch', '$archive_act')";
  }
  elseif(empty($end_date) && empty($observation)) {
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, department, branch, observation, end_date, archive_act)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$department', '$branch', NULL, NULL, '$archive_act')";
  }elseif (!empty($end_date) && !empty($observation)){
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, observation, end_date, department, branch, archive_act)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$observation', '$end_date', '$department', '$branch', '$archive_act')";
  }

    $result = mysqli_query($dbcon, $query);
    if($result){
      include"includes/successmsg.php";
    }else{
      include"includes/errormsg.php";
    }
  }
?>



<?php
//Adding Collection Week Backend
if (isset($_POST['addweekcol'])) {
  $col_week_amt = $_POST['col_week_amt'];
  $col_budget_amt = $_POST['col_budget_amt'];
  $reason = $_POST['reason'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_wcol = 'No';

  $query = "INSERT INTO `week_collection` (col_week_amt, col_budget_amt, reason, date, branch,archive_wcol)
            VALUES ('$col_week_amt','$col_budget_amt','$reason','$date','$branch','$archive_wcol')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Collection Year Backend
if (isset($_POST['addyearcol'])) {
  $year_col_budget = $_POST['year_col_budget'];
  $year_col_annual = $_POST['year_col_annual'];
  $reason = $_POST['reason'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_ycol = 'No';

  $query = "INSERT INTO `year_collection` (year_col_budget, year_col_annual, reason, date, branch,archive_ycol)
            VALUES ('$year_col_budget','$year_col_annual','$reason','$date','$branch','$archive_ycol')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Recievables Year Backend
if (isset($_POST['addrecievable'])) {
  $desciption = $_POST['desciption'];
  $type = 'Recievable';
  $payrectype = $_POST['payrectype'];
  $amount = $_POST['amount'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_payrec = 'No';

  $query = "INSERT INTO `pay_rec` (desciption, type, payrectype, amount, date, branch, archive_payrec)
            VALUES ('$desciption','$type','$payrectype','$amount','$date','$branch', '$archive_payrec')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Payables Year Backend
if (isset($_POST['addpayable'])) {
  $desciption = $_POST['desciption'];
  $type = 'Payable';
  $payrectype = $_POST['payrectype'];
  $amount = $_POST['amount'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_payrec = 'No';

  $query = "INSERT INTO `pay_rec` (desciption, type, payrectype, amount, date, branch, archive_payrec)
            VALUES ('$desciption','$type','$payrectype','$amount','$date','$branch', '$archive_payrec')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Annual Budget Expense Backend
if (isset($_POST['addannualexp'])) {
  $annual_amount = $_POST['annual_amount'];
  $exp_year = $_POST['exp_year'];
  $branch = $_POST['branch'];
  $archive_exp = 'No';

  $query = "INSERT INTO `annual_expense` (annual_amount, exp_year, branch, archive_exp)
            VALUES ('$annual_amount','$exp_year','$branch','$archive_exp')";
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
//Adding Procured Items Backend
if (isset($_POST['addItem'])) {
  $name = $_POST['name'];
  $specification = $_POST['specification'];

  $department= $sessdepartment;
  

  $query = "INSERT INTO `procurement` (department, item, specification, created_at)
            VALUES ('$department','$name','$specification',NOW())";
  $result = mysqli_query($dbcon, $query);
  
  console_log(mysqli_error($dbcon));
  
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