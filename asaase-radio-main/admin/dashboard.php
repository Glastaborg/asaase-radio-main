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
  <title>Asaase Radio || Admin Dashboard </title>
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
      <div class="columns p-3">
        <div class="column">
          <div class="card mt-2 p-1">
            <div class="card-content">
              <p class="subtitle has-text-centered has-text-info is-size-3"><i class="fas fa-users"></i></p>
              <p class="subtitle has-text-centered has-text-info-dark is-size-6">Employees</p>
              <p class="subtitle has-text-centered has-text-grey-dark">
                <?php
                $query = "SELECT COUNT(employee_id) AS totalemployee  FROM employee WHERE deleted ='0'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['totalemployee'];
                }
                ?>
              </p>
            </div>
          </div>
        </div>
        <!-- <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-warning is-size-3"><i class="fas fa-calendar-day"></i></p>
                <p class="subtitle has-text-centered has-text-warning-dark is-size-6">Pending Activities</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                  $query = "SELECT COUNT(activity_id) AS totalpendingactivities FROM activities WHERE activities.activity_status = 'Pending'";
                  $result = mysqli_query($dbcon, $query);
                  if ($row = mysqli_fetch_array($result)) {
                    echo $row['totalpendingactivities'];
                  }
                  ?>
                </p>
              </div>
            </div>
          </div> -->
        <!-- <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-brown is-size-3"><i class="far fa-calendar-alt"></i></p>
                <p class="subtitle has-text-centered has-text-brown is-size-6">Ongoing Activities</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                  $query = "SELECT COUNT(activity_id) AS totalongoingactivities FROM activities WHERE activities.activity_status = 'Ongoing'";
                  $result = mysqli_query($dbcon, $query);
                  if ($row = mysqli_fetch_array($result)) {
                    echo $row['totalongoingactivities'];
                  }
                  ?>
                </p>
              </div>
            </div>
          </div> -->
        <!-- <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-success is-size-3"><i class="far fa-calendar-check"></i></p>
                <p class="subtitle has-text-centered has-text-success-dark is-size-6">Completed Activities</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                  $query = "SELECT COUNT(activity_id) AS totalcompletedactivities FROM activities WHERE activities.activity_status = 'Completed'";
                  $result = mysqli_query($dbcon, $query);
                  if ($row = mysqli_fetch_array($result)) {
                    echo $row['totalcompletedactivities'];
                  }
                  ?>
                </p>
              </div>
            </div>
          </div> -->
      </div>
      <div class="columns p-3">
        <!-- <div class="column">
          <article class="message is-info">
            <div class="message-header">
              <p>Ongoing Activities</p>
            </div>
            <div class="message-body has-background-white" id="rowbody">
              <div class="table-container">
                <table class="table is-narrow is-fullwidth has-background-transparent">
                  <tbody>
                    <?php
                    $query = "SELECT activities.* FROM activities
                                  WHERE activities.activity_status = 'Ongoing'
                                  LIMIT 8";
                    $result = mysqli_query($dbcon, $query);

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                      <tr>
                        <td class="is-size-6"> .</td>
                        <td class="is-size-6"> <i><?php echo $row['activity_name']; ?></i> </td>
                        <td class="is-size-7 has-text-right"><?php echo $row['activity_date']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </article>
        </div> -->
        <div class="column">
          <article class="message is-info">
            <div class="message-header">
              <p>Pending Activities</p>
            </div>
            <div class="message-body has-background-white">
              <div class="table-container">
                <table class="table is-narrow is-fullwidth has-background-transparent">
                  <tbody>
                    <?php
                    $query = "SELECT activities.* FROM activities
                                  WHERE activities.activity_status  = 'Pending'
                                  AND activities.branch = '$sessbranch'
                                  AND archive_act = 'No'
                                  LIMIT 8";
                    $result = mysqli_query($dbcon, $query);
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                          <td class="is-size-6"> <i><?php echo $row['activity_name']; ?></i> </td>
                          <td class="is-size-7 has-text-right"><?php echo $row['activity_date']; ?></td>
                        </tr>
                      <?php } ?>
                    <?php } else { ?>
                      <tr>
                        <td>
                          <div class="notification is-danger is-light is-flex is-align-items-center is-size-7">
                            There are no Pending Activities
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  function sideBar() {
    var aside = document.getElementById("aside");
    aside.classList.toggle("active");
  }
</script>






















































<!-- EDITED BY @GLASTABORG -->