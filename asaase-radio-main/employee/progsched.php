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
            <li class="is-active"><a href="#" aria-current="page">Program Lineup</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Program Lineup</h1>
              </div>
              <div class="column">
              </div>
            </div>
          </div>



          <div class="column is-full is-align-items-center">
            <h3 class="subtitle is-size-5 has-text-centered">Asaase Radio <br> Content & Programme Grid </h3>
            <div class="">
              <table class=" table is-narrow is-striped is-narrow is-hoverable" id="table" style="overflow: scroll;">
                <tbody>
                  <tr>
                    <td>Monday</td>
                    <?php
                      $mon1query = "SELECT *,program_schedule.program_id AS prog_id FROM program_schedule
                                    INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                    WHERE  day = 'Monday' ORDER BY start_time ASC";
                      $mon1result = mysqli_query($dbcon, $mon1query);
                      while ($mon1row = mysqli_fetch_array($mon1result)) {
                    ?>
                    <td>
                      <a href="editprogramsched.php?program_id=<?php echo $mon1row['prog_id']; ?>">
                        <div class="card p-1" style="background: <?php echo $mon1row['program_color']; ?> ;">
                          <p class="card-content has-text-centered is-size-7">
                            <?php echo $mon1row['program']; ?> <br> <br>
                            <?php
                              $start_time = new DateTime($mon1row['start_time']);
                              $start_time = $start_time->format('H:i');

                              $end_time = new DateTime($mon1row['end_time']);
                              $end_time = $end_time->format('H:i A');

                              echo $start_time;
                              echo "-";
                              echo $end_time;
                             ?>
                          </p>
                        </div>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <td>Tuesday</td>
                    <?php
                      $mon1query = "SELECT *,program_schedule.program_id AS prog_id FROM program_schedule
                                    INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                    WHERE  day = 'Tuesday' ORDER BY start_time ASC";
                      $mon1result = mysqli_query($dbcon, $mon1query);
                      while ($mon1row = mysqli_fetch_array($mon1result)) {
                    ?>
                    <td>
                      <a href="editprogramsched.php?program_id=<?php echo $mon1row['prog_id']; ?>">
                        <div class="card p-1" style="background: <?php echo $mon1row['program_color']; ?> ;">
                          <p class="card-content has-text-centered is-size-7">
                            <?php echo $mon1row['program']; ?> <br> <br>
                            <?php
                              $start_time = new DateTime($mon1row['start_time']);
                              $start_time = $start_time->format('H:i');

                              $end_time = new DateTime($mon1row['end_time']);
                              $end_time = $end_time->format('H:i A');

                              echo $start_time;
                              echo "-";
                              echo $end_time;
                             ?>
                          </p>
                        </div>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <?php
                      $mon1query = "SELECT *,program_schedule.program_id AS prog_id FROM program_schedule
                                    INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                    WHERE  day = 'Wednesday' ORDER BY start_time ASC";
                      $mon1result = mysqli_query($dbcon, $mon1query);
                      while ($mon1row = mysqli_fetch_array($mon1result)) {
                    ?>
                    <td>
                      <a href="editprogramsched.php?program_id=<?php echo $mon1row['prog_id']; ?>">
                        <div class="card p-1" style="background: <?php echo $mon1row['program_color']; ?> ;">
                          <p class="card-content has-text-centered is-size-7">
                            <?php echo $mon1row['program']; ?> <br> <br>
                            <?php
                              $start_time = new DateTime($mon1row['start_time']);
                              $start_time = $start_time->format('H:i');

                              $end_time = new DateTime($mon1row['end_time']);
                              $end_time = $end_time->format('H:i A');

                              echo $start_time;
                              echo "-";
                              echo $end_time;
                             ?>
                          </p>
                        </div>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <td>Thursday</td>
                    <?php
                      $mon1query = "SELECT *,program_schedule.program_id AS prog_id FROM program_schedule
                                    INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                    WHERE  day = 'Thursday' ORDER BY start_time ASC";
                      $mon1result = mysqli_query($dbcon, $mon1query);
                      while ($mon1row = mysqli_fetch_array($mon1result)) {
                    ?>
                    <td>
                      <a href="editprogramsched.php?program_id=<?php echo $mon1row['prog_id']; ?>">
                        <div class="card p-1" style="background: <?php echo $mon1row['program_color']; ?> ;">
                          <p class="card-content has-text-centered is-size-7">
                            <?php echo $mon1row['program']; ?> <br> <br>
                            <?php
                              $start_time = new DateTime($mon1row['start_time']);
                              $start_time = $start_time->format('H:i');

                              $end_time = new DateTime($mon1row['end_time']);
                              $end_time = $end_time->format('H:i A');

                              echo $start_time;
                              echo "-";
                              echo $end_time;
                             ?>
                          </p>
                        </div>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <td>Friday</td>
                    <?php
                      $mon1query = "SELECT *,program_schedule.program_id AS prog_id FROM program_schedule
                                    INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                    WHERE  day = 'Friday' ORDER BY start_time ASC";
                      $mon1result = mysqli_query($dbcon, $mon1query);
                      while ($mon1row = mysqli_fetch_array($mon1result)) {
                    ?>
                    <td>
                      <a href="editprogramsched.php?program_id=<?php echo $mon1row['prog_id']; ?>">
                        <div class="card p-1" style="background: <?php echo $mon1row['program_color']; ?> ;">
                          <p class="card-content has-text-centered is-size-7">
                            <?php echo $mon1row['program']; ?> <br> <br>
                            <?php
                              $start_time = new DateTime($mon1row['start_time']);
                              $start_time = $start_time->format('H:i');

                              $end_time = new DateTime($mon1row['end_time']);
                              $end_time = $end_time->format('H:i A');

                              echo $start_time;
                              echo "-";
                              echo $end_time;
                             ?>
                          </p>
                        </div>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <td>Saturday</td>
                    <?php
                      $mon1query = "SELECT *,program_schedule.program_id AS prog_id FROM program_schedule
                                    INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                    WHERE  day = 'Saturday' ORDER BY start_time ASC";
                      $mon1result = mysqli_query($dbcon, $mon1query);
                      while ($mon1row = mysqli_fetch_array($mon1result)) {
                    ?>
                    <td>
                      <a href="editprogramsched.php?program_id=<?php echo $mon1row['prog_id']; ?>">
                        <div class="card p-1" style="background: <?php echo $mon1row['program_color']; ?> ;">
                          <p class="card-content has-text-centered is-size-7">
                            <?php echo $mon1row['program']; ?> <br> <br>
                            <?php
                              $start_time = new DateTime($mon1row['start_time']);
                              $start_time = $start_time->format('H:i');

                              $end_time = new DateTime($mon1row['end_time']);
                              $end_time = $end_time->format('H:i A');

                              echo $start_time;
                              echo "-";
                              echo $end_time;
                             ?>
                          </p>
                        </div>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>
                  <tr>
                    <td>Sunday</td>
                    <?php
                      $mon1query = "SELECT *,program_schedule.program_id AS prog_id FROM program_schedule
                                    INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                    WHERE  day = 'Sunday' ORDER BY start_time ASC";
                      $mon1result = mysqli_query($dbcon, $mon1query);
                      while ($mon1row = mysqli_fetch_array($mon1result)) {
                    ?>
                    <td>
                      <a href="editprogramsched.php?program_id=<?php echo $mon1row['prog_id']; ?>">
                        <div class="card p-1" style="background: <?php echo $mon1row['program_color']; ?> ;">
                          <p class="card-content has-text-centered is-size-7">
                            <?php echo $mon1row['program']; ?> <br> <br>
                            <?php
                              $start_time = new DateTime($mon1row['start_time']);
                              $start_time = $start_time->format('H:i');

                              $end_time = new DateTime($mon1row['end_time']);
                              $end_time = $end_time->format('H:i A');

                              echo $start_time;
                              echo "-";
                              echo $end_time;
                             ?>
                          </p>
                        </div>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>

                </tbody>
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
