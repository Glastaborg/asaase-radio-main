<?php
session_start();
include('../connection.php');
include('includes/auth.php');

if(isset($_GET['view'])){
  header("content-type: application/pdf");
  readfile('forms/evaluation.pdf');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Admin Human Resources </title>
    <!-- CSS Links-->
    <?php include("../includes/includes_css.php"); ?>
    <!-- Js Scripts-->
    <?php include("../includes/includes_js.php"); ?>
  </head>
  <body class="has-background-light">
    <center>
    </center>
  </body>
</html>
