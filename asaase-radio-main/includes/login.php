<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = base64_encode($password);

  function console_log($output, $with_script_tags = true)
  {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
      ');';
    if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
  }

  $query = "SELECT * FROM employee WHERE email = '$email' AND password = '$password' AND deleted = '0'";
  $result = mysqli_query($dbcon, $query);

  if (mysqli_affected_rows($dbcon) == 1) {
    echo include "includes/successmsg.php";




    $data = mysqli_fetch_array($result);

    // console_log($data);

    $_SESSION['employee_id'] = $data['employee_id'];
    $_SESSION['job_description'] = $data['job_description'];
    $_SESSION['branch'] = $data['branch'];
    $_SESSION['department'] = $data['department'];
    $_SESSION['firstname'] = $data['firstname'];
    $_SESSION['lastname'] = $data['lastname'];
    $_SESSION['position'] = $data['position'];
    $_SESSION['unit'] = $data['unit'];

    $job_descriptions = ['News Anchor', 'Reporter', 'Driver', 'National Service Personel', 'Receptionist', 'Security', 'Brands and Comms', 'Dj', 'Creative designer', 'Presenter', 'Producer', 'Sales', 'Political', 'Sports Presenter', 'Technical','Social Media'];

    if ($data['job_description'] == 'Admin') {
      sleep(2);
      header('Location: admin/dashboard.php');
    } elseif ($data['job_description'] == 'Chief Executive Officer' || $data['job_description'] == 'CEO') {
      sleep(2);
      header('Location: ceo/dashboard.php');
    } elseif ($data['job_description'] == 'Employee' && $data['department'] != ' News' || in_array($_SESSION['job_description'], $job_descriptions)) {
      sleep(2);
      header('Location: employee/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Finance' || $data['job_description'] == 'Finance Manager') {
      sleep(2);
      header('Location: finance/dashboard.php');
    } 
    // elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'News') {
    //   sleep(2);
    //   header('Location: news/dashboard.php');
    // } 
    elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Sales' || $data['job_description'] == "Sales Manager") {
      sleep(2);
      header('Location: salesmanager/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Digital') {
      sleep(2);
      header('Location: digital_manager/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Online' || $data['job_description'] == 'Online' ) {
      sleep(2);
      header('Location: online/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'HR' ||  $data['job_description'] == 'HR' || $data['job_description'] == 'Human Resource') {
      sleep(2);
      header('Location: hr/dashboard.php');
    }
    //HR assistant
    elseif ($data['job_description'] == 'HR Assistant' && $data['department'] == 'HR' ||  $data['job_description'] == 'HR Assistant' || $data['job_description'] == 'HR Business Partner') {
      sleep(2);
      header('Location: hr_assistant/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Office Management' || $data['job_description'] == 'Office Manager' || $data['job_description'] == 'Procurement Officer') {
      sleep(2);
      header('Location: officemgt/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Transport' || $data['job_description'] == 'Transport coordinator') {
      sleep(2);
      header('Location: transport/dashboard.php');
    } elseif ($data['job_description'] == 'General Manager') {
      sleep(2);
      header('Location: genmgt/dashboard.php');
    } elseif ($data['job_description'] == 'Programs Manager') {
      sleep(2);
      header('Location: programs/dashboard.php');
    } elseif ($data['job_description'] == 'Branch Manager') {
      sleep(2);
      header('Location: branch_manager/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Digital Media' || $data['job_description'] == 'Digital Media') {
      sleep(2);
      header('Location: head_digital_media/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Research' || $data['job_description'] == 'Research') {
      sleep(2);
      header('Location: head_research/dashboard.php');
    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'Secretary' || $data['job_description'] == 'Secretary') {
      sleep(2);
      header('Location: exe_sec/dashboard.php');
    } elseif ($data['job_description'] == 'Head of Security') {
      sleep(2);
      header('Location: security/dashboard.php');
    } elseif ($data['job_description'] == 'Brands and Comms Manager') {
      sleep(2);
      header('Location: brands_and_comms_manager/dashboard.php');

    } elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'News' || $data['job_description'] == 'News Editor') {
      sleep(2);
      header('Location: news_editor/dashboard.php');

    } elseif ($data['job_description'] == 'Supervising News Editor' && $data['department'] == 'News' || $data['job_description'] == 'Supervising News Editor') {
      sleep(2);
      header('Location: supervising_editor/dashboard.php');
    }

    elseif ($data['job_description'] == 'Department Head' && $data['department'] == 'News' || $data['job_description'] == 'Managing News Editor') {
      sleep(2);
      header('Location: managing_news/dashboard.php');
      
    }
     elseif ($data['job_description'] == 'Head of Sport' && $data['department'] == 'News' || $data['job_description'] == 'Head of Sport') {
      sleep(2);
      header('Location: head_sport/dashboard.php');

    } elseif ($data['job_description'] == 'Head of Business' && $data['department'] == 'News' || $data['job_description'] == 'Head of Business') {
      sleep(2);
      header('Location: head_business/dashboard.php');

    } elseif ($data['job_description'] == 'Head of Legal and Political Desk' && $data['department'] == 'News' || $data['job_description'] == 'Head of Legal and Political Desk') {
      sleep(2);
      header('Location: head_political_legal/dashboard.php');
    } 
    
    elseif ($data['job_description'] == 'Head of Social Media' && $data['department'] == 'News' || $data['job_description'] == 'Head of Social') {
      sleep(2);
      header('Location: head_social/dashboard.php');
    }

    elseif( strtolower($data['job_description']) == strtolower('Head of Technical') && strtolower($data['department']) == strtolower('News') || strtolower($data['job_description']) == strtolower('Head of Technical') ){
      sleep(2);
      header('Location: head_technical/dashboard.php');
    }

  } else {
    include "includes/errormsg.php";
  }
}

