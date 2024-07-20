<?php
//Updating Employee Backend
function console_log($output, $with_script_tags = true)
{
   $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
      ');';
   if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
   }
   echo $js_code;
}


if (isset($_POST['updateemployee'])) {
    $employee_id = $_POST['employee_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $job_description = $_POST['job_description'];
    $dob = $_POST['dob'];
    $position = $_POST['position'];
    $prev_name = !empty($_POST['prev_name']) ? $_POST['prev_name'] : " ";
    $pref_name = !empty($_POST['pref_name']) ? $_POST['pref_name'] : " ";
    $unit = !empty($_POST['unit']) ? $_POST['unit'] : "";
    $password = base64_encode($_POST['password']);

    // Sanitize inputs
    $job_description = mysqli_real_escape_string($dbcon, $job_description);

    // Check if job_description exists in the job table
    $check_query = "SELECT * FROM job WHERE job_description = '$job_description'";
    $check_result = mysqli_query($dbcon, $check_query);
    if (mysqli_num_rows($check_result) == 0) {
        echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
                <button class="delete" onclick="hideMsg()"></button>
                The job description does not exist!
              </div>';
        return;
    }

    $query = "UPDATE `employee` SET firstname='$firstname', lastname='$lastname', email='$email', dob='$dob',
              phone='$phone', position='$position', password='$password', job_description='$job_description', department='$department', branch='$branch',
              prev_name='$prev_name', pref_name='$pref_name', unit='$unit' WHERE employee_id = '$employee_id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        include "includes/updatesuccessmsg.php";
    } else {
        include "includes/updateerrormsg.php";
    }


   //upload or update image
   $emp_image = $_FILES['emp_image']['name'];

   if ($emp_image !== '') {

      $tmp_emp_image = $_FILES['emp_image']['tmp_name'];
      $emp_image_extension = pathinfo($emp_image, PATHINFO_EXTENSION);

      if (!in_array($emp_image_extension, ['jpg', 'png', 'jpeg'])) {
         echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
               <button class="delete" onclick="hideMsg()"></button>
               The picture format is invalid!!
             </div>';
         return;
      } else {

         $imagequery = "SELECT * FROM employee_image WHERE employee_id = '$employee_id'";
         $imageresult = mysqli_query($dbcon, $imagequery);
         $imagedata = mysqli_fetch_assoc($imageresult);



         //   if it exists , update the data
         if (isset($imagedata['employee_id']) && !empty($imagedata['employee_id'])) {
            // Update the existing record
            $query = "UPDATE `employee_image` SET imagename='$emp_image', imagefile='$emp_image' WHERE employee_id = '$employee_id'";
            $img_result = mysqli_query($dbcon, $query);

            if ($img_result) {
               move_uploaded_file($tmp_emp_image, "../hr/employee_images/" . $emp_image);
               echo '<div class="notification is-success is-light is-flex is-align-items-center" id="msg">
                <button class="delete" onclick="hideMsg()"></button>
                Employee picture was uploaded.
              </div>';
            } else {
               echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
                <button class="delete" onclick="hideMsg()"></button>
                Employee picture was not uploaded!!
              </div>';
            }
         } else {
            // Insert a new record
            $query = "INSERT INTO employee_image (employee_id, imagename, imagefile) VALUES ('$employee_id', '$emp_image', '$emp_image')";
            $img_result = mysqli_query($dbcon, $query);

            if ($img_result) {
               move_uploaded_file($tmp_emp_image, "../hr/employee_images/" . $emp_image);
               echo '<div class="notification is-success is-light is-flex is-align-items-center" id="msg">
                <button class="delete" onclick="hideMsg()"></button>
                Employee picture was uploaded.
              </div>';
            } else {
               echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
                <button class="delete" onclick="hideMsg()"></button>
                Employee picture was not uploaded!!
              </div>';
            }
         }
      }
   }



   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

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
   $department = $_POST['department'];
   $observation = $_POST['observation'];
   $end_date = $_POST['end_date'];

   $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
              activity_status='$activity_status', observation='$observation', end_date='$end_date', department='$department', branch='$branch'
              WHERE activity_id = '$activity_id'";
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
//Updating Department Backend
if (isset($_POST['updatedepartment'])) {
   $odepartment = $_POST['odepartment'];
   $ndepartment = $_POST['ndepartment'];

   $query = "UPDATE department SET department='$ndepartment'
            WHERE department = '$odepartment'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>
<?php
//Updating Department Unit Backend
if (isset($_POST['updateunit'])) {
   $ounit = $_POST['ounit'];
   $nunit = $_POST['nunit'];
   $odepartment = $_POST['odepartment'];
   $ndepartment = $_POST['ndepartment'];

   $query = "UPDATE department_unit SET department='$ndepartment', unit= '$nunit'
            WHERE unit= '$ounit' AND department = '$odepartment'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Job Backend
if (isset($_POST['updatejob'])) {
   $ojob_description = $_POST['ojob_description'];
   $njob_description = $_POST['njob_description'];

   $query = "UPDATE job SET job_description='$njob_description'
            WHERE job_description = '$ojob_description'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Branch Backend
if (isset($_POST['updatebranch'])) {
   $obranch = $_POST['obranch'];
   $nbranch = $_POST['nbranch'];

   $query = "UPDATE branch SET branch='$nbranch'
            WHERE branch = '$obranch'";
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
   $branch = $_POST['branch'];

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
   $branch = $_POST['branch'];

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
   $amount = $_POST['amount'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE pay_rec SET desciption='$desciption', amount='$amount', date='$date', branch='$branch'
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
   $amount = $_POST['amount'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE pay_rec SET desciption='$desciption', amount='$amount', date='$date', branch='$branch'
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
//Updating Assets Backend
if (isset($_POST['updateasset'])) {
   $asset_id = $_POST['asset_id'];
   $asset = $_POST['asset'];
   $serialno = $_POST['serialno'];
   $asset_type = $_POST['asset_type'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE `assets` SET asset='$asset', asset_id='$serialno', asset_type='$asset_type', date='$date', branch='$branch'
            WHERE asset_id = '$asset_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Assets Status Backend
if (isset($_POST['updateassetstatus'])) {
   $asset_status_id = $_POST['asset_status_id'];
   $asset_id = $_POST['asset_id'];
   $description = $_POST['description'];
   $status = $_POST['status'];
   $date = $_POST['date'];

   $query = "UPDATE `asset_status` SET asset_id='$asset_id', description='$description', status='$status', date='$date'
            WHERE asset_status_id = '$asset_status_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Assets Employee Backend
if (isset($_POST['updateassetemployee'])) {
   $asset_employee_id = $_POST['asset_employee_id'];
   $asset_id = $_POST['asset_id'];
   $employee_id = $_POST['employee_id'];
   $description = $_POST['description'];
   $col_date = $_POST['col_date'];
   $col_time = $_POST['col_time'];
   $return_date = $_POST['return_date'];
   $return_time = $_POST['return_time'];

   if (!empty($return_date) && !empty($return_time)) {
      $query = "UPDATE `asset_employee` SET asset_id='$asset_id',employee_id='$employee_id',description='$description',
              col_date='$col_date',col_time='$col_time',return_date='$return_date',return_time='$return_time'
              WHERE asset_employee_id = '$asset_employee_id'";
   } elseif (empty($return_date) && empty($return_time)) {
      $query = "UPDATE `asset_employee` SET asset_id='$asset_id',employee_id='$employee_id',description='$description',
              col_date='$col_date',col_time='$col_time'
              WHERE asset_employee_id = '$asset_employee_id'";
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
//Updating Facility Backend
if (isset($_POST['updatefacility'])) {
   $facility_id = $_POST['facility_id'];
   $facility = $_POST['facility'];
   $date = $_POST['date'];
   $branch = $_POST['branch'];

   $query = "UPDATE `facility` SET facility='$facility', date='$date', branch='$branch'
            WHERE facility_id = '$facility_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Facility Status Backend
if (isset($_POST['updatefacilitystatus'])) {
   $facility_status_id = $_POST['facility_status_id'];
   $facility_id = $_POST['facility_id'];
   $description = $_POST['description'];
   $date = $_POST['date'];
   $status = $_POST['status'];

   $query = "UPDATE `facility_status` SET facility_id='$facility_id', description='$description', date='$date', status='$status'
            WHERE facility_status_id = '$facility_status_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>

<?php
//Updating Sessions Backend
if (isset($_POST['updatesession'])) {
   $session_id = $_POST['session_id'];
   $employee_id = $_POST['employee_id'];
   $description = $_POST['description'];
   $date = $_POST['date'];

   $query = "UPDATE `sessions` SET employee_id='$employee_id', description='$description', date='$date'
            WHERE session_id = '$session_id'";
   $result = mysqli_query($dbcon, $query);
   if ($result) {
      include "includes/updatesuccessmsg.php";
   } else {
      include "includes/updateerrormsg.php";
   }
}
?>
