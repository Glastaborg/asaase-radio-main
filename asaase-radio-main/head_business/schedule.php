<?php
  include('../connection.php');

  $prog_sched_id = $_POST['id'];
  $query = "DELETE FROM program_schedule WHERE prog_sched_id = '$prog_sched_id' ";
  $result = mysqli_query($dbcon, $query);
?>
