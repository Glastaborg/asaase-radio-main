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
//Adding Employee Backend
  if (isset($_POST['addemployee'])) {
  
   function console_log($output, $with_script_tags = true) {
       $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
         ');';
       if ($with_script_tags) {
           $js_code = '<script>' . $js_code . '</script>';
       }
       echo $js_code;
   }

  
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $department = $_POST['department'] == '' ? null : $_POST['department'];
    $position = $_POST['position'];
    $dob = $_POST['dob']  ?? null;
    $job_description = $_POST['job_description'];

    $password = $_POST['password'];
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
      
      
   if (empty($_POST['unit'])) {
      $unit = " ";
    }else{
      $unit = $_POST['unit'];
    }
    
   // $errors = array();

   // $count_existing_email_query = $email_exists_query = "SELECT COUNT(*) as count FROM employee WHERE email = $email"; 
   //   $count_existing_email_result = mysqli_query($dbcon, $count_existing_email_query);
   //   $row_email = $count_existing_email_result->fetch_assoc();
     
   //   if ($row_email['count'] > 0) {
   //      $errors[] = "Email already exists in the system";
   //  }
    
   //  if(!empty($errors)){
      
   //     // Validation failed, return errors to the user
   //      foreach ($errors as $error) {
   //          echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
   //                  <button class="delete" onclick="hideMsg()"></button>
   //                  ' . $error . '
   //                </div>';
   //      }
      
   //  }
   //  else{
       
       if ($_POST['branch']  === "Accra") {
   
      $count_query = "SELECT COUNT(employee_id) as count FROM employee WHERE branch='Accra'";
      $count_result = mysqli_query($dbcon, $count_query);
      $row = $count_result->fetch_assoc();
      $count = $row['count'] + 1;
     
      $employee_id = 'ABCA'.str_pad($count, 3, '0', STR_PAD_LEFT);
 
    }
    else if ($_POST['branch']  === "Cape Coast") {
    
      $count_query = "SELECT COUNT(employee_id) as count FROM employee WHERE branch='Cape Coast'";
      $count_result = mysqli_query($dbcon, $count_query);
      $row = $count_result->fetch_assoc();
      $count = $row['count'] + 1;
      
      $employee_id = 'ABCCC'.str_pad($count, 3, '0', STR_PAD_LEFT);
      
    }
    else if ($_POST['branch']  === "Kumasi") {
    
      $count_query = "SELECT COUNT(employee_id) as count FROM employee WHERE branch='Kumasi'";
      $count_result = mysqli_query($dbcon, $count_query);
      $row = $count_result->fetch_assoc();
      $count = $row['count'] + 1;
      
      $employee_id = 'ABCKM'.str_pad($count, 3, '0', STR_PAD_LEFT);
      
      

    }else if($_POST['branch'] === "Tamale"){
    
      $count_query = "SELECT COUNT(employee_id) as count FROM employee WHERE branch='Tamale'";
      $count_result = mysqli_query($dbcon, $count_query);
      $row = $count_result->fetch_assoc();
      $count = $row['count'] + 1;
      
      $employee_id = 'ABCTM'.str_pad($count, 3, '0', STR_PAD_LEFT);
   
    }else{
      $count_query = "SELECT COUNT(employee_id) as count FROM employee WHERE branch='Unassigned'";
      $count_result = mysqli_query($dbcon, $count_query);
      $row = $count_result->fetch_assoc();
      $count = $row['count'] + 1;
      
      $employee_id = 'EMP'.str_pad($count, 3, '0', STR_PAD_LEFT);
    
    }

   // Check if employee_id already exists
   $checkQuery = "SELECT COUNT(*) as count FROM `employee` WHERE `employee_id` = '$employee_id'";
   $checkResult = mysqli_query($dbcon, $checkQuery);
   $row = mysqli_fetch_assoc($checkResult);

   if ($row['count'] == 0) {
      // If no duplicate found, proceed with insert
      $query = "INSERT INTO `employee` (employee_id, firstname, lastname, email, phone, dob, password, position, job_description, department, archive_emp, branch, prev_name, pref_name, unit)
              VALUES ('$employee_id', '$firstname', '$lastname', '$email', '$phone', '$dob', '$password', '$position', '$job_description', '$department', 'No', '$branch', '$prev_name', '$pref_name', '$unit')";
      $result = mysqli_query($dbcon, $query);

      if ($result) {
         echo "Employee added successfully.";
      } else {
         echo "Error: " . mysqli_error($dbcon);
      }
   } else {
      // Handle duplicate employee_id
      echo "Error: Employee ID already exists.";
   }
   
   //  $query = "INSERT INTO `employee` (employee_id , firstname, lastname, email, phone, dob, password, position, job_description, department, archive_emp, branch, prev_name, pref_name, unit)
   //            VALUES ('$employee_id','$firstname', '$lastname', '$email', '$phone', '$dob', '$password', '$position', '$job_description', '$department', 'No','$branch', '$prev_name', '$pref_name','$unit')";
   //  $result = mysqli_query($dbcon, $query);
    
    $emp_image = $_FILES['emp_image']['name'];
     if($emp_image != null){
         $tmp_emp_image = $_FILES['emp_image']['tmp_name'];
     $emp_image_extension = pathinfo($emp_image, PATHINFO_EXTENSION);
   
     if (!in_array($emp_image_extension, ['jpg', 'png', 'jpeg'])) {
       echo '<div class="notification is-danger is-light is-flex is-align-items-center" id="msg">
               <button class="delete" onclick="hideMsg()"></button>
               The picture format is invalid!!
             </div>';
             return;
     }else{
       $query = "INSERT INTO employee_image(employee_id, imagename, imagefile) VALUES ('$employee_id','$emp_image','$emp_image')";
       $result = mysqli_query($dbcon, $query);
   
       if ($result) {
         move_uploaded_file($tmp_emp_image,"../hr/employee_images/".$emp_image);
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
     
     
    console_log(mysqli_error($dbcon));
    if($result){
       include"includes/successmsg.php";
    }else{
       include"includes/errormsg.php";
    }
       
    }
     
   
//   }
?>

<?php
//Adding Employee Report Backend
  if (isset($_POST['addempreport'])) {
    $employee_id = $_POST['employee_id'];
    $activity_id = $_POST['activity_id'];
    $date = $_POST['date'] ?? null;
    $progress = $_POST['progress'];
    $next_step = $_POST['next_step'];
    $cost_value = $_POST['cost_value'];
    $require_attention = $_POST['require_attention'];
    $challenge = $_POST['challenge'];
    $improve = $_POST['improve'];

    $query = "INSERT INTO `employee_report` (employee_id, activity_id, date, progress, next_step, cost_value, require_attention, challenge, improve)
              VALUES ('$employee_id', '$activity_id', '$date', '$progress', '$next_step', '$cost_value', '$require_attention', '$challenge', '$improve')";
    $result = mysqli_query($dbcon, $query);
    if($result){
       include"includes/successmsg.php";
    }else{
       include"includes/errormsg.php";
    }
  }
?>

<?php
//Adding Department Backend
if (isset($_POST['adddepartment'])) {
  $department = $_POST['department'];

  $query = "INSERT INTO `department` (department)
            VALUES ('$department')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Department Unit Backend
if (isset($_POST['addunit'])) {
  $department = $_POST['department'];
   $unit = $_POST['unit'];
   
  $query = "INSERT INTO `department_unit` (unit , department)
            VALUES ('$unit','$department')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>


<?php
//Adding Job Description Backend
if (isset($_POST['addjob'])) {
  $job_description = $_POST['job_description'];

  $query = "INSERT INTO `job` (job_description)
            VALUES ('$job_description')";
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
  $branch = $_POST['branch'];
  $department = $_POST['department'];
  $observation = $_POST['observation'];
  $end_date = $_POST['end_date'];

  $_SESSION["activity_id"] = $activity_id;
  $sess_activity_id = $_SESSION["activity_id"];


  if (empty($observation) && !empty($end_date)) {
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, end_date, department, branch)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$end_date', '$department', '$branch')";
  }
  elseif(empty($end_date) && !empty($observation)) {
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, observation, department, branch)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$observation', '$department', '$branch')";
  }
  elseif(empty($end_date) && empty($observation)) {
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, department, branch, observation, end_date)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$department', '$branch', NULL, NULL)";
  }elseif (!empty($end_date) && !empty($observation)){
    $query = "INSERT INTO activities (activity_id, activity_name, activity_date, assignment, estimates, activity_status, observation, end_date, department, branch)
              VALUES ('$activity_id', '$activity_name', '$activity_date', '$assignment', '$estimates', '$activity_status', '$observation', '$end_date', '$department', '$branch')";
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
//Adding Sales Week Backend
if (isset($_POST['addweeksales'])) {
  $sales_target = $_POST['sales_target'];
  $act_sale_target = $_POST['act_sale_target'];
  $reason = $_POST['reason'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];

  $query = "INSERT INTO `week_sales` (sales_target, act_sale_target, reason, date, branch)
            VALUES ('$sales_target','$act_sale_target','$reason','$date','$branch')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>

<?php
//Adding Sales Year Backend
if (isset($_POST['addyetsales'])) {
  $sales_target_yet = $_POST['sales_target_yet'];
  $sales_to_date = $_POST['sales_to_date'];
  $reason = $_POST['reason'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];

  $query = "INSERT INTO `yet_sales` (sales_target_yet, sales_to_date, reason, date, branch)
            VALUES ('$sales_target_yet','$sales_to_date','$reason','$date','$branch')";
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

  $query = "INSERT INTO `week_collection` (col_week_amt, col_budget_amt, reason, date, branch)
            VALUES ('$col_week_amt','$col_budget_amt','$reason','$date','$branch')";
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

  $query = "INSERT INTO `year_collection` (year_col_budget, year_col_annual, reason, date, branch)
            VALUES ('$year_col_budget','$year_col_annual','$reason','$date','$branch')";
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
  $amount = $_POST['amount'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];

  $query = "INSERT INTO `pay_rec` (desciption, type, amount, date, branch)
            VALUES ('$desciption','$type','$amount','$date','$branch')";
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
  $amount = $_POST['amount'];
  $date = $_POST['date'];
  $branch = $_POST['branch'];

  $query = "INSERT INTO `pay_rec` (desciption, type, amount, date, branch)
            VALUES ('$desciption','$type','$amount','$date','$branch')";
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

  $query = "INSERT INTO `breaking_news` (comment, type, amt, date, branch)
            VALUES ('$comment','$type','$amt','$date','$branch')";
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

  $query = "INSERT INTO `negative_fed` (comment, date, branch)
            VALUES ('$comment','$date','$branch')";
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

  $query = "INSERT INTO `insets` (insets_type, comment, date, branch)
            VALUES ('$insets_type','$comment','$date','$branch')";
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

  $query = "INSERT INTO `insets` (insets_type, comment, date, branch)
            VALUES ('$insets_type','$comment','$date','$branch')";
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
  $branch = $_POST['branch'];

  $query = "INSERT INTO `assets` (asset, asset_id, asset_type, date, branch)
            VALUES ('$asset','$serialno','$asset_type','$date','$branch')";
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

  $query = "INSERT INTO `asset_status` (asset_id, description, status, date)
            VALUES ('$asset_id','$description','$status','$date')";
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

  if (!empty($return_date) && !empty($return_time)) {
    $query = "INSERT INTO `asset_employee` (asset_id, employee_id, description, col_date, col_time, return_date, return_time)
              VALUES ('$asset_id','$employee_id','$description','$col_date','$col_time','$return_date','$return_time')";
  }
  elseif (empty($return_date) && empty($return_time)) {
    $query = "INSERT INTO `asset_employee` (asset_id, employee_id, description, col_date, col_time)
              VALUES ('$asset_id','$employee_id','$description','$col_date','$col_time')";
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
  $branch = $_POST['branch'];

  $query = "INSERT INTO `facility` (facility, date, branch)
            VALUES ('$facility','$date','$branch')";
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

  $query = "INSERT INTO `facility_status` (facility_id, description, date, status)
            VALUES ('$facility_id','$description','$date','$status')";
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

  $query = "INSERT INTO `sessions` (employee_id, description, date)
            VALUES ('$employee_id','$description','$date')";
  $result = mysqli_query($dbcon, $query);
  if($result){
     include"includes/successmsg.php";
  }else{
     include"includes/errormsg.php";
  }
}
?>
