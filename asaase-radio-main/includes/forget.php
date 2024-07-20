<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (isset($_POST['forget'])) {
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = base64_encode($password);

  $query = "SELECT * FROM employee WHERE email = '$email' AND phone = '$phone'";
  $result = mysqli_query($dbcon, $query);

  if (mysqli_affected_rows($dbcon) == 1) {
    echo include"includes/successmsg.php";
    $data = mysqli_fetch_array($result);
    $_SESSION['employee_id'] = $data['employee_id'];
      sleep(2);
      header('Location: reset.php');
  }else{
      include "includes/errormsg.php";
  }
}
?>
