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

   $link_url = $_POST['link_url'];


   $query = "UPDATE `employee` SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone',link_url= '$link_url'
              WHERE employee_id = '$employee_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
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
//Updating Programm Update Backend
if (isset($_POST['updateprogstatus'])) {
   $prog_upt_id = $_POST['prog_upt_id'];
   $program_update = $_POST['program_update'];
   $update_date = $_POST['update_date'];

   $query = "UPDATE program_update SET program_update='$program_update', update_date='$update_date' WHERE prog_upt_id = '$prog_upt_id'";
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
   $event_name = $_POST['event_name'];
   $event_date = $_POST['event_date'];
   $event_budget = $_POST['event_budget'];
   $activity_brief = $_POST['activity_brief'];


   $query = "UPDATE `event` SET name = '$event_name',
            date = '$event_date', budget = '$event_budget',activity_brief = '$activity_brief'
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
