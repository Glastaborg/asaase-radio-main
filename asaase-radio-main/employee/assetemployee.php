<?php
session_start();
$sessbranch = $_SESSION['branch'];
$sessdept = $_SESSION['department'];
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT *, assets.branch AS assbranch FROM asset_employee
            INNER JOIN assets ON assets.asset_id = asset_employee.asset_id
            INNER JOIN employee ON employee.employee_id = asset_employee.employee_id
            WHERE asset_employee.employee_id = '$sessemp_id'
            AND asset_type = 'Vehicle'
            AND archive_asset_employee = 'No'";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head </title>
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
            <li class="is-active"><a href="#" aria-current="page">Vehicles Assigned</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Vehicle Request</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Vehicle Request" id="search">
                    <span class="icon is-small is-left">
                      <i class="fas fa-search"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <!-- <a href="addassetreq.php" class="button is-info " type="button" name="button">Add Vehicle Request</a> -->
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="genprogram.php" class="button is-white" type="button" name="button">
                    <i class="fas fa-print"></i>&nbsp; Generate Report
                  </a>
                </p>
              </div>
            </div>
          </div>

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  
                </p>
              </div>
            </div>
          </div>

          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                <thead>
                  <tr>
                    <th class="is-size-6 is-size-7-mobile">Vehicle</th>
                    <th class="is-size-6 is-size-7-mobile">Description</th>
                    <th class="is-size-6 is-size-7-mobile">Assigning Date</th>
                    <th class="is-size-6 is-size-7-mobile">Return Date</th>
                   
                  </tr>
                </thead>
                 <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['asset']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['description']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['col_date']; ?> - <?php echo $row['col_time']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['return_date']; ?> - <?php echo $row['return_time']; ?></td>
                    
                  </tr>
                </tbody>
                <?php } ?>
               
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
