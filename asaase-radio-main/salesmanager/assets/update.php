<?php
//Updating Activity Backend
if (isset($_POST['updateactivity'])) {
   $activity_id = $_POST['activity_id'];
   $activity_name = $_POST['activity_name'];
   $activity_date = $_POST['activity_date'];
   $assignment = $_POST['assignment'];
   $estimates = $_POST['estimates'];
   $activity_status = $_POST['activity_status'];
   $branch = $sessbranch;
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
// Update Employee Leave Backend
if (isset($_POST['updateleave'])) {
   $leave_id = $_POST['leave_id'];
   $leave_status = $_POST['leave_status'];
   $selected_reason = isset($_POST['selected_reason']) ? $_POST['selected_reason'] : '';
   $applied_date = $_POST['applied_date'];
   $date_from = $_POST['date_from'];
   $date_to = $_POST['date_to'];

   $query = "UPDATE employee_leave SET 
              leave_status = '$leave_status', 
              applied_date = '$applied_date',
              reason = '$selected_reason', 
              date_from = '$date_from', 
              date_to = '$date_to'
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
//Update  Event Backend


if (isset($_POST['updateevent'])) {
   $event_id = $_POST['event_id'];
   $status = $_POST['status'];
   $event_budget = $_POST['event_budget'];
   $date = $_POST['event_date'];
   $activity_brief = $_POST['activity_brief'];
   $name = $_POST['event_name'];

   $query = "UPDATE `event` SET status = '$status', budget = '$event_budget',name= '$name', date='$date', activity_brief= '$activity_brief'
            WHERE event_id =  '$event_id'";
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
//Updating Yet Sales Backend
if (isset($_POST['updateyetsales'])) {
   $yet_sales_id = $_POST['yet_sales_id'];
   $sales_target_yet = $_POST['sales_target_yet'];
   $sales_to_date = $_POST['sales_to_date'];
   $reason = $_POST['reason'];
   $date = $_POST['date'];
   $branch = $sessbranch;

   $query = "UPDATE yet_sales SET sales_target_yet='$sales_target_yet', sales_to_date='$sales_to_date', reason='$reason', date='$date', branch='$branch'
            WHERE yet_sales_id = '$yet_sales_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Week Sales Backend
if (isset($_POST['updateweeksales'])) {
   $week_sales_id = $_POST['week_sales_id'];
   $sales_target = $_POST['sales_target'];
   $act_sale_target = $_POST['act_sale_target'];
   $reason = $_POST['reason'];
   $date = $_POST['date'];
   $branch = $sessbranch;

   $query = "UPDATE week_sales SET act_sale_target='$act_sale_target', sales_target='$sales_target', reason='$reason', date='$date', branch='$branch'
            WHERE week_sales_id = '$week_sales_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Week Sales Backend
if (isset($_POST['updateagency'])) {
   $agency_id = $_POST['agency_id'];
   $agency_name = $_POST['agency_name'];
   $agency_email = $_POST['agency_email'];
   $agency_phone = $_POST['agency_phone'];
   $agency_location = $_POST['agency_location'];
   $agency_contact_name = $_POST['agency_contact_name'];
   $agency_contact_phone = $_POST['agency_contact_phone'];

   $query = "UPDATE sales_agency SET agency_name='$agency_name', agency_email='$agency_email', agency_phone='$agency_phone', agency_location='$agency_location', contact_phone='$agency_contact_phone', contact_name='$agency_contact_name'
            WHERE agency_id = '$agency_id'";
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
