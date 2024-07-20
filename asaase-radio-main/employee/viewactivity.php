<?php
session_start();
include('../connection.php');
include('includes/auth.php');
if(isset($_GET['activity_id'])){
    $activity_id = $_GET['activity_id'];
  }

  $query = "SELECT * FROM activities
            WHERE activities.activity_id = '$activity_id'";
  $result = mysqli_query($dbcon, $query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Admin Activities </title>
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
            <li><a href="activities.php" aria-current="page">Activities</a></li>
            <li class="is-active"><a href="#" aria-current="page">View Activities</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <p class="has-text-left">
                </p>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="" class="button is-white" type="button" name="button" id="print">
                    <i class="fas fa-print"></i>&nbsp; Print Report
                  </a>
                </p>
              </div>
            </div>
          </div>
          <div class="column is-full" id="report">
            <div class="columns is-multiline">
              <div class="column is-full">
                <p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>
                <h2 class="title is-size-4 has-text-centered">ACTIVITY DETAILS</h2>
                <h1 class="title is-size-5 pb-5">Activity Name: <?php echo $row['activity_name']; ?></h1>
                <h1 class="subtitle is-size-6 ">Branch: <?php echo $row['branch']; ?></h1>
                <h1 class="subtitle is-size-6">Date: <?php echo $row['activity_date']; ?></h1>
                <h1 class="subtitle is-size-6">Activity Status: <?php echo $row['activity_status']; ?></h1>
              </div>

              <!-- activity report-->
              <div class="column is-full is-align-items-center">
                <div class="table-container">
                  <table class="table is-fullwidth is-striped is-bordered is-narrow is-hoverable" id="table">
                    <thead>
                      <tr>
                        <th class="is-size-6 is-size-7-mobile">ASSIGNMENT</th>
                        <th class="is-size-6 is-size-7-mobile">TEAM MEMBERS</th>
                        <th class="is-size-6 is-size-7-mobile">ESTIMATES</th>
                        <th class="is-size-6 is-size-7-mobile">OBSERVATION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['assignment']; ?></td>
                        <td class="is-size-6 is-size-7-mobile">
                        <?php
                            $activity_id = $row['activity_id'];
                            $tmquery = "SELECT * FROM employee
                                        INNER JOIN teammembers ON teammembers.employee_id = employee.employee_id
                                        WHERE teammembers.activity_id = '$activity_id'";
                            $tmresult = mysqli_query($dbcon, $tmquery);
                            while($tmrow = mysqli_fetch_assoc($tmresult)){
                          ?>

                            <p><?php echo $tmrow['firstname']; ?> <?php echo $tmrow['lastname']; ?></p>

                          <?php } ?>
                        </td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['estimates']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['observation']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

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
$(document).ready(function(){
    var report = document.getElementById('report').innerHTML;
    var mainbody = document.body.innerHTML;
    var css = '<link rel="stylesheet" href="../css/bulma.min.css">';
    $("#print").click(function(){
      document.body.innerHTML = "<html><head><title></title>" + css + "</head><body>" + report + "</body>";
      window.print();
      document.body.innerHTML = mainbody;
    });
});
</script>
