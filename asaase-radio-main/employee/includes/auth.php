<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$sessemp_id = $_SESSION['employee_id'];
$sessjob_desc = $_SESSION['job_description'];
$sessjob_post = $_SESSION['position'];
$sessbranch = $_SESSION['branch'];
$sessdepartment = $_SESSION['department'];
$sessfirstname = $_SESSION['firstname'];
$sesslastname = $_SESSION['lastname'];
$sessunit = $_SESSION['unit'];



$users = ['Employee','News Anchor', 'Reporter', 'Driver' , 'National Service Personel', 'Receptionist', 'Security','Brands and Comms','Dj', 'Creative designer','Head of Business News','Presenter','Producer','Sales','Head of Business','Head of Legal and Political Desk', 'Sports Presenter', 'Social Media', 'Technical'];

if(!in_array($sessjob_desc, $users) ){
  echo "<script>alert('Login with correct credentials'); window.location = '../index.php'</script>";
}

//Log out user if the user is idle for 15 minutes
// if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 900)) {
//     session_unset();
//     session_destroy();
//     header("location:../index.php") ;
// }
// $_SESSION['start'] = time();
?>
