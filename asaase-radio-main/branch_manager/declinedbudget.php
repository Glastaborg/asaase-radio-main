<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT * FROM activities
            INNER JOIN activity_budget ON activity_budget.activity_id = activities.activity_id
            WHERE activities.branch = '$sessbranch'
            AND archive_act = 'No' AND archive_activity_budget = 'No'
            AND budget_status = 'Declined'
            ORDER BY activity_date DESC";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Activities </title>
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
            <li class="is-active"><a href="#" aria-current="page">Activity Budget</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-3" >
              <div class="">
                <p class="panel-tabs">
                  <a href="activitybudget.php">All Activity Budget</a>
                  &nbsp;&nbsp;
                  <a href="approvedbudget.php">Approved Budget</a>
                  &nbsp;&nbsp;
                  <a class="is-active">Declined Budget</a>
                  &nbsp;&nbsp;
                  <a href="pendingbudget.php">Pending Budget</a>
                </p>
              </div>
            </div>
          </div>
          <div class="column is-full">
            <div class="columns is-align-items-center py-1" >
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Declined Activity Budget</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Activity Budget" id="search">
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
                <thead>
                  <tr>
                    <th class="is-size-6 is-size-7-mobile">Date</th>
                    <th class="is-size-6 is-size-7-mobile">Branch</th>
                    <th class="is-size-6 is-size-7-mobile">Activity Name</th>
                    <th class="is-size-6 is-size-7-mobile">Budget</th>
                    <th class="is-size-6 is-size-7-mobile">Status</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['applied_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['branch']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['activity_name']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['budget']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['budget_status']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">
                      <?php
                        if ($row['budget_status'] == 'Pending') { ?>
                      <a class="button is-size-7 is-danger m-1" title="delete event"  href="activitybudget.php?activity_budget_id=<?php echo $row['activity_budget_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    <?php } ?>
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
