<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$sessemp_id = $_SESSION['employee_id'];
$sessjob_desc = $_SESSION['job_description'];
$sessbranch = $_SESSION['branch'];
$sessdepartment = $_SESSION['department'];
$sessfirstname = $_SESSION['firstname'];
$sesslastname = $_SESSION['lastname'];
$sessjob_post = $_SESSION['position'];
$job_roles = ['Department Head','Transport coordinator'];
if(!in_array($sessjob_desc,$job_roles)){
  echo "<script>alert('Login with correct credentials'); window.location = '../index.php'</script>";
}

?>
