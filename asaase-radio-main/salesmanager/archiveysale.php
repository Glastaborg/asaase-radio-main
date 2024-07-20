<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/restore.php');

  $query = "SELECT * FROM yet_sales
            WHERE branch = '$sessbranch'
            AND archive_ysales = 'Yes'
            ORDER BY date DESC, branch";
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
                <h1 class="title is-size-5">Archived Yet to Date Sales Reports</h1>
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
                  <a href="ysalesreports.php" class="button is-white" type="button" name="button" id="addbtn">
                    <i class="fas fa-hand-holding-usd"></i>&nbsp; View All Yet to Date Sales
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
                    <th class="is-size-6 is-size-7-mobile">Date</th>
                    <th class="is-size-6 is-size-7-mobile">Sales Target Yet to Date</th>
                    <th class="is-size-6 is-size-7-mobile">Sales to Date</th>
                    <th class="is-size-6 is-size-7-mobile">Reason for Difference</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['sales_target_yet']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['sales_to_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile" style="width:30%"><?php echo $row['reason']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">
                      <a class="button is-size-7 is-success m-1" title="restore week sales"  href="archiveysale.php?yet_sales_id=<?php echo $row['yet_sales_id']; ?>">
                        <i class="fas fa-trash-restore"></i>
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
