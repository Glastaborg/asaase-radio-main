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
//Adding Branches Backend
if (isset($_POST['addbranch'])) {
  $branch = $_POST['branch'];

  $query = "INSERT INTO `branch` (branch)
            VALUES ('$branch')";
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
//Adding Employee Backend
  if (isset($_POST['addemployee'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $dob = $_POST['dob'];
    $employee_type = $_POST['employee_type'];
    $date_joined = $_POST['date_joined'];
    $job_description = 'Unassigned';
    $archive_emp = 'No';

    $password = $_POST['firstname'];
    $password = base64_encode($password);

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

    if ($_POST['branch']  === "Accra") {
      $employee_id = 'AC'.$date_joined.date('his');
    }
    if ($_POST['branch']  === "Cape Coast") {
      $employee_id = 'CC'.$date_joined.date('his');
    }
    if ($_POST['branch']  === "Kumasi") {
      $employee_id = 'KSI'.$date_joined.date('his');
    }

    // branch employee id
    $query = "INSERT INTO `employee` (employee_id, firstname, lastname, email, phone, dob, password, position, job_description, department, branch, prev_name, pref_name, archive_emp, employee_type, date_joined)
              VALUES ('$employee_id', '$firstname', '$lastname', '$email', '$phone', '$dob', '$password', '$position', '$job_description', '$department', '$branch', '$prev_name', '$pref_name', '$archive_emp', '$employee_type', '$date_joined')";
    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/successmsg.php";
    }else{
       include"includes/errormsg.php";
    }
  }
?>


<?php
//Adding Session Backend
if (isset($_POST['addsession'])) {
  $employee_id = $_POST['employee_id'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $archive_session = 'No';

  $query = "INSERT INTO `sessions` (employee_id, description, date, archive_session)
            VALUES ('$employee_id','$description','$date','$archive_session')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Address Backend
if (isset($_POST['addaddress'])) {
  $employee_id = $_POST['employee_id'];
  $nationality = $_POST['nationality'];
  $current_address = $_POST['current_address'];
  $city = $_POST['city'];
  $district = $_POST['district'];
  $digital_address = $_POST['digital_address'];
  $region = $_POST['region'];

  $query = "INSERT INTO employee_address (employee_id, nationality, current_address, city, district, digital_address, region)
            VALUES ('$employee_id', '$nationality', '$current_address', '$city', '$district', '$digital_address', '$region')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Social Media Backend
if (isset($_POST['addsocial'])) {
  $employee_id = $_POST['employee_id'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $tiktok = $_POST['tiktok'];
  $snapchat = $_POST['snapchat'];

  if (empty($twitter)) {$twitter = " ";}
  if (empty($facebook)) {$facebook = " ";}
  if (empty($instagram)) {$instagram = " ";}
  if (empty($tiktok)) {$tiktok = " ";}
  if (empty($snapchat)) {$snapchat = " ";}

  $query = "INSERT INTO employee_social (employee_id, twitter, facebook, instagram, tiktok, snapchat)
            VALUES ('$employee_id', '$twitter', '$facebook', '$instagram', '$tiktok', '$snapchat')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
    include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Previous Employer Backend
if (isset($_POST['addprev'])) {
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

  if (empty($email)) {$email = " ";}
  if (empty($position)) {$position = " ";}
  if (empty($website)) {$website = " ";}
  if (empty($digital_address)) {$digital_address = " ";}
  if (empty($state)) {$state = " ";}
  if (empty($region)) {$region = " ";}
  if (empty($hourly_salary)) {$hourly_salary = "0.00";}
  if (empty($annual_income)) {$annual_income = "0.00";}

  $query = "INSERT INTO employee_prev
            (employee_id, employer, period, phone, email, position, address,city,
             state, region, hourly_salary, annual_income, website, digital_address)
            VALUES
            ('$employee_id','$employer','$period','$phone','$email','$position','$address',
            '$city','$state','$region','$hourly_salary','$annual_income','$website','$digital_address')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
    include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Employee Relative Backend
if (isset($_POST['addrelative'])) {
  $employee_id = $_POST['employee_id'];
  $relative_name = $_POST['relative_name'];
  $phone = $_POST['phone'];
  $relationship = $_POST['relationship'];
  $digital_address = $_POST['digital_address'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $region = $_POST['region'];

  $query = "INSERT INTO employee_relative (employee_id, relative_name, phone, address, city, region, digital_address, relationship)
            VALUES ('$employee_id', '$relative_name', '$phone', '$address', '$city', '$region', '$digital_address', '$relationship')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
    include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Allergy Backend
if (isset($_POST['addallergy'])) {
  $employee_id = $_POST['employee_id'];
  $allergies = $_POST['allergies'];

  $query = "INSERT INTO employee_allergies (employee_id, allergies)
            VALUES ('$employee_id', '$allergies')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
    include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Bank Backend
if (isset($_POST['addbank'])) {
  $employee_id = $_POST['employee_id'];
  $bank = $_POST['bank'];
  $account_name = $_POST['account_name'];
  $account_number = $_POST['account_number'];
  $bank_branch = $_POST['bank_branch'];
  $ssnit = $_POST['ssnit'];
  $tin = $_POST['tin'];

  $query = "INSERT INTO employee_bank (employee_id, bank, account_name, account_number, bank_branch, ssnit, tin)
            VALUES ('$employee_id', '$bank', '$account_name', '$account_number', '$bank_branch', '$ssnit', '$tin')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
    include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Employee Pay Backend
if (isset($_POST['addsalary'])) {
  $employee_id = $_POST['employee_id'];
  $employee_status = $_POST['employee_status'];
  $first_pay_date = $_POST['first_pay_date'];
  $hourly_pay = $_POST['hourly_pay'];
  $monthly_pay = $_POST['monthly_pay'];
  $annual_pay = $_POST['annual_pay'];

  $query = "INSERT INTO employee_salary (employee_id, employee_status, first_pay_date, hourly_pay, monthly_pay, annual_pay)
            VALUES ('$employee_id', '$employee_status', '$first_pay_date', '$hourly_pay', '$monthly_pay', '$annual_pay')";
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
  $employee_id = $_POST['employee_id'];
  $leave_status = $_POST['leave_status'];
  $reason = $_POST['reason'];
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];
  $archive_leave = "No";

  if ($leave_status === 'Rejected' OR $leave_status === 'Pending'){
    $query = "INSERT INTO employee_leave (employee_id, leave_status, reason, applied_date, date_from, date_to, archive_leave)
              VALUES ('$employee_id', '$leave_status', '$reason', NOW(), NULL, NULL, '$archive_leave')";
  }else{
    $query = "INSERT INTO employee_leave (employee_id, leave_status, reason, applied_date, date_from, date_to, archive_leave)
              VALUES ('$employee_id', '$leave_status', '$reason', NOW(), '$date_from', '$date_to', '$archive_leave')";
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
//Adding Employee Image Backend
if (isset($_POST['addempimage'])) {
  $employee_id = $_POST['employee_id'];

  $emp_image = $_FILES['emp_image']['name'];
  $tmp_emp_image = $_FILES['emp_image']['tmp_name'];
  $emp_image_extension = pathinfo($emp_image, PATHINFO_EXTENSION);

  if (!in_array($emp_image_extension, ['jpg', 'png', 'jpeg'])) {
    echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
            <button class="delete" onclick="hideMsg()"></button>
            The picture format is invalid!!
          </div>';
  }else{
    $query = "INSERT INTO employee_image(employee_id, imagename, imagefile) VALUES ('$employee_id','$emp_image','$emp_image')";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
      move_uploaded_file($tmp_emp_image,"employee_images/".$emp_image);
      echo '<div class="notification is-success is-light is-flex is-align-items-center" id="msg">
              <button class="delete" onclick="hideMsg()"></button>
              Employee picture was uploaded.
            </div>';
    }else {
      echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
              <button class="delete" onclick="hideMsg()"></button>
                Employee picture was not uploaded!!
            </div>';
    }
  }
}
?>


<?php
//Adding Assets Backend
// if (isset($_POST['addasset'])) {
//   $asset = $_POST['asset'];
//   $serialno = $_POST['serialno'];
//   $asset_type = $_POST['asset_type'];
//   $date = $_POST['date'];
//   $branch = $sessbranch;
//   $archive_asset = 'No';

//   $query = "INSERT INTO `assets` (asset, asset_id, asset_type, date, branch, archive_asset)
//             VALUES ('$asset','$serialno','$asset_type','$date','$branch', '$archive_asset')";
//   $result = mysqli_query($dbcon, $query);
//   if($result){
//      include"includes/successmsg.php";
//   }else{
//      include"includes/errormsg.php";
//   }
// }
?>
 
<?php
//Adding Assets Status Backend
// if (isset($_POST['addassetstatus'])) {
//   $asset_id = $_POST['asset_id'];
//   $description = $_POST['description'];
//   $status = $_POST['status'];
//   $date = $_POST['date'];
//   $archive_asset_status = 'No';

//   $query = "INSERT INTO `asset_status` (asset_id, description, status, date,archive_asset_status)
//             VALUES ('$asset_id','$description','$status','$date','$archive_asset_status')";
//   $result = mysqli_query($dbcon, $query);
//   if($result){
//      include"includes/successmsg.php";
//   }else{
//      include"includes/errormsg.php";
//   }
// }
?>

<?php
//Adding Assets Employee Backend
// if (isset($_POST['addassetemployee'])) {
//   $asset_id = $_POST['asset_id'];
//   $employee_id = $_POST['employee_id'];
//   $description = $_POST['description'];
//   $col_date = $_POST['col_date'];
//   $col_time = $_POST['col_time'];
//   $return_date = $_POST['return_date'];
//   $return_time = $_POST['return_time'];
//   $archive_asset_employee = 'No';

//   if (!empty($return_date) && !empty($return_time)) {
//     $query = "INSERT INTO `asset_employee` (asset_id, employee_id, description, col_date, col_time, return_date, return_time,archive_asset_employee)
//               VALUES ('$asset_id','$employee_id','$description','$col_date','$col_time','$return_date','$return_time','$archive_asset_employee')";
//   }
//   elseif (empty($return_date) && empty($return_time)) {
//     $query = "INSERT INTO `asset_employee` (asset_id, employee_id, description, col_date, col_time,archive_asset_employee)
//               VALUES ('$asset_id','$employee_id','$description','$col_date','$col_time','$archive_asset_employee')";
//   }

//   $result = mysqli_query($dbcon, $query);
//   if($result){
//      include"includes/successmsg.php";
//   }else{
//      include"includes/errormsg.php";
//   }
// }
?>

<?php
//Adding Facility Backend
// if (isset($_POST['addfacility'])) {
//   $facility = $_POST['facility'];
//   $date = $_POST['date'];
//   $branch = $sessbranch;
//   $archive_facility = 'No';

//   $query = "INSERT INTO `facility` (facility, date, branch,archive_facility)
//             VALUES ('$facility','$date','$branch','$archive_facility')";
//   $result = mysqli_query($dbcon, $query);
//   if($result){
//      include"includes/successmsg.php";
//   }else{
//      include"includes/errormsg.php";
//   }
// }
?>

<?php
//Adding Facility Backend
// if (isset($_POST['addfacilitystatus'])) {
//   $facility_id = $_POST['facility_id'];
//   $description = $_POST['description'];
//   $date = $_POST['date'];
//   $status = $_POST['status'];
//   $archive_facility_status = 'No';

//   $query = "INSERT INTO `facility_status` (facility_id, description, date, status,archive_facility_status)
//             VALUES ('$facility_id','$description','$date','$status','$archive_facility_status')";
//   $result = mysqli_query($dbcon, $query);
//   if($result){
//      include"includes/successmsg.php";
//   }else{
//      include"includes/errormsg.php";
//   }
// }
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
    $jr_reason = "N/A";
  }

  if (empty($jr_decline)) {
    $jr_decline = "N/A";
  }

  $query = "INSERT INTO job_request (jr_request, jr_department, jr_branch, jr_req_date, jr_status, jr_salary, jr_budgeted, jr_exp_date, jr_role, jr_reason, jr_decline)
            VALUES ('$jr_request', '$jr_department', '$jr_branch', NOW(), '$jr_status', '$jr_salary', '$jr_budgeted', '$jr_exp_date', '$jr_role', '$jr_reason', '')";
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
// Adding a vacancy 
if (isset($_POST['add_vacancy'])) {
  $vacancy_title = $_POST['vacancy_title'];
  $vacancy_end_date = $_POST['vacancy_end_date'];
  $vacancy_desc = $_POST['vacancy_desc'];
  $vacancy_resp = $_POST['vacancy_resp'];
  $vacancy_qual = $_POST['vacancy_qual'];

  $query = "INSERT INTO vacancy (vacancy_title, vacancy_end_date, vacancy_desc, vacancy_resp, vacancy_qual)
           VALUES ('$vacancy_title', '$vacancy_end_date', '$vacancy_desc', '$vacancy_resp', '$vacancy_qual')";
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
