<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$sessemp_id = $_SESSION['employee_id'];
$sessjob_desc = $_SESSION['job_description'];
$sessposition= $_SESSION['position'];
$sessbranch = $_SESSION['branch'];
$sessdepartment = $_SESSION['department'];
$sessfirstname = $_SESSION['firstname'];
$sesslastname = $_SESSION['lastname'];
$sessunit = $_SESSION['unit'];

if($sessjob_desc !== "Head of Social Media" &&  $sessdepartment !== "News"){
  echo "<script>alert('Login with correct credential'); window.location = '../index.php'</script>";
}

//Log out user if the user is idle for 15 minutes 900
if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 900)) {
    session_unset();
    session_destroy();
    header("location:../index.php") ;
}
$_SESSION['start'] = time();
?>
