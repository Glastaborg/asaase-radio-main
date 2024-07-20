<?php
require 'C:/xampp/htdocs/asaase-radio-main (2)/asaase-radio-main/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

function console_log($output, $with_script_tags = true)
{
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
  if ($with_script_tags) {
    $js_code = '<script>' . $js_code . '</script>';
  }
  echo $js_code;
}

// Importing weekly sales data
if (isset($_POST['import_week_sales'])) {
  $filename = $_FILES['import_file']['name'];
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
  $allowed_ext = ['xls', 'csv', 'xlsx'];

  if (in_array($file_ext, $allowed_ext)) {
    $inputFileNamePath = $_FILES['import_file']['tmp_name'];
    $spreadsheet = IOFactory::load($inputFileNamePath);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $msg = false;
    foreach ($data as $row) {
      $sales_target = $row['0'];
      $act_sale_target = $row['1'];
      $date = $row['2'];
      $reason = $row['3'];
      $branch = $sessbranch;

      $query = "INSERT INTO `week_sales` (sales_target, act_sale_target, reason, date, branch, archive_wsales)
                      VALUES ('$sales_target', '$act_sale_target', '$reason', '$date', '$branch', 'No')";
      $result = mysqli_query($dbcon, $query);
      $msg = true;
    }

    console_log(mysqli_error($dbcon));

    if ($msg) {
      include "includes/importedfile.php";
    } else {
      include "includes/unimportedfile.php";
    }
  } else {
    include "includes/invalidfile.php";
  }
}

// Importing yearly sales data
if (isset($_POST['import_yet_sales'])) {
  $filename = $_FILES['import_file']['name'];
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
  $allowed_ext = ['xls', 'csv', 'xlsx'];

  if (in_array($file_ext, $allowed_ext)) {
    $inputFileNamePath = $_FILES['import_file']['tmp_name'];
    $spreadsheet = IOFactory::load($inputFileNamePath);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $msg = false;
    $count = 0;
    foreach ($data as $row) {
      if ($count > 0) {
        $sales_target_yet = $row['0'];
        $sales_to_date = $row['1'];
        $date = $row['2'];
        $reason = $row['3'];
        $branch = $sessbranch;

        $query = "INSERT INTO `yet_sales` (sales_target_yet, sales_to_date, reason, date, branch)
                          VALUES ('$sales_target_yet', '$sales_to_date', '$reason', '$date', '$branch')";
        $result = mysqli_query($dbcon, $query);
        $msg = true;
      } else {
        $count = 1;
      }
    }

    if ($msg) {
      include "includes/importedfile.php";
    } else {
      console_log($data);
      include "includes/unimportedfile.php";
    }
  } else {
    include "includes/invalidfile.php";
  }
}

// Uploading yearly sales form
if (isset($_POST['import_collection'])) {
  // Upload and process yearly sales file
}

// Uploading weekly sales form
if (isset($_POST['import_week_sales'])) {
  // Upload and process weekly sales file
}
