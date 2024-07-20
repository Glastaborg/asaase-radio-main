<?php
session_start();
include('../connection.php');
include('includes/auth.php');



// Function to check if a date is a holiday
function isHoliday($date, $holidays)
{
  return in_array($date, $holidays);
}

function calculate_days_left($date_from, $date_to)
{
  $start_date = new DateTime($date_from);
  $end_date = new DateTime($date_to);

  // Array of holidays (in YYYY-MM-DD format)
  $holidays = [
    "2024-01-01", // New Year's Day
    "2024-01-07", // Constitution Day
    "2024-03-06", // Independence Day
    "2024-03-29", // Good Friday
    "2024-04-01", // Easter Monday
    "2024-05-01", // May Day (Workers' Day)
    "2024-08-04", // Founders’ Day
    "2024-09-21", // Kwame Nkrumah Memorial Day
    "2024-12-06", // Farmer’s Day
    "2024-12-25", // Christmas Day
    "2024-12-26", // Boxing Day
  ];

  // Initialize working days count
  $working_days = 0;

  // Loop through each day between start and end dates
  $current_date = clone $start_date;
  while ($current_date <= $end_date) {
    // Check if current day is not a weekend and not a holiday
    if ($current_date->format('N') < 6 && !isHoliday($current_date->format('Y-m-d'), $holidays)) {
      $working_days++;
    }
    // Move to the next day
    $current_date->modify('+1 day');
  }

  return $working_days;
}

$sessemp_id = $_SESSION['employee_id'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asaase Radio || Employee Dashboard </title>
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
              <p class="subtitle has-text-centered has-text-info-dark is-size-6">Total Teams</p>
              <p class="subtitle has-text-centered has-text-grey-dark">
                <?php
                $query = "SELECT COUNT(id) AS teammembersid  FROM teammembers
                              WHERE teammembers.employee_id = '$sessemp_id'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['teammembersid'];
                }
                ?>
              </p>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="card mt-2 p-1">
            <div class="card-content">
              <p class="subtitle has-text-centered has-text-warning is-size-3"><i class="fas fa-calendar-day"></i></p>
              <p class="subtitle has-text-centered has-text-warning-dark is-size-6">Pending Activities</p>
              <p class="subtitle has-text-centered has-text-grey-dark">
                <?php
                $query = "SELECT COUNT(activities.activity_id) AS totalpendingactivities FROM activities
                              INNER JOIN teammembers ON teammembers.activity_id = activities.activity_id
                              WHERE activities.activity_status = 'Pending'
                              AND teammembers.employee_id = '$sessemp_id'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['totalpendingactivities'];
                }
                ?>
              </p>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="card mt-2 p-1">
            <div class="card-content">
              <p class="subtitle has-text-centered has-text-brown is-size-3"><i class="far fa-calendar-alt"></i></p>
              <p class="subtitle has-text-centered has-text-brown is-size-6">Ongoing Activities</p>
              <p class="subtitle has-text-centered has-text-grey-dark">
                <?php
                $query = "SELECT COUNT(activities.activity_id) AS totalongoingactivities FROM activities
                              INNER JOIN teammembers ON teammembers.activity_id = activities.activity_id
                              WHERE activities.activity_status = 'Ongoing'
                              AND teammembers.employee_id = '$sessemp_id'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['totalongoingactivities'];
                }
                ?>
              </p>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="card mt-2 p-1">
            <div class="card-content">
              <p class="subtitle has-text-centered has-text-success is-size-3"><i class="far fa-calendar-check"></i></p>
              <p class="subtitle has-text-centered has-text-success-dark is-size-6">Completed Activities</p>
              <p class="subtitle has-text-centered has-text-grey-dark">
                <?php
                $query = "SELECT COUNT(activities.activity_id) AS totalcompletedactivities FROM activities
                              INNER JOIN teammembers ON teammembers.activity_id = activities.activity_id
                              WHERE activities.activity_status = 'Completed'
                              AND teammembers.employee_id = '$sessemp_id'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['totalcompletedactivities'];
                }
                ?>
              </p>
            </div>
          </div>
        </div>

      </div>
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
                                  INNER JOIN teammembers ON teammembers.activity_id = activities.activity_id
                                  WHERE activities.activity_status  = 'Pending'
                                  AND teammembers.employee_id = '$sessemp_id'
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


      <div class="column">
        <div class="card is-info">
          <div class="message-header">
            <p>My Leave Notification</p>
            <button class="button" onclick="window.location='leave.php';"> View All</button>
          </div>
          <div class="message-body has-background-white" id="rowbody">
            <div class="table-container">
              <table class="table is-fullwidth has-background-transparent">
                <tbody>
                  <?php
                  $query = "SELECT * FROM employee_leave WHERE employee_id = '$sessemp_id' ORDER BY date_from DESC LIMIT 5";
                  $result = mysqli_query($dbcon, $query);
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<article class='media'>";
                    echo "<figure class='media-left'>";
                    echo "<span class='icon has-text-primary is-large'><i class='fas fa-2x fa-envelope'></i></span>";
                    echo "</figure>";
                    echo "<div class='media-content'>";
                    echo "<div class='content'>";
                    echo "<p>";
                    echo "<strong>Leave Period: </strong> <span class='tag is-warning'>" . $row['date_from'] . "</span> to <span class='tag is-warning'>" . $row['date_to'] . "</span>";
                    echo "<br />";
                    echo "<strong>Reason: </strong>" . $row['reason'];
                    echo "<br />";
                    echo "<strong>Days: </strong>" . calculate_days_left($row['date_from'], $row['date_to']);
                    echo "<br />";
                    echo "<strong>Status: </strong>" . $row['leave_status'];
                    echo "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</article>";
                    echo "</td>";
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="columns p-3">
        <div class="column">
          <div class="card is-info">
            <div class="message-header">
              <p>Latest Employee Leave Notification</p>
              <button class="button" onclick="window.location='subleavereq.php';"> View All</button>
            </div>
            <div class="message-body has-background-white" id="rowbody">
              <div class="table-container">
                <table class="table is-fullwidth has-background-transparent">
                  <tbody>
                    <?php
                    $query = "SELECT *, DATEDIFF(date_to,date_from) AS date_diff FROM employee
            INNER JOIN employee_leave ON employee.employee_id = employee_leave.employee_id
            WHERE archive_leave = 'No' AND employee.department='Sales' AND employee.job_description = 'Employee' 
            ORDER BY applied_date DESC";
                    $result = mysqli_query($dbcon, $query);


                    //query for image
                    $imagequery = "SELECT * FROM employee_image";
                    $imageresult = mysqli_query($dbcon, $imagequery);
                    $imagedata = mysqli_fetch_array($imageresult);


                    while ($row = mysqli_fetch_array($result)) {
                      if ($row['leave_status'] === 'Granted') {
                        $style = "has-background-success has-text-light";
                      } elseif ($row['leave_status'] === 'Pending') {
                        $style = "has-background-warning";
                      } elseif ($row['leave_status'] === 'Rejected') {
                        $style = "has-background-danger has-text-light";
                      }
                    ?>
                      <!-- <tr onclick="window.location='editleave.php?leave_id=<?php echo $row['leave_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'"> -->
                        <td class="is-size-6 ">
                          <figure class="image is-48x48">
                            <?php
                            if ($row['employee_id'] == $imagedata['employee_id']) {
                              $image =  $imagedata['imagename'];

                              //echo  '<img class="is-rounded" src="employee_images/wear.jpg" alt="Employee Image">';
                              echo  '<img class="is-rounded" src="../hr/employee_images/' . $image . '"alt="Employee Image">';
                            } else {
                              echo  '<img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">';
                            }
                            ?>
                          </figure>
                        </td>
                        <td class="is-size-6 py-5"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td class="is-size-6 py-5"><?php echo $row['applied_date']; ?> </td>
                        <td class="is-size-6 py-3 " width="50px">
                          <div class="<?php echo $style; ?> p-2 "><?php echo $row['leave_status']; ?></div>
                        </td>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="column">

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