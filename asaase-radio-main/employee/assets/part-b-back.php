<?php
session_start();
include('../../connection.php');

$perf_id = $_SESSION['perf_id'];

//delete part a
if (isset($_GET['del_part_b_id'])) {
  $part_b_id= $_GET['del_part_b_id'];

  $query = "DELETE FROM perf_part_b WHERE part_b_id  = '$part_b_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
      echo "<script> alert('Data was deleted'); window.location.href='../part-b.php?perf_part_b_id=".$perf_id."'</script>";
  }else{
      echo "<script> alert('Data was not deleted'); window.location.href='../part-b.php?perf_part_b_id=".$perf_id."'</script>";
  }
}



// Update part a
if (isset($_POST['update_part_b'])) {
    $part_b_id = $_POST['part_b_id'];
    $dev_target = $_POST['dev_target'];
    $part_b_w = $_POST['part_b_w'];
    $part_b_ws = $_POST['part_b_ws'];
    $dev_targ_def = $_POST['dev_targ_def'];
    $assestment = $_POST['assestment'];
    $part_b_rating = $_POST['part_b_rating'];
    $part_b_act_score = $_POST['part_b_act_score'];

    $query = "UPDATE perf_part_b SET  
              dev_target = '$dev_target', 
              part_b_w = '$part_b_w', 
              part_b_ws = '$part_b_ws', 
              dev_targ_def = '$dev_targ_def', 
              assestment = '$assestment', 
              part_b_rating = '$part_b_rating', 
              part_b_act_score = '$part_b_act_score'
              WHERE part_b_id  = '$part_b_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
      echo "<script> alert('Data was updated'); window.location.href='../part-b.php?perf_part_b_id=".$perf_id."'</script>";
    }else{
        echo "<script> alert('Data was not updated'); window.location.href='../part-b.php?perf_part_b_id=".$perf_id."'</script>";
    }

}


?>