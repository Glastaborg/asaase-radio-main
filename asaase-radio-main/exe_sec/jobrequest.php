<?php
session_start();
$sessbranch = $_SESSION['branch'];
$sessdept = $_SESSION['department'];
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT * FROM job_request
            WHERE jr_branch = '$sessbranch'
            AND jr_department = '$sessdept'
            ORDER BY jr_req_date DESC";
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
            <li class="is-active"><a href="#" aria-current="page">Job Request</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Job Request</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Job Request" id="search">
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
                <a href="addjobreq.php" class="button is-info " type="button" name="button">Add Job Request</a>
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
                  <a href="archiveprogram.php" class="button is-white" type="button" name="button" id="addbtn">
                    <i class="fas fa-archive"></i>&nbsp; View Archived Data
                  </a>
                </p>
              </div>
            </div>
          </div>

          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                <thead>
                  <tr>
                    <th class="is-size-6 is-size-7-mobile">Request</th>
                    <th class="is-size-6 is-size-7-mobile">Role</th>
                    <th class="is-size-6 is-size-7-mobile has-text-centered">Status</th>
                    <th class="is-size-6 is-size-7-mobile">Expected Date</th>
                    <th class="is-size-6 is-size-7-mobile">Date of Request</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                        if ($row['jr_status'] === 'Approved') {
                          $style = "has-background-success has-text-light";
                        }
                        elseif ($row['jr_status'] === 'Pending') {
                          $style = "has-background-warning";
                        }
                        elseif ($row['jr_status'] === 'Declined') {
                          $style = "has-background-danger has-text-light";
                        }
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_request']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_role']; ?></td>
                    <td class="is-size-6 is-size-7-mobile has-text-centered" ><div class="<?php echo $style; ?> p-2 " ><?php echo $row['jr_status']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_exp_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_req_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">
                      <?php if ($row['jr_status'] === 'Pending') { ?>
                      <a class="button is-size-7 is-info m-1" title="update"  href="editjobreq.php?jr_id=<?php echo $row['jr_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete"  href="jobrequest.php?jr_id=<?php echo $row['jr_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    <?php   } ?>
                    </td>
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
