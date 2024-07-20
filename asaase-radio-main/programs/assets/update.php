<?php
//Updating Activity Backend
if (isset($_POST['updateactivity'])) {
   $activity_id = $_POST['activity_id'];
   $activity_name = $_POST['activity_name'];
   $activity_date = $_POST['activity_date'];
   $assignment = $_POST['assignment'];
   $estimates = $_POST['estimates'];
   $activity_status = $_POST['activity_status'];
   $branch = $_POST['branch'];
   $department = $sessdepartment;
   $observation = $_POST['observation'];
   $end_date = $_POST['end_date'];

   if (empty($observation) && !empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
   } elseif (!empty($observation) && empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
   } elseif (empty($observation) && empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
   } elseif (!empty($observation) && !empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
   }


   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Update  Event Backend
function console_log($output, $with_script_tags = true)
{
   $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
      ');';
   if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
   }
   echo $js_code;
}

if (isset($_POST['updateevent'])) {
   $event_id = $_POST['event_id'];
   $status = $_POST['status'];
   $event_budget = $_POST['event_budget'];


   $query = "UPDATE `event` SET program_status = '$status', budget = '$event_budget',name= '$name', date='$date', crew_list= '$crew_list'
            WHERE event_id =  '$event_id'";
   $result = mysqli_query($dbcon, $query);
   //   console_log($event_id);
   //   console_log(mysqli_error($dbcon));

   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Employee Report Backend
if (isset($_POST['updatempreport'])) {
   $employee_report_id = $_POST['employee_report_id'];
   $employee_id = $_POST['employee_id'];
   $activity_id = $_POST['activity_id'];
   $date = $_POST['date'];
   $progress = $_POST['progress'];
   $next_step = $_POST['next_step'];
   $cost_value = $_POST['cost_value'];
   $require_attention = $_POST['require_attention'];
   $challenge = $_POST['challenge'];
   $improve = $_POST['improve'];

   $query = "UPDATE employee_report SET employee_id='$employee_id', activity_id='$activity_id', date='$date', progress='$progress',
              next_step='$next_step', cost_value='$cost_value', require_attention='$require_attention', challenge='$challenge', improve='$improve'
              WHERE employee_report_id = '$employee_report_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>


<?php
//Updating Breaking News Backend
if (isset($_POST['updatebreaking'])) {
   $break_id = $_POST['break_id'];
   $comment = $_POST['comment'];
   $type = $_POST['type'];
   $amt = $_POST['amt'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE breaking_news SET comment='$comment', amt='$amt', date='$date', branch='$branch', type='$type'
            WHERE break_id = '$break_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Negative Feedback Backend
if (isset($_POST['updatenegative'])) {
   $neg_fed_id = $_POST['neg_fed_id'];
   $comment = $_POST['comment'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE negative_fed SET comment='$comment', date='$date', branch='$branch'
            WHERE neg_fed_id = '$neg_fed_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Wrong Insets Backend
if (isset($_POST['updatewinsets'])) {
   $insets_id = $_POST['insets_id'];
   $comment = $_POST['comment'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE insets SET comment='$comment', date='$date', branch='$branch'
            WHERE insets_id = '$insets_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Unplayed Insets Backend
if (isset($_POST['updateuinsets'])) {
   $insets_id = $_POST['insets_id'];
   $comment = $_POST['comment'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE insets SET comment='$comment', date='$date', branch='$branch'
            WHERE insets_id = '$insets_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Program Backend
if (isset($_POST['updateprogram'])) {
   $program_id = $_POST['program_id'];
   $program = $_POST['program'];
   $hostname = $_POST['hostname'];
   $program_color = $_POST['program_color'];
   $branch = $_POST['branch'];
   $producer = $_POST['producer'];
   $cohost = $_POST['cohost'];
   $producers = $_POST['producers'];
   $dj = $_POST['dj'];
   $program_desc = $_POST['program_desc'];

   $query = "UPDATE programs SET program='$program', hostname='$hostname', branch='$branch', producer='$producer', dj='$dj' ,program_desc= '$program_desc', program_color='$program_color',cohost='$cohost',producers='$producers'
            WHERE program_id = '$program_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>



<?php
//Updating Script Backend
if (isset($_POST['updatescript'])) {
   $program_id = $_POST['program_id'];
   $script_id = $_POST['script_id'];
   $guest = $_POST['guest'];
   $date = $_POST['script_date'];
   $script = $_POST['script'];
   $panelist = $_POST['panelist'];


   $query = "UPDATE scripts SET program_id='$program_id', guest='$guest', `date`='$date', script='$script', panelist='$panelist'
            WHERE script_id = '$script_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>


<?php
//Updating Programm Schedule Backend
if (isset($_POST['updateprog_sched'])) {
   $prog_sched_id = $_POST['prog_sched_id'];
   $program_id = $_POST['program_id'];
   $start_time = $_POST['start_time'];
   $end_time = $_POST['end_time'];
   $day = $_POST['day'];

   $query = "UPDATE program_schedule SET program_id='$program_id', start_time='$start_time', end_time='$end_time', day='$day'
            WHERE prog_sched_id = '$prog_sched_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Programm Update Backend
if (isset($_POST['progcomment'])) {
   $prog_upt_id = $_POST['prog_upt_id'];
   $prog_comment = $_POST['prog_comment'];

   $query = "UPDATE program_update SET prog_comment='$prog_comment' WHERE prog_upt_id = '$prog_upt_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>


<?php
//Updating Profile Backend
if (isset($_POST['updateprofile'])) {
   $employee_id = $sessemp_id;
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];

   $sessfirstname = $_POST['firstname'];
   $sesslastname = $_POST['lastname'];

   $query = "UPDATE `employee` SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone'
              WHERE employee_id = '$employee_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/successmsg.php";
   } else {
      include "includes/errormsg.php";
   }
}
?>

<?php
//Updating Password Backend
if (isset($_POST['updatepassword'])) {
   $employee_id = $sessemp_id;

   $npassword = $_POST['npassword'];
   $cpassword = $_POST['cpassword'];

   if ($cpassword !== $npassword) {
      include "includes/passmatch.php";
   } else {
      $password = base64_encode($npassword);
      $query = "UPDATE `employee` SET password='$password'
                WHERE employee_id = '$employee_id'";
      $result = mysqli_query($dbcon, $query);
      if ($result) {
         include "includes/passsuccessmsg.php";
      } else {
         include "includes/passerrormsg.php";
      }
   }
}
?>

<?php
//Updating Job Request Backend
if (isset($_POST['update_jr'])) {
   $jr_id = $_POST['jr_id'];
   $jr_request = $_POST['jr_request'];
   $jr_department = $_POST['jr_department'];
   $jr_branch = $_POST['jr_branch'];
   //$jr_req_date = $_POST['jr_req_date'];
   $jr_salary = $_POST['jr_salary'];
   $jr_exp_date = $_POST['jr_exp_date'];
   $jr_role = $_POST['jr_role'];
   $jr_reason = $_POST['jr_reason'];
   //$jr_status = $_POST['jr_status'];
   $jr_budgeted = $_POST['jr_budgeted'];

   //budgeted for option
   if (empty($jr_salary)) {
      $jr_salary = "0.00";
   }

   if (empty($jr_reason)) {
      $jr_reason = " ";
   }

   if ($_POST['jr_decline']) {
      $jr_decline = $_POST['jr_decline'];
   } else {
      $jr_decline = " ";
   }


   $query = "UPDATE job_request SET
            jr_request = '$jr_request',
            jr_department = '$jr_department',
            jr_branch = '$jr_branch',
            jr_salary = '$jr_salary',
            jr_exp_date = '$jr_exp_date',
            jr_role = '$jr_role',
            jr_reason = '$jr_reason',
            jr_decline = '$jr_decline',
            jr_budgeted = '$jr_budgeted'
            WHERE jr_id = '$jr_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>


<?php
// Update Employee Leave Backend
if (isset($_POST['updateleave'])) {
   $leave_id = $_POST['leave_id'];
   $leave_status = $_POST['leave_status'];
   $selected_reason = $_POST['selected_reason']; // Use this to retain the selected reason
   $applied_date = $_POST['applied_date'];
   $date_from = $_POST['date_from'];
   $date_to = $_POST['date_to'];

   if ($leave_status === 'Rejected' or $leave_status === 'Pending') {
      $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$selected_reason',date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
   } else {
      $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$selected_reason', date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
   }

   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>


<?php
//Update Sub Employee Leave Backend
if (isset($_POST['updatesubleave'])) {
   $leave_id = $_POST['leave_id'];
   $leave_status = $_POST['leave_status'];
   $reason = $_POST['reason'];
   $applied_date = $_POST['applied_date'];
   $date_from = $_POST['date_from'];
   $date_to = $_POST['date_to'];

   if ($leave_status === 'Rejected' or $leave_status === 'Pending') {
      $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$reason', date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
   } else {
      $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$reason', date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
   }

   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
// Update a vehicle request
if (isset($_POST['update_vehicle_book'])) {
   $ar_id = $_POST['ar_id'];
   $departure = $_POST['departure'];
   $destination = $_POST['destination'];
   $request_time = $_POST['request_time'];
   $drop_off = $_POST['drop_off'];

   $query = "UPDATE asset_request SET  departure = '$departure', 
              destination = '$destination', request_time = '$request_time', drop_off = '$drop_off'
              WHERE asset_request_id  = '$ar_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Update  Procured Item Backend


if (isset($_POST['updateProcuredItem'])) {
   $item_id = $_POST['item_id'];
   $item_name = $_POST['name'];
   $specification = $_POST['specification'];


   $query = "UPDATE `procurement` SET item = '$item_name', specification = '$specification'
            WHERE item_id =  '$item_id'";
   $result = mysqli_query($dbcon, $query);

   console_log(mysqli_error($dbcon));

   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
// Adding probation form
if (isset($_POST['update_probation'])) {
   $probation_id = $_POST['probation_id'];
   $o_filename = $_POST['o_filename'];
   $file = $_FILES['filename']['name'];
   $tmpfile = $_FILES['filename']['tmp_name'];
   $emp_id = $_SESSION['employee_id'];
   $year = date("Y");
   $filename   = $o_filename;

   $query = "UPDATE probation SET `filename` = '$filename' WHERE probation_id = '$probation_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      move_uploaded_file($tmpfile, "../files/" . $filename);
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>