<?php
session_start();
if(isset($_SESSION['employee_id'])){
  session_destroy();
  header("location:../index.php") ;
}
else{
  session_destroy();
	header("location:../index.php") ;
}

?>
