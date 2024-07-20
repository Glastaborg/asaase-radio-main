<?php
session_start();
include('../../connection.php');

$perf_id = $_SESSION['perf_id'];


// Update part d supervisor
if (isset($_POST['mgn_update'])) {
    $part_d_id = $_POST['part_d_id'];
    $mgn_comment = $_POST['mgn_comment'];

    $query = "UPDATE perf_part_d SET  
              mgn_comment = '$mgn_comment',
              mgn_date = NOW() 
              WHERE part_d_id  = '$part_d_id'";
    $result = mysqli_query($dbcon, $query);

    if($result){
      echo "<script> alert('Comment was added to review form'); window.location.href='../perf-mgn-preview.php?perf_id=".$perf_id."'</script>";
    }else{
        echo "<script> alert('Comment was not added to review form'); window.location.href='../perf-mgn-preview.php?perf_id=".$perf_id."'</script>";
    }

}


?>

