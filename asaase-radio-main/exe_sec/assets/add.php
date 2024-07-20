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
//Adding Upload Document Backend
if (isset($_POST['upload'])) {
   $document = $_FILES['document'];

   $documentName = $_FILES['document']['name'];
   $documentTmpName = $_FILES['document']['tmp_name'];
   $documentSize = $_FILES['document']['size'];
   $documentError = $_FILES['document']['error'];
   $documentType = $_FILES['document']['type'];

   $title = $_POST['title'];

   $fileName = pathinfo($documentName, PATHINFO_FILENAME);

   $documentExt = explode('.', $documentName);
   $documentActualExt = strtolower(end($documentExt));

   $allowed = array('pdf','jpg', 'jpeg', 'png');

   if (in_array( $documentActualExt, $allowed)) {
      if ($documentError === 0) {
         if ($documentSize < 5000000) {
            $query = "INSERT INTO document_upload (title, documentname, documentsize, documenttype) 
                      VALUES ('$title','$documentName', $documentSize, '$documentType')";
            $result = mysqli_query($dbcon, $query);

            if($result){
               $documentNameNew = $fileName.".".$documentActualExt;
               $documentDestination = '../uploads/'.$documentNameNew;
               move_uploaded_file($documentTmpName, $documentDestination);
               include"includes/successmsg.php";
            }else{
               include"includes/errormsg.php";
            }
         } else {
            echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
               <button class="delete" onclick="hideMsg()"></button>
               Your file is too big!!
            </div> ';
         }
      } else {
         echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
               <button class="delete" onclick="hideMsg()"></button>
               There was an error uploading your file!!
            </div> ';
      }
   } else {
      echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
               <button class="delete" onclick="hideMsg()"></button>
               You cannot upload files of this type!!
            </div> ';
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
//Adding Breaking News Backend
if (isset($_POST['addbreaking'])) {
  $comment = $_POST['comment'];
  $type = $_POST['type'];
  $amt = $_POST['amt'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_break = 'No';

  $query = "INSERT INTO `breaking_news` (comment, type, amt, date, branch, archive_break)
            VALUES ('$comment','$type','$amt','$date','$branch', '$archive_break')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Breaking News Backend
if (isset($_POST['addnegative'])) {
  $comment = $_POST['comment'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_neg = 'No';

  $query = "INSERT INTO `negative_fed` (comment, date, branch,archive_neg)
            VALUES ('$comment','$date','$branch','$archive_neg')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Wrong Insets Backend
if (isset($_POST['addwinsets'])) {
  $insets_type = 'Wrong Insets';
  $comment = $_POST['comment'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_inset = 'No';

  $query = "INSERT INTO `insets` (insets_type, comment, date, branch, archive_inset)
            VALUES ('$insets_type','$comment','$date','$branch', '$archive_inset')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Wrong Insets Backend
if (isset($_POST['adduinsets'])) {
  $insets_type = 'Unplayed Insets';
  $comment = $_POST['comment'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];
  $archive_inset = 'No';

  $query = "INSERT INTO `insets` (insets_type, comment, date, branch, archive_inset)
            VALUES ('$insets_type','$comment','$date','$branch', '$archive_inset')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Program Backend
if (isset($_POST['addprogram'])) {
  $program = $_POST['program'];
  $hostname = $_POST['hostname'];
  $program_date = $_POST['program_date'];
  $program_color = $_POST['program_color'];
  $branch = $_POST['branch'];
  $producer = $_POST['producer'];
  $archive_program = 'No';

  $query = "INSERT INTO `programs` (program, hostname, program_date, branch, producer, archive_program, program_color)
            VALUES ('$program','$hostname','$program_date','$branch','$producer', '$archive_program', '$program_color')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Program Schedule Backend
if (isset($_POST['addprog_schedule'])) {
  $program_id = $_POST['program_id'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $day = $_POST['day'];

  $query = "INSERT INTO `program_schedule` (program_id, start_time, end_time, day)
            VALUES ('$program_id','$start_time','$end_time','$day')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Program Update Backend
if (isset($_POST['addprog_status'])) {
  $program_id = $_POST['program_id'];
  $program_update = $_POST['program_update'];
  $update_date = $_POST['update_date'];

  $query = "INSERT INTO `program_update` (program_id, program_update, update_date)
            VALUES ('$program_id','$program_update','$update_date')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Activity Budget Backend
if (isset($_POST['addactivity_budget'])) {
  $activity_id = $_POST['activity_id'];
  $budget = $_POST['budget'];
  $budget_status = 'Pending';
  $archive_activity_budget = 'No';

  $query = "INSERT INTO `activity_budget` (activity_id, budget, budget_status, applied_date, archive_activity_budget)
            VALUES ('$activity_id','$budget','$budget_status',NOW(),'$archive_activity_budget')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

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
  $jr_status = 'Pending';
  $jr_budgeted = $_POST['jr_budgeted'];

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
  $leave_status = "Granted";
  $date_from = $_POST['date_start'];
  $date_end = $_POST['date_end'];
  $reason = $_POST['reason'];
  $archive_leave = "No";
   $extra_comments=" ";
   
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
//Adding Subordinate Leave Backend
if (isset($_POST['addsubordinateleave'])) {
   
  $employee_id = $_POST['employee_id'];
  $leave_status = $_POST['leave_status'];
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
//Adding Procured Items Backend
if (isset($_POST['addItem'])) {
  $name = $_POST['name'];
  $specification = $_POST['specification'];

  $department= $sessdepartment;
  

  $query = "INSERT INTO `procurement` (department, item, specification, created_at)
            VALUES ('$department','$name','$specification',NOW())";
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