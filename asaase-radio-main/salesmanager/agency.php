<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT * FROM sales_agency
            WHERE agency_branch = '$sessbranch'
            AND archive_agency = 'No'
            ORDER BY agency_name ASC";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Weekly Sales Report </title>
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
            <li class="is-active"><a href="#" aria-current="page">Sales Reports</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1" >
              <div class="column is-half">
                <h1 class="title is-size-5">Agencies</h1>
              </div>
            </div>
          </div>


          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <a href="addagency.php" class="button is-info " type="button" name="button" id="addbtn">Add Agency</a>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="genagency.php" class="button is-white" type="button" name="button" id="addbtn">
                    <i class="fas fa-print"></i>&nbsp; Generate Report
                  </a>
                </p>
              </div>
            </div>
          </div>


          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Reports" id="search">
                    <span class="icon is-small is-left">
                      <i class="fas fa-search"></i>
                    </span>
                  </p>
                </div>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="archiveagency.php" class="button is-white" type="button" name="button" id="addbtn">
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
                    <th class="is-size-6 is-size-7-mobile">Agency Name</th>
                    <th class="is-size-6 is-size-7-mobile">Agency Email</th>
                    <th class="is-size-6 is-size-7-mobile">Agency Phone Number</th>
                    <th class="is-size-6 is-size-7-mobile">Agency Address</th>
                    <th class="is-size-6 is-size-7-mobile">Contact Name</th>
                    <th class="is-size-6 is-size-7-mobile">Contact Phone</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['agency_name']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['agency_email']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['agency_phone']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['agency_location']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['contact_name']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['contact_phone']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">
                      <a class="button is-size-7 is-info m-1" title="update agency"  href="editagency.php?agency_id=<?php echo $row['agency_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete agency"  href="agency.php?agency_id=<?php echo $row['agency_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
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
<script>
  const fileInput = document.querySelector('#file-js-example input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-example .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
