<?php
session_start();
include('../connection.php');
include('includes/auth.php');
if(isset($_GET['yet_sales_id'])){
    $yet_sales_id = $_GET['yet_sales_id'];
  }

  $query = "SELECT * FROM yet_sales
            WHERE yet_sales.yet_sales_id = '$yet_sales_id'";
  $result = mysqli_query($dbcon, $query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Admin Weekly Sales Report </title>
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
            <li><a href="ysalesreports.php" aria-current="page">Sales Reports</a></li>
            <li class="is-active"><a href="#" aria-current="page">View Sales Reports</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <p class="has-text-left">
                  <a href="editsalesyet.php?yet_sales_id=<?php echo $row['yet_sales_id']; ?>" class="button is-info mb-2">Edit Sales Details</a>
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
                <h2 class="title is-size-4 has-text-centered">YET TO DATE DETAILS</h2>
                <h1 class="subtitle is-size-6 pt-5">Branch: <?php echo $row['branch']; ?></h1>
                <h1 class="subtitle is-size-6">Date: <?php echo $row['date']; ?></h1>
              </div>

              <!-- activity report-->
              <div class="column is-full is-align-items-center">
                <div class="table-container">
                  <table class="table is-fullwidth is-striped is-bordered is-narrow is-hoverable" id="table">
                    <thead>
                      <tr>
                        <th class="is-size-6 is-size-7-mobile">Sales Target Yet to Date (GHS)</th>
                        <th class="is-size-6 is-size-7-mobile">Sales to Date (GHS)</th>
                        <th class="is-size-6 is-size-7-mobile">Reasons for Difference</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="is-size-6 is-size-7-mobile pb-5"><?php echo $row['sales_target_yet']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pb-5"><?php echo $row['sales_to_date']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pb-5" style="width:50%"><?php echo $row['reason']; ?></td>
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
