<?php
session_start();
include('../../connection.php');

$perf_id = $_SESSION['perf_id'];

//delete part d
if (isset($_GET['del_part_d_id'])) {
  $part_d_id= $_GET['del_part_d_id'];

  $query = "DELETE FROM perf_part_d WHERE part_d_id  = '$part_d_id'";
  $result = mysqli_query($dbcon, $query);

  if($result){
      echo "<script> alert('Data was deleted'); window.location.href='../part-d.php?perf_part_d_id=".$perf_id."'</script>";
  }else{
      echo "<script> alert('Data was not deleted'); window.location.href='../part-d.php?perf_part_d_id=".$perf_id."'</script>";
  }
}



// Update part d
if (isset($_POST['update_part_d'])) {
    $part_d_id = $_POST['part_d_id'];
    $ts_target = $_POST['ts_target'];
    $ts_job_fund = $_POST['ts_job_fund'];
    $final_score = $_POST['final_score'];
    $final_rating = $_POST['final_rating'];
    $emp_comment = $_POST['emp_comment'];

    $query = "UPDATE perf_part_d SET  
              ts_target = '$ts_target', 
              ts_job_fund = '$ts_job_fund', 
              final_score = '$final_score',
              final_rating = '$final_rating', 
              emp_comment = '$emp_comment',
              emp_date = NOW() 
              WHERE part_d_id  = '$part_d_id'";
    $result = mysqli_query($dbcon, $query);
    if($result){
      echo "<script> alert('Data was updated'); window.location.href='../part-d.php?perf_part_d_id=".$perf_id."'</script>";
    }else{
        echo "<script> alert('Data was not updated'); window.location.href='../part-d.php?perf_part_d_id=".$perf_id."'</script>";
    }

}


// Update part d supervisor
if (isset($_POST['sup_update'])) {
    $part_d_id = $_POST['part_d_id'];
    $sup_comment = $_POST['sup_comment'];

    $query = "UPDATE perf_part_d SET  
              sup_comment = '$sup_comment',
              sup_date = NOW() 
              WHERE part_d_id  = '$part_d_id'";
    $result = mysqli_query($dbcon, $query);

    if($result){
      echo "<script> alert('Comment was added to review form'); window.location.href='../perf-sup-preview.php?perf_id=".$perf_id."'</script>";
    }else{
        echo "<script> alert('Comment was not added to review form'); window.location.href='../perf-sup-preview.php?perf_id=".$perf_id."'</script>";
    }

}


?>

