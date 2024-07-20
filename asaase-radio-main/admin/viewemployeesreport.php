<?php
session_start();
include('../connection.php');
include('includes/auth.php');
if(isset($_GET['employee_report_id'])){
    $employee_report_id = $_GET['employee_report_id'];
  }

  $query = "SELECT * FROM employee_report
            INNER JOIN activities ON employee_report.activity_id = activities.activity_id
            INNER JOIN employee ON employee_report.employee_id = employee.employee_id
            WHERE employee_report.employee_report_id = '$employee_report_id'";
  $result = mysqli_query($dbcon, $query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Admin View Reports </title>
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
            <li ><a href="employeesreports.php" aria-current="page">Employee Reports</a></li>
            <li class="is-active"><a href="#" aria-current="page">View Employee Reports</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <p class="has-text-left"><a href="editempreport.php?employee_report_id=<?php echo $row['employee_report_id']; ?>" class="button is-info mb-2" type="button" name="button" id="addbtn">Edit Report Details</a></p>
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
                <h2 class="title is-size-4 has-text-centered">EMPLOYEE WEEKLY REPORT</h2>
                <h1 class="title is-size-5 mb-5">Employee Name: <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h1>
                <p class="subtitle is-size-6 mt-3">
                  Date: <?php echo $row['date']; ?>
                </p>
              </div>

              <!-- activity report-->
              <div class="column is-full is-align-items-center">
                <div class="table-container">
                  <table class="table is-fullwidth is-striped is-bordered is-narrow is-hoverable" id="table">
                    <thead>
                      <tr>
                        <th class="is-size-6 is-size-7-mobile">DESCRIPTION OF ACTIVITY</th>
                        <th class="is-size-6 is-size-7-mobile">PROGRESS</th>
                        <th class="is-size-6 is-size-7-mobile">NEXT STEP</th>
                        <th class="is-size-6 is-size-7-mobile">COST VALUE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['activity_name']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['progress']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['next_step']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['cost_value']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- achievement report-->
              <div class="column mb-5 is-full is-align-items-center">
                <div class="table-container" >
                  <table class="table is-fullwidth is-striped is-bordered is-narrow is-hoverable rowbody" id="table">
                    <tbody>
                      <tr>
                        <td class="is-size-6 is-size-7-mobile" style="width:50%">ONE THING THAT REQUIRES SUPERVISOR'S ATTENTION</td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['require_attention']; ?></td>
                      </tr>
                      <tr>
                        <td class="is-size-6 is-size-7-mobile" style="width:50%">ONE THING THAT WAS CHALLENGING</td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['challenge']; ?></td>
                      </tr>
                      <tr>
                        <td class="is-size-6 is-size-7-mobile" style="width:50%">SUGGESTION FOR IMPROVEMENT</td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['improve']; ?></td>
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
