<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$sessemp_id = $_SESSION['employee_id'];
$sessjob_desc = $_SESSION['job_description'];
$sessbranch = $_SESSION['branch'];
$sessdepartment = $_SESSION['department'];
$sessfirstname = $_SESSION['firstname'];
$sesslastname = $_SESSION['lastname'];

if($sessjob_desc !== "General Manager"){
  echo "<script>alert('Login with correct credentials'); window.location = '../index.php'</script>";
}

//Log out user if the user is idle for 15 minutes
if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 900)) {
    session_unset();
    session_destroy();
    header("location:../index.php") ;
}
$_SESSION['start'] = time();
?>
