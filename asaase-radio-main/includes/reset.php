<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (isset($_POST['reset'])) {
  $employee_id = $_SESSION['employee_id'];
  $npassword = $_POST['npassword'];
  $cpassword = $_POST['cpassword'];

    if ($npassword !== $cpassword) {
      echo include "includes/passerrormsg.php";
    }
    else{
      $password = base64_encode($npassword);
      $query = "UPDATE employee SET password = '$password'
                WHERE employee_id = '$employee_id'";
      $result = mysqli_query($dbcon, $query);

        if (mysqli_affected_rows($dbcon) == 1) {
            session_destroy();
            sleep(2);
            include "includes/passsuccessmsg.php";
            header('Location: index.php');
        }else{
            include "includes/passerrormsg.php";
      }
  }
}
?>
