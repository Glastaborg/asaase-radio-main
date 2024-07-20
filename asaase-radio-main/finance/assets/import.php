<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
?>

<?php
//Importing weekly collection data
if (isset($_POST['import_week_col'])) {
  $filename = $_FILES['import_file']['name'];
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

  $allowed_ext = ['xls','csv','xlsx'];

  if (in_array($file_ext, $allowed_ext)) {
    $inputFileNamePath = $_FILES['import_file']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $count = "0";
    foreach ($data as $row) {

      if ($count > 0) {
      $col_week_amt = $row['0'];
      $col_budget_amt = $row['1'];
      $date = $row['2'];
      $reason = $row['3'];
      $branch = $sessbranch;
      $archive_wcol = 'No';

      $query = "INSERT INTO `week_collection` (col_week_amt, col_budget_amt, reason, date, branch, archive_wcol)
                VALUES ('$col_week_amt','$col_budget_amt','$reason','$date','$branch','$archive_wcol')";
      $result = mysqli_query($dbcon, $query);
      $msg = true;
      }
      else{
        $count = "1";
      }
    }

    if (isset($msg)) {
      include"includes/importedfile.php";
    }
    else{
      include"includes/unimportedfile.php";
    }

  }
  else{
    include"includes/invalidfile.php";
  }
}
?>

<?php
//Importing year collection data
if (isset($_POST['import_year_col'])) {
  $filename = $_FILES['import_file']['name'];
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

  $allowed_ext = ['xls','csv','xlsx'];

  if (in_array($file_ext, $allowed_ext)) {
    $inputFileNamePath = $_FILES['import_file']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $count = "0";
    foreach ($data as $row) {

      if ($count > 0) {
      $year_col_budget = $row['0'];
      $year_col_annual = $row['1'];
      $date = $row['2'];
      $reason = $row['3'];
      $branch = $sessbranch;
      $archive_ycol = 'No';

      $query = "INSERT INTO `year_collection` (year_col_budget, year_col_annual, reason, date, branch,archive_ycol)
                VALUES ('$year_col_budget','$year_col_annual','$reason','$date','$branch','$archive_ycol')";
      $result = mysqli_query($dbcon, $query);
      $msg = true;
      }
      else{
        $count = "1";
      }
    }

    if (isset($msg)) {
      include"includes/importedfile.php";
    }
    else{
      include"includes/unimportedfile.php";
    }

  }
  else{
    include"includes/invalidfile.php";
  }
}
?>

<?php
//Importing payables  data
if (isset($_POST['import_pay'])) {
  $filename = $_FILES['import_file']['name'];
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

  $allowed_ext = ['xls','csv','xlsx'];

  if (in_array($file_ext, $allowed_ext)) {
    $inputFileNamePath = $_FILES['import_file']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $count = "0";
    foreach ($data as $row) {

      if ($count > 0) {
      $amount = $row['0'];
      $date = $row['1'];
      $desciption = $row['2'];
      $payrectype = $row['3'];
      $branch = $sessbranch;
      $type = 'Payable';
      $archive_payrec = 'No';


      $query = "INSERT INTO `pay_rec` (desciption, payrectype, type, amount, date, branch, archive_payrec)
                VALUES ('$desciption','$payrectype','$type','$amount','$date','$branch','$archive_payrec')";
      $result = mysqli_query($dbcon, $query);
      $msg = true;
      }
      else{
        $count = "1";
      }
    }

    if (isset($msg)) {
      include"includes/importedfile.php";
    }
    else{
      include"includes/unimportedfile.php";
    }

  }
  else{
    include"includes/invalidfile.php";
  }
}
?>


<?php
//Importing receivables  data
if (isset($_POST['import_rec'])) {
  $filename = $_FILES['import_file']['name'];
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

  $allowed_ext = ['xls','csv','xlsx'];

  if (in_array($file_ext, $allowed_ext)) {
    $inputFileNamePath = $_FILES['import_file']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $count = "0";
    foreach ($data as $row) {

      if ($count > 0) {
      $amount = $row['0'];
      $date = $row['1'];
      $desciption = $row['2'];
      $payrectype = $row['3'];
      $branch = $sessbranch;
      $type = 'Recievable';
      $archive_payrec = 'No';


      $query = "INSERT INTO `pay_rec` (desciption, payrectype, type, amount, date, branch, archive_payrec)
                VALUES ('$desciption','$payrectype','$type','$amount','$date','$branch','$archive_payrec')";
      $result = mysqli_query($dbcon, $query);
      $msg = true;
      }
      else{
        $count = "1";
      }
    }

    if (isset($msg)) {
      include"includes/importedfile.php";
    }
    else{
      include"includes/unimportedfile.php";
    }

  }
  else{
    include"includes/invalidfile.php";
  }
}
?>
