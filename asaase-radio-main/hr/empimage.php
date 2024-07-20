<?php
  include('../connection.php');

  $imageid = $_POST['id'];

  $query = "SELECT * FROM employee_image WHERE imageid = '$imageid'";
  $result = mysqli_query($dbcon, $query);
  $result_data = mysqli_fetch_assoc($result);
  $employee_image = $result_data['imagename'];

  if (mysqli_num_rows($result) > 0) {
    $delquery = "DELETE FROM employee_image WHERE imageid = '$imageid' ";
    $delresult = mysqli_query($dbcon, $delquery);
    if ($delresult) {
      unlink('employee_images/'.$employee_image);
    }
  }


?>
