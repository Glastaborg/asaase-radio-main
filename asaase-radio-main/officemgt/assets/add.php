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
  $branch = $sessbranch;
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
//Adding Assets Backend
if (isset($_POST['addasset'])) {
  $asset = $_POST['asset'];
  $serialno = $_POST['serialno'];
  $asset_type = $_POST['asset_type'];
  $date = $_POST['date'];
  $branch = $sessbranch;
  $archive_asset = 'No';

  $query = "INSERT INTO `assets` (asset, asset_id, asset_type, date, branch, archive_asset)
            VALUES ('$asset','$serialno','$asset_type','$date','$branch', '$archive_asset')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Assets Status Backend
if (isset($_POST['addassetstatus'])) {
  $asset_id = $_POST['asset_id'];
  $description = $_POST['description'];
  $status = $_POST['status'];
  $date = $_POST['date'];
  $archive_asset_status = 'No';

  $query = "INSERT INTO `asset_status` (asset_id, description, status, date,archive_asset_status)
            VALUES ('$asset_id','$description','$status','$date','$archive_asset_status')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Assets Employee Backend
if (isset($_POST['addassetemployee'])) {
  $asset_id = $_POST['asset_id'];
  $employee_id = $_POST['employee_id'];
  $description = $_POST['description'];
  $col_date = $_POST['col_date'];
  $col_time = $_POST['col_time'];
  $return_date = $_POST['return_date'];
  $return_time = $_POST['return_time'];
  $archive_asset_employee = 'No';

  if (!empty($return_date) && !empty($return_time)) {
    $query = "INSERT INTO `asset_employee` (asset_id, employee_id, description, col_date, col_time, return_date, return_time,archive_asset_employee)
              VALUES ('$asset_id','$employee_id','$description','$col_date','$col_time','$return_date','$return_time','$archive_asset_employee')";
  }
  elseif (empty($return_date) && empty($return_time)) {
    $query = "INSERT INTO `asset_employee` (asset_id, employee_id, description, col_date, col_time,archive_asset_employee)
              VALUES ('$asset_id','$employee_id','$description','$col_date','$col_time','$archive_asset_employee')";
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
//Adding Facility Backend
if (isset($_POST['addfacility'])) {
  $facility = $_POST['facility'];
  $date = $_POST['date'];
  $branch = $sessbranch;
  $archive_facility = 'No';

  $query = "INSERT INTO `facility` (facility, date, branch,archive_facility)
            VALUES ('$facility','$date','$branch','$archive_facility')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Facility Backend
if (isset($_POST['addfacilitystatus'])) {
  $facility_id = $_POST['facility_id'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $status = $_POST['status'];
  $archive_facility_status = 'No';

  $query = "INSERT INTO `facility_status` (facility_id, description, date, status,archive_facility_status)
            VALUES ('$facility_id','$description','$date','$status','$archive_facility_status')";
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
?><?php
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