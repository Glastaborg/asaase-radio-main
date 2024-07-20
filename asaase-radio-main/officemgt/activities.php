<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT activities.* FROM activities
            WHERE branch = '$sessbranch' AND department = '$sessdepartment'
            AND archive_act = 'No'
            ORDER BY activity_date DESC, branch";
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
            <li class="is-active"><a href="#" aria-current="page">Activities</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-3" >
              <div class="">
                <p class="panel-tabs">
                  <a class="is-active">All Activities</a>
                  &nbsp;&nbsp;
                  <a href="pendingactivities.php">Pending Activities</a>
                  &nbsp;&nbsp;
                  <a href="ongoingactivities.php">Ongoing Activities</a>
                  &nbsp;&nbsp;
                  <a href="completedactivities.php">Completed Activities</a>
                </p>
              </div>
            </div>
          </div>
          <div class="column is-full">
            <div class="columns is-align-items-center py-1" style="border-bottom: 1px solid #c7c7c7;">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">All Activities</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Activity" id="search">
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
                <a href="addactivity.php" class="button is-info " type="button" name="button">Add Activity</a>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="genact.php" class="button is-white" type="button" name="button">
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
                  <a href="archiveact.php" class="button is-white" type="button" name="button" id="addbtn">
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
                    <th class="is-size-6 is-size-7-mobile">Date</th>
                    <th class="is-size-6 is-size-7-mobile">Activity Name</th>
                    <th class="is-size-6 is-size-7-mobile">Department</th>
                    <th class="is-size-6 is-size-7-mobile">Status</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['activity_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['activity_name']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['department']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['activity_status']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">
                      <a class="button is-size-7 is-success m-1" title="view event"  href="viewactivity.php?activity_id=<?php echo $row['activity_id']; ?>">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a class="button is-size-7 is-info m-1" title="update event"  href="editactivity.php?activity_id=<?php echo $row['activity_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete event"  href="activities.php?activity_id=<?php echo $row['activity_id']; ?>">
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
