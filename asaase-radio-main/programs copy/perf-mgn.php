<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

if (isset($_POST['create'])) {
  $today_quater = date('m-d');
  $year = date('Y');

  if ($today_quater >= "01-01" && $today_quater <= "03-31") {
      $perf_period = "First Quarter - ".$year;
  }elseif ($today_quater >= "07-01" && $today_quater <= "09-30") {
      $perf_period = "Third Quarter - ".$year;
  }

  if ($perf_period) {
    $check_entry = "SELECT perf_period FROM perf_rev WHERE perf_period = '$perf_period' AND perf_emp_id = '$sessemp_id'";
    $check_result = mysqli_query($dbcon, $check_entry);
    if (mysqli_num_rows($check_result) > 0) {
      echo "<script> alert('You already have a performance review entry'); window.location.href('perf-review.php');</script>";
    }else{
      $perf_emp_id = $_POST['perf_emp_id'];
      $perf_date = $_POST['perf_date'];
      $perf_id = $perf_emp_id.'-'.$perf_date;

      $perf_query = "INSERT INTO perf_rev (perf_id, perf_emp_id, perf_period) VALUES ('$perf_id','$perf_emp_id','$perf_period')";
      $perf_results = mysqli_query($dbcon, $perf_query);

      if ($perf_results) {
        echo "<script> alert('Performance Review is created, continue by filling with your supervisor'); window.location.href('perf-review.php');</script>";
      } else {
        echo "<script> alert('Performance Review was not created, try again'); window.location.href('perf-review.php');</script>";
      }
    }
  }

}

  $query = "SELECT * FROM perf_rev
            INNER JOIN employee ON employee.employee_id = perf_rev.perf_emp_id
            WHERE employee.branch = '$sessbranch' AND employee.department = '$sessdepartment'
            ORDER BY perf_date DESC";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio  </title>
    <!-- CSS Links-->
    <?php include("../includes/includes_css.php"); ?>
    <!-- Js Scripts-->
    <?php include("../includes/includes_js.php"); ?>
  </head>
  <body class="has-background-light">
    <div class="columns">
      <?php include('includes/sidebar.php'); ?>
      <div class="column is-10 has-background-light" id="main">
        <?php include('includes/navbar.php'); ?>
        <nav class="breadcrumb p-3" aria-label="breadcrumbs">
          <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> &nbsp; Dashboard</a></li>
            <li class="is-active"><a href="#" aria-current="page">Performace Review</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Performance Review</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search" id="search">
                    <span class="icon is-small is-left">
                      <i class="fas fa-search"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>




          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <thead>
                  <tr >
                    <th class="is-size-6 is-size-7-mobile">Employee Name</th>
                    <th class="is-size-6 is-size-7-mobile">Created Date</th>
                    <th class="is-size-6 is-size-7-mobile">Period</th>
                    <th class="is-size-6 is-size-7-mobile has-text-right pr-6">Actions</th>
                  </tr>
                </thead>
                <?php while($row = mysqli_fetch_array ($result)){ ?>
                <tbody>
                  <tr class="datatr" >
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['perf_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['perf_period']; ?></td>
                    <td class="is-size-6 is-size-7-mobile has-text-right pr-6">
                      <?php //if ($row['leave_status'] !== 'Granted' AND $row['leave_status'] !== 'Rejected') {

                     ?>
                     <a class="button is-size-7 is-info m-1" title="update"  href="perf-mgn-preview.php?perf_id=<?php echo $row['perf_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      
                      <?php //} ?>
                    </td>
                  </tr>
                  <?php } } else {
                    echo '<tr><td><p class="subtitle is-size-6 py-3 has-text-danger">You have no performance review data</p></td></tr>';
                  }?>
                </tbody>
              </table>
            </div>
          </div>


        </div>
      </div>
    </div>
  </body>
</html>

<script>
//Sidebar Menu
function sideBar() {
   var aside = document.getElementById("aside");
   aside.classList.toggle("active");
}

//Search  Function
$(document).ready(function(){
  $('#search').on('keyup', function(){
    var searchTerm = $(this).val().toLowerCase();
    $('#table tbody tr').each(function(){
      var lineStr = $(this).text().toLowerCase();
      if (lineStr.indexOf(searchTerm) === -1) {
        $(this).hide();
      }else {
        $(this).show();
      }
    });
  });
});
</script>
