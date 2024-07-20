<?php
session_start();
include('../../connection.php');

$perf_id = $_SESSION['perf_id'];


// Update part d supervisor
if (isset($_POST['hr_update'])) {
    $part_d_id = $_POST['part_d_id'];
    $hr_comment = $_POST['hr_comment'];

    $query = "UPDATE perf_part_d SET  
              hr_comment = '$hr_comment',
              hr_date = NOW() 
              WHERE part_d_id  = '$part_d_id'";
    $result = mysqli_query($dbcon, $query);

    if($result){
      echo "<script> alert('Comment was added to review form'); window.location.href='../perf-hr-preview.php?perf_id=".$perf_id."'</script>";
    }else{
        echo "<script> alert('Comment was not added to review form'); window.location.href='../perf-hr-preview.php?perf_id=".$perf_id."'</script>";
    }

}


?>

