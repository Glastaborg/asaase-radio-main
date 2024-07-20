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
//Update Sub Employee Leave Backend

if (isset($_POST['updatesubleave'])) {
   $leave_id = $_GET['leave_id'];



   $leave_status = $_POST['leave_status'];
   $applied_date = $_POST['applied_date'];
   $date_from = $_POST['date_from'];
   $date_to = $_POST['date_to'];


   $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$reason'
              WHERE leave_id =  '$leave_id'";


   $result = mysqli_query($dbcon, $query);


   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Update Employee Event Backend
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


   $query = "UPDATE `event` SET finance_status = '$status', budget = '$event_budget'
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
//Updating Week Collection Backend
if (isset($_POST['updateweekcol'])) {
   $week_col_id = $_POST['week_col_id'];
   $col_week_amt = $_POST['col_week_amt'];
   $col_budget_amt = $_POST['col_budget_amt'];
   $reason = $_POST['reason'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE week_collection SET col_week_amt='$col_week_amt', col_budget_amt='$col_budget_amt', reason='$reason', date='$date', branch='$branch'
            WHERE week_col_id = '$week_col_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating year Collection Backend
if (isset($_POST['updateyearcol'])) {
   $year_col_id = $_POST['year_col_id'];
   $year_col_budget = $_POST['year_col_budget'];
   $year_col_annual = $_POST['year_col_annual'];
   $reason = $_POST['reason'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE year_collection SET year_col_budget='$year_col_budget', year_col_annual='$year_col_annual', reason='$reason', date='$date', branch='$branch'
            WHERE year_col_id = '$year_col_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Recievables Backend
if (isset($_POST['updaterecievables'])) {
   $pay_rec_id = $_POST['pay_rec_id'];
   $desciption = $_POST['desciption'];
   $payrectype = $_POST['payrectype'];
   $amount = $_POST['amount'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE pay_rec SET desciption='$desciption', payrectype='$payrectype', amount='$amount', date='$date', branch='$branch'
            WHERE pay_rec_id = '$pay_rec_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Payables Backend
if (isset($_POST['updatepayable'])) {
   $pay_rec_id = $_POST['pay_rec_id'];
   $desciption = $_POST['desciption'];
   $payrectype = $_POST['payrectype'];
   $amount = $_POST['amount'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE pay_rec SET desciption='$desciption', payrectype='$payrectype',  amount='$amount', date='$date', branch='$branch'
            WHERE pay_rec_id = '$pay_rec_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Annual Budget Expense Backend
if (isset($_POST['updateannualexp'])) {
   $ann_exp_id = $_POST['ann_exp_id'];
   $annual_amount = $_POST['annual_amount'];
   $exp_year = $_POST['exp_year'];

   $query = "UPDATE annual_expense SET annual_amount='$annual_amount', exp_year='$exp_year'
            WHERE ann_exp_id = '$ann_exp_id'";
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