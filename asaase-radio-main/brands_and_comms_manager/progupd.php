<?php
  include('../connection.php');

  $prog_upt_id = $_POST['id'];
  $query = "DELETE FROM program_update WHERE prog_upt_id = '$prog_upt_id' ";
  $result = mysqli_query($dbcon, $query);
?>
