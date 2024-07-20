<?php
session_start();
include('../connection.php');
include('includes/auth.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || General Manager Generate Report Employees </title>
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
            <li><a href="employees.php">Employees</a></li>
            <li class="is-active"><a href="#" aria-current="page">Generate Report</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <form class="column is-half" action="genemp.php" method="post">
            <h1 class="title is-size-5">Generate Employees Report</h1>
            <div class="field">
              <label class="label">Branch <span class="has-text-danger">*</span></label>
              <div class="control">
                <input type="text" class="input" name="branch" placeholder="Select or Enter Branch" list="branchlist" required>
                <datalist name="branch" id="branchlist">
                  <option disabled>Select Branch</option>
                  <option value="All">All</option>
                  <?php
                  $query = "SELECT branch FROM branch WHERE branch <> 'Admin'";
                  $result = mysqli_query($dbcon, $query);
                  while($row = mysqli_fetch_array($result)){
                  ?>
                  <option value="<?php echo $row['branch']; ?>"></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <div class="field is-grouped my-5">
              <p class="control  is-size-6">
                <button class="button is-info" name="genemp">
                  &nbsp; Generate &nbsp;
                </button>
              </p>
              <p class="control is-expanded">

              </p>
            </div>
          </form>

          <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
            <p class="has-text-right has-text-info">
              <a href="" class="button is-white" type="button" name="button" id="print">
                <i class="fas fa-print"></i>&nbsp; Print
              </a>
            </p>
          </div>

          <div class="column is-full" id="report">
            <div class="columns is-multiline has-background-white">
                  <?php include('assets/print.php'); ?>
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
