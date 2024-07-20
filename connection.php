<?php
//turing of errors(use when giving out)
//error_reporting(0);


//turing of errors(when coding and testing)
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


// $server   = "178.128.175.94";
// $user     = "snukqzerxp";
// $password = "6hKdCbXXmC";
// $database = "snukqzerxp";

$server   = "127.0.0.1";
$user     = "root";
$password = "";
$database = "asaase_db";

$dbcon = mysqli_connect($server, $user, $password, $database);

if (!$dbcon) {
    $_SESSION['connMsg'] = "It did not connect";
  }else{
    $_SESSION['connMsg']= "It did connect";
  }
  

?>
