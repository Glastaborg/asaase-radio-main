<?php
session_start();
$sessbranch = $_SESSION['branch'];
$sessdept = $_SESSION['department'];
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT * FROM asset_request
            INNER JOIN employee ON employee.employee_id = asset_request.employee
            WHERE asset_request.driver = '$sessfirstname $sesslastname'
            ORDER BY request_time DESC";
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
            <li class="is-active"><a href="#" aria-current="page">Vehicle Request</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Vehicle Request Assigned</h1>
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
                    <th class="is-size-6 is-size-7-mobile">Employee</th>
                    <th class="is-size-6 is-size-7-mobile">Department</th>
                    <th class="is-size-6 is-size-7-mobile">Date / Time</th>
                    <th class="is-size-6 is-size-7-mobile">From</th>
                    <th class="is-size-6 is-size-7-mobile">To</th>
                    <th class="is-size-6 is-size-7-mobile">Drop Off</th>
                    <th class="is-size-6 is-size-7-mobile has-text-centered">Status</th>
                    <!-- <th class="is-size-6 is-size-7-mobile">Driver</th> -->
                    <!-- <th class="is-size-6 is-size-7-mobile">Actions</th> -->
                  </tr>
                </thead>
               <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                        if ($row['request_status'] === 'Approved') {
                          $style = "has-background-success has-text-light";
                        }
                        elseif ($row['request_status'] === 'Pending') {
                          $style = "has-background-warning";
                        }
                        elseif ($row['request_status'] === 'Declined') {
                          $style = "has-background-danger has-text-light";
                        }
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['department']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['request_time']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['departure']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['destination']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['drop_off']; ?></td>
                    <td class="is-size-6 is-size-7-mobile has-text-centered" ><div class="<?php echo $style; ?> p-2 " ><?php echo $row['request_status']; ?></td>
                   
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
