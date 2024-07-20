<?php
session_start();
include('../../connection.php');

$perf_id = $_SESSION['perf_id'];

//delete part a
if (isset($_GET['del_part_c_id'])) {
  $part_c_id= $_GET['del_part_c_id'];

  $query = "DELETE FROM perf_part_c WHERE part_c_id  = '$part_c_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
      echo "<script> alert('Data was deleted'); window.location.href='../part-c.php?perf_part_c_id=".$perf_id."'</script>";
  }else{
      echo "<script> alert('Data was not deleted'); window.location.href='../part-c.php?perf_part_c_id=".$perf_id."'</script>";
  }
}



// Update part a
if (isset($_POST['update_part_c'])) {
    $part_c_id = $_POST['part_c_id'];
    $sum_of_id = $_POST['sum_of_id'];
    $dev_sup_need = $_POST['dev_sup_need'];

    $query = "UPDATE perf_part_c SET  
              sum_of_id = '$sum_of_id', 
              dev_sup_need = '$dev_sup_need' 
              WHERE part_c_id  = '$part_c_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
      echo "<script> alert('Data was updated'); window.location.href='../part-c.php?perf_part_c_id=".$perf_id."'</script>";
    }else{
        echo "<script> alert('Data was not updated'); window.location.href='../part-c.php?perf_part_c_id=".$perf_id."'</script>";
    }

}


?>