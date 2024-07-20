<?php
//Updating Branch Backend
if (isset($_POST['updatebranch'])) {
  $obranch = $_POST['obranch'];
  $nbranch = $_POST['nbranch'];

  $query = "UPDATE branch SET branch='$nbranch'
            WHERE branch = '$obranch'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Employee Backend
  if (isset($_POST['updateemployee'])) {
    $employee_id= $_POST['employee_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $employee_type = $_POST['employee_type'];
    $date_joined = $_POST['date_joined'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $dob = $_POST['dob'];
    $job_description = $_POST['job_description'];
    
    

    if (empty($_POST['prev_name'])) {
      $prev_name = " ";
    }else{
      $prev_name = $_POST['prev_name'];
    }

    if (empty($_POST['pref_name'])) {
      $pref_name = " ";
    }else{
      $pref_name = $_POST['prev_name'];
    }
      
   if (empty($_POST['unit'])) {
      $unit = " ";
    }else{
      $unit = $_POST['unit'];
    }

    $query = "UPDATE `employee` SET firstname='$firstname', lastname='$lastname', email='$email', dob='$dob',
              phone='$phone', position='$position', department='$department', prev_name='$prev_name', prev_name='$pref_name',
              branch='$branch', employee_type='$employee_type', date_joined='$date_joined', job_description='$job_description', unit='$unit' WHERE employee_id = '$employee_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/updatesuccessmsg.php";
    }else{
       include"includes/updateerrormsg.php";
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
    $branch = $sessbranch;
    $department = $sessdepartment;
    $observation = $_POST['observation'];
    $end_date = $_POST['end_date'];

    if (empty($observation) && !empty($end_date)){
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }elseif (!empty($observation) && empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }elseif (empty($observation) && empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation= NULL, end_date= NULL, department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }elseif (!empty($observation) && !empty($end_date)) {
      $query = "UPDATE activities SET activity_name='$activity_name', activity_date='$activity_date', assignment='$assignment', estimates='$estimates',
                activity_status='$activity_status', observation='$observation', end_date='$end_date', department='$department', branch='$branch'
                WHERE activity_id = '$activity_id'";
    }


    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/updatesuccessmsg.php";
    }else{
       include"includes/updateerrormsg.php";
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
    if($result){
       include"includes/updatesuccessmsg.php";
    }else{
       include"includes/updateerrormsg.php";
    }
  }
?>


<?php
//Updating Profile Backend
  if (isset($_POST['updateprofile'])) {
    $employee_id= $sessemp_id;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sessfirstname = $_POST['firstname'];
    $sesslastname = $_POST['lastname'];

    $query = "UPDATE `employee` SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone'
              WHERE employee_id = '$employee_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/successmsg.php";
    }else{
       include"includes/errormsg.php";
    }
  }
?>

<?php
//Updating Password Backend
  if (isset($_POST['updatepassword'])) {
    $employee_id= $sessemp_id;

    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];

    if ($cpassword !== $npassword) {
      include"includes/passmatch.php";
    }else{
      $password = base64_encode($npassword);
      $query = "UPDATE `employee` SET password='$password'
                WHERE employee_id = '$employee_id'";
      $result = mysqli_query($dbcon, $query);
      if($result){
         include"includes/passsuccessmsg.php";
      }else{
         include"includes/passerrormsg.php";
      }
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
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Address Backend
if (isset($_POST['updateaddress'])) {
  $employee_id = $_POST['employee_id'];
  $nationality = $_POST['nationality'];
  $current_address = $_POST['current_address'];
  $city = $_POST['city'];
  $district = $_POST['district'];
  $digital_address = $_POST['digital_address'];
  $region = $_POST['region'];

  $query = "UPDATE employee_address SET nationality = '$nationality', current_address = '$current_address', city = '$city',
            district = '$district', digital_address = '$digital_address', region = '$region'
            WHERE employee_id =  '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Social Backend
if (isset($_POST['updatesocial'])) {
  $employee_id = $_POST['employee_id'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $tiktok = $_POST['tiktok'];
  $snapchat = $_POST['snapchat'];

  $query = "UPDATE employee_social SET twitter = '$twitter', facebook = '$facebook', instagram = '$instagram',
            tiktok = '$tiktok', snapchat = '$snapchat'
            WHERE employee_id =  '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Previous Employer Backend
if (isset($_POST['updateprev'])) {
  $employee_id = $_POST['employee_id'];
  $employer = $_POST['employer'];
  $phone = $_POST['phone'];
  $period = $_POST['period'];
  $address = $_POST['address'];
  $city = $_POST['city'];

  $email = $_POST['email'];
  $position = $_POST['position'];
  $website = $_POST['website'];
  $digital_address = $_POST['digital_address'];
  $state = $_POST['state'];
  $region = $_POST['region'];
  $hourly_salary = $_POST['hourly_salary'];
  $annual_income = $_POST['annual_income'];

  $query = "UPDATE employee_prev SET
            employer = '$employer', period = '$period', phone = '$phone', email = '$email',
            position = '$position', address = '$address', city = '$city', state = '$state',
            region = '$region', hourly_salary = '$hourly_salary', annual_income = '$annual_income',
            website = '$website', digital_address = '$digital_address'
            WHERE employee_id =  '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Relative Backend
if (isset($_POST['updaterelative'])) {
  $employee_id = $_POST['employee_id'];
  $relative_name = $_POST['relative_name'];
  $phone = $_POST['phone'];
  $relationship = $_POST['relationship'];
  $digital_address = $_POST['digital_address'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $region = $_POST['region'];

  $query = "UPDATE employee_relative SET relative_name = '$relative_name', phone = '$phone', address = '$address', city = '$city',
            region = '$region', digital_address = '$digital_address', relationship = '$relationship'
            WHERE employee_id =  '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Bank Backend
if (isset($_POST['updatebank'])) {
  $employee_id = $_POST['employee_id'];
  $bank = $_POST['bank'];
  $account_name = $_POST['account_name'];
  $account_number = $_POST['account_number'];
  $bank_branch = $_POST['bank_branch'];
  $ssnit = $_POST['ssnit'];
  $tin = $_POST['tin'];

  $query = "UPDATE employee_bank SET bank = '$bank',
            account_name = '$account_name', account_number = '$account_number',
            bank_branch = '$bank_branch', ssnit = '$ssnit', tin = '$tin'
            WHERE employee_id =  '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Employee Salary Backend
if (isset($_POST['updatesalary'])) {
  $employee_id = $_POST['employee_id'];
  $employee_status = $_POST['employee_status'];
  $first_pay_date = $_POST['first_pay_date'];
  $hourly_pay = $_POST['hourly_pay'];
  $monthly_pay = $_POST['monthly_pay'];
  $annual_pay = $_POST['annual_pay'];

  $query = "UPDATE employee_salary SET employee_status = '$employee_status', first_pay_date = '$first_pay_date',
            hourly_pay = '$hourly_pay', monthly_pay = '$monthly_pay', annual_pay = '$annual_pay'
            WHERE employee_id =  '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Update Employee Leave Backend
if (isset($_POST['updateleave'])) {
  $leave_id = $_POST['leave_id'];
  $leave_status = $_POST['leave_status'];
  $reason = $_POST['reason'];
  $applied_date = $_POST['applied_date'];
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];

  if ($leave_status === 'Rejected' OR $leave_status === 'Pending') {
    $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$reason',date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
  }else{
    $query = "UPDATE employee_leave SET leave_status = '$leave_status', applied_date = '$applied_date',
              reason = '$reason', date_from = '$date_from', date_to = '$date_to'
              WHERE leave_id =  '$leave_id'";
  }

  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
  $branch = $sessbranch;

  $query = "UPDATE `assets` SET asset='$asset', asset_id='$serialno', asset_type='$asset_type', date='$date', branch='$branch'
            WHERE asset_id = '$asset_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
  }
  elseif (empty($return_date) && empty($return_time)) {
    $query = "UPDATE `asset_employee` SET asset_id='$asset_id',employee_id='$employee_id',description='$description',
              col_date='$col_date',col_time='$col_time'
              WHERE asset_employee_id = '$asset_employee_id'";
  }

  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
  }
}
?>

<?php
//Updating Facility Backend
if (isset($_POST['updatefacility'])) {
  $facility_id = $_POST['facility_id'];
  $facility = $_POST['facility'];
  $date = $_POST['date'];
  $branch = $sessbranch;

  $query = "UPDATE `facility` SET facility='$facility', date='$date', branch='$branch'
            WHERE facility_id = '$facility_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
  $jr_status = $_POST['jr_status'];
  $jr_budgeted = $_POST['jr_budgeted'];

  //budgeted for option
  //budgeted for option
  if (empty($jr_salary)) {
    $jr_salary = "0.00";
  }

  if (empty($jr_reason)) {
    $jr_reason = " ";
  }

  if ($_POST['jr_decline']) {
    $jr_decline = $_POST['jr_decline'];
  }else{
    $jr_decline = "";
  }


  $query = "UPDATE job_request SET
            jr_request = '$jr_request',
            jr_department = '$jr_department',
            jr_branch = '$jr_branch',
            jr_salary = '$jr_salary',
            jr_exp_date = '$jr_exp_date',
            jr_role = '$jr_role',
            jr_reason = '$jr_reason',
            jr_status = '$jr_status',
            jr_decline = '$jr_decline',
            jr_budgeted = '$jr_budgeted'
            WHERE jr_id = '$jr_id'";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/updatesuccessmsg.php";
  }else{
     include"includes/updateerrormsg.php";
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
    if($result){
      include"includes/updatesuccessmsg.php";
   }else{
      include"includes/updateerrormsg.php";
   }

}
?>

<?php
// Update vacancy
if (isset($_POST['update_vacancy'])) {
   $vacancy_id = $_POST['vacancy_id'];
   $vacancy_title = $_POST['vacancy_title'];
   $vacancy_end_date = $_POST['vacancy_end_date'];
   $vacancy_desc = $_POST['vacancy_desc'];
   $vacancy_resp = $_POST['vacancy_resp'];
   $vacancy_qual = $_POST['vacancy_qual'];

    $query = "UPDATE vacancy SET  vacancy_title = '$vacancy_title', vacancy_end_date = '$vacancy_end_date',
              vacancy_desc = '$vacancy_desc', vacancy_resp = '$vacancy_resp', vacancy_qual = '$vacancy_qual'
              WHERE vacancy_id  = '$vacancy_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
      include"includes/updatesuccessmsg.php";
   }else{
      include"includes/updateerrormsg.php";
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
   if($result){
      move_uploaded_file($tmpfile,"../files/".$filename);
      include"includes/updatesuccessmsg.php";
   }else{
      include"includes/updateerrormsg.php";
   }
}
?>