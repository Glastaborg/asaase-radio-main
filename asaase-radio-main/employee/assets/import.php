<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
?>

<?php
//Importing weekly sales data
// if (isset($_POST['import_week_sales'])) {
//   $filename = $_FILES['import_file']['name'];
//   $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

//   $allowed_ext = ['xls','csv','xlsx'];

//   if (in_array($file_ext, $allowed_ext)) {
//     $inputFileNamePath = $_FILES['import_file']['tmp_name'];
//     $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
//     $data = $spreadsheet->getActiveSheet()->toArray();

//     $count = "0";
//     foreach ($data as $row) {

//       if ($count > 0) {
//       $sales_target = $row['0'];
//       $act_sale_target = $row['1'];
//       $date = $row['2'];
//       $reason = $row['3'];
//       $branch = $sessbranch;

//       $query = "INSERT INTO `week_sales` (sales_target, act_sale_target, reason, date, branch)
//                 VALUES ('$sales_target','$act_sale_target','$reason','$date','$branch')";
//       $result = mysqli_query($dbcon, $query);
//       $msg = true;
//       }
//       else{
//         $count = "1";
//       }
//     }

//     if (isset($msg)) {
//       include"includes/importedfile.php";
//     }
//     else{
//       include"includes/unimportedfile.php";
//     }

//   }
//   else{
//     include"includes/invalidfile.php";
//   }
// }
?>

<?php 
   // uploading weekly sales form
if (isset($_POST['import_week_sales'])) {
   $file = $_FILES['import_file']['name'];
   $tmpfile = $_FILES['import_file']['tmp_name'];
   $emp_id = $_SESSION['employee_id'];
   $branch = $_SESSION['branch'];
   $extension  = pathinfo($file, PATHINFO_EXTENSION );
   $year = date('Y');
   $filename   = $emp_id."-".$year.".".$extension;
    $date = date("Y-m-d");
  
  $allowed_ext = ['xls','csv','xlsx'];
  
  if (in_array($extension, $allowed_ext)) {
   $query = "INSERT INTO week_sales (`date`, archive_wsales, employee_id,branch , `filename`) VALUES ('$date','No','$emp_id', '$branch','$filename')";
   $result = mysqli_query($dbcon, $query);
   
     if($result){
        move_uploaded_file($tmpfile,"../files/weekly_sales/".$filename);
        include"includes/successmsg.php";
     }else{
        
        include"includes/errormsg.php";
     }
   
   }else{
      
      include"includes/invalidfile.php";
   
   }
}
?>

<?php 

   // uploading yearly sales form
if (isset($_POST['import_yet_sales'])) {
   $file = $_FILES['import_file']['name'];
   $tmpfile = $_FILES['import_file']['tmp_name'];
   $emp_id = $_SESSION['employee_id'];
   $branch = $_SESSION['branch'];
   $extension  = pathinfo($file, PATHINFO_EXTENSION );
   $year = date('Y');
   $filename   = $emp_id."-".$year.".".$extension;
    $date = date("Y-m-d");
  
  $allowed_ext = ['xls','csv','xlsx'];
  
  if (in_array($extension, $allowed_ext)) {
   $query = "INSERT INTO yet_sales (`date`, archive_ysales, employee_id,branch , `filename`) VALUES ('$date','No','$emp_id', '$branch','$filename')";
   $result = mysqli_query($dbcon, $query);
   
     if($result){
        move_uploaded_file($tmpfile,"../files/yearly_sales/".$filename);
        include"includes/successmsg.php";
     }else{
        
        include"includes/errormsg.php";
     }
   
   }else{
      
      include"includes/invalidfile.php";
   
   }
}


?>



<?php 
 function console_log($output, $with_script_tags = true) {
       $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
         ');';
       if ($with_script_tags) {
           $js_code = '<script>' . $js_code . '</script>';
       }
       echo $js_code;
   } 
   
   // uploading of employee works under the brand and comms department
if (isset($_POST['import_employee_works'])) {
   $file = $_FILES['import_file']['name'];
   $tmpfile = $_FILES['import_file']['tmp_name'];
   $emp_id = $_SESSION['employee_id'];
   $branch = $_SESSION['branch'];
   $extension  = pathinfo($file, PATHINFO_EXTENSION );
   $year = date('Y');
   $filename   = $emp_id."-".$year.".".$extension;
    $date = date("Y-m-d");
  
  
  

   $query = "INSERT INTO employee_works (`created_at`,archived, employee_id,branch , `filename`) VALUES ('$date','No','$emp_id', '$branch','$filename')";
   $result = mysqli_query($dbcon, $query);
   
   console_log(mysqli_error($dbcon));
   
     if($result){
        move_uploaded_file($tmpfile,"../files/works/".$filename);
        include"includes/successmsg.php";
     }else{
        
        include"includes/errormsg.php";
     }
   
 
}


?>