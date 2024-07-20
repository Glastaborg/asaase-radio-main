<?php
session_start();
include('../../connection.php');

$perf_id = $_SESSION['perf_id'];

//delete part a
if (isset($_GET['del_part_a_id'])) {
  $part_a_id= $_GET['del_part_a_id'];

  $query = "DELETE FROM perf_part_a WHERE part_a_id  = '$part_a_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
      echo "<script> alert('Data was deleted'); window.location.href='../part-a.php?perf_part_a_id=".$perf_id."'</script>";
  }else{
      echo "<script> alert('Data was not deleted'); window.location.href='../part-a.php?perf_part_a_id=".$perf_id."'</script>";
  }
}



// Update part a
if (isset($_POST['update_part_a'])) {
    $part_a_id = $_POST['part_a_id'];
    $key_results = $_POST['key_results'];
    $part_a_w = $_POST['part_a_w'];
    $part_a_ws = $_POST['part_a_ws'];
    $target_desc = $_POST['target_desc'];
    $outcome_desc = $_POST['outcome_desc'];
    $part_a_rating = $_POST['part_a_rating'];
    $part_a_act_score = $_POST['part_a_act_score'];

    $query = "UPDATE perf_part_a SET  
              key_results = '$key_results', 
              part_a_w = '$part_a_w', 
              part_a_ws = '$part_a_ws', 
              target_desc = '$target_desc', 
              outcome_desc = '$outcome_desc', 
              part_a_rating = '$part_a_rating', 
              part_a_act_score = '$part_a_act_score'
              WHERE part_a_id  = '$part_a_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
      echo "<script> alert('Data was updated'); window.location.href='../part-a.php?perf_part_a_id=".$perf_id."'</script>";
    }else{
        echo "<script> alert('Data was not updated'); window.location.href='../part-a.php?perf_part_a_id=".$perf_id."'</script>";
    }

}


?>