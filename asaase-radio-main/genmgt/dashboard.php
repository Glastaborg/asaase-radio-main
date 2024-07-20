<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

$query = "SELECT *, DATEDIFF(date_to,date_from) AS date_diff FROM employee
            INNER JOIN employee_leave ON employee.employee_id = employee_leave.employee_id
            WHERE archive_leave = 'No'  
            ORDER BY applied_date DESC";
$result = mysqli_query($dbcon, $query);


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
    // Add more holidays if needed
  ];

  // Initialize working days count
  $working_days = 0;

  // Loop through each day between start and end dates
  $current_date = clone $start_date;
  while ($current_date <= $end_date) { // Check if current day is not a weekend and not a holiday if ($current_date->format('N') < 6 && !isHoliday($current_date->format('Y-m-d'), $holidays)) {
    if ($current_date->format('N') < 6 && !isHoliday($current_date->format('Y-m-d'), $holidays)) {
      $working_days++;
    }
    // Move to the next day
    $current_date->modify('+1 day');
  }

  return $working_days;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asaase Radio || General Manager Dashboard </title>
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
                $query = "SELECT COUNT(employee_id) AS totalemployee
                              FROM employee WHERE archive_emp = 'No'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['totalemployee'];
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
                $query = "SELECT COUNT(activity_id) AS totalpendingactivities
                              FROM activities
                              WHERE activity_status = 'Pending' AND archive_act = 'No'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['totalpendingactivities'];
                }
                ?>
              </p>
            </div>
          </div>
        </div>
        <!-- <div class="column">
          <div class="card mt-2 p-1">
            <div class="card-content">
              <p class="subtitle has-text-centered has-text-brown is-size-3"><i class="far fa-calendar-alt"></i></p>
              <p class="subtitle has-text-centered has-text-brown is-size-6">Ongoing Activities</p>
              <p class="subtitle has-text-centered has-text-grey-dark">
                <?php
                $query = "SELECT COUNT(activity_id) AS totalongoingactivities
                              FROM activities
                              WHERE activity_status = 'Ongoing' AND archive_act = 'No'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_array($result)) {
                  echo $row['totalongoingactivities'];
                }
                ?>
              </p>
            </div>
          </div>
        </div> -->
        <div class="column">
          <div class="card mt-2 p-1">
            <div class="card-content">
              <p class="subtitle has-text-centered has-text-success is-size-3"><i class="far fa-calendar-check"></i></p>
              <p class="subtitle has-text-centered has-text-success-dark is-size-6">Employees on Leave</p>
              <p class="subtitle has-text-centered has-text-grey-dark">
                <?php
                $query = "SELECT COUNT(activity_id) AS totalcompletedactivities
                              FROM activities
                              WHERE activity_status = 'Completed' AND archive_act = 'No'";
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
              <p>Pending Job Requests</p>
              <button class="button" onclick="window.location='jobrequest.php';"> View All</button>
            </div>
            <div class="message-body has-background-white" id="rowbody">
              <div class="table-container">
                <table class="table is-fullwidth has-background-transparent">
                  <tbody>
                    <?php
                    $query = "SELECT * FROM job_request
                                  WHERE jr_status = 'Pending'
                                  ORDER BY jr_req_date DESC";
                    $result = mysqli_query($dbcon, $query);

                    while ($row = mysqli_fetch_array($result)) {
                      if ($row['jr_status'] === 'Approved') {
                        $style = "has-background-success has-text-light";
                      } elseif ($row['jr_status'] === 'Pending') {
                        $style = "has-background-warning";
                      } elseif ($row['jr_status'] === 'Declined') {
                        $style = "has-background-danger has-text-light";
                      }
                    ?>
                      <tr onclick="window.location='editjobreq.php?jr_id=<?php echo $row['jr_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'">
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_request']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_role']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_branch']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['jr_department']; ?></td>
                        <td class="is-size-6 is-size-7-mobile has-text-centered">
                          <div class="<?php echo $style; ?> p-2 "><?php echo $row['jr_status']; ?>
                        </td>
                        <td class="is-size-6 is-size-7-mobile has-text-right"><?php echo $row['jr_exp_date']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="columns p-3">
        <div class="column">
          <div class="card is-info">
            <div class="message-header">
              <p>Latest Leave Notification</p>
              <button class="button" onclick="window.location='employeesleavereports.php';"> View All</button>
            </div>
            <div class="message-body has-background-white" id="rowbody">
              <div class="table-container">
                <table class="table is-fullwidth has-background-transparent">
                  <tbody>
                    <?php
                    $query = "SELECT *, DATEDIFF(date_to,date_from) AS date_diff FROM employee
                                  INNER JOIN employee_leave ON employee.employee_id = employee_leave.employee_id
                                  WHERE archive_leave = 'No'
                                  ORDER BY applied_date DESC
                                  LIMIT 20";
                    $result = mysqli_query($dbcon, $query);

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
                        <td class="is-size-6">
                          <figure class="image is-48x48">
                            <?php
                            $imagequery = "SELECT * FROM employee_image WHERE employee_id = '" . $row['employee_id'] . "'";
                            $imageresult = mysqli_query($dbcon, $imagequery);

                            if ($imageresult && mysqli_num_rows($imageresult) > 0) {
                              $imagedata = mysqli_fetch_array($imageresult);

                              // Check if 'employee_id' exists in $imagedata
                              if (isset($imagedata['employee_id']) && $row['employee_id'] == $imagedata['employee_id']) {
                                $image = $imagedata['imagename'];
                                echo '<img class="is-rounded" src="../hr/employee_images/' . $image . '" alt="Employee Image">';
                              } else {
                                echo '<img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">';
                              }
                            } else {
                              // Default image if no record is found
                              echo '<img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">';
                            }
                            ?>
                          </figure>
                        </td>
                        <td class="is-size-6 py-5"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td class="is-size-6 py-5"><?php echo $row['applied_date']; ?> </td>
                        <td class="is-size-6 py-5"><?php echo $row['date_diff']; ?> days</td>
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
          <div class="card is-info">
            <div class="message-header">
              <p>Recent Added Employees</p>
              <button class="button" onclick="window.location='employees.php';"> View All</button>
            </div>
            <div class="message-body has-background-white" id="rowbody">
              <div class="table-container">
                <table class="table is-narrow is-fullwidth has-background-transparent">
                  <tbody>
                    <?php
                    $query = "SELECT employee.* FROM employee
                                WHERE employee.branch <> 'Admin'
                                AND archive_emp = 'No'
                                ORDER BY date_joined DESC
                                LIMIT 10";
                    $result = mysqli_query($dbcon, $query);

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                      <tr class="datatr" onclick="window.location='viewemployees.php?employee_id=<?php echo $row['employee_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'">
                        <td class="is-size-6">
                          <figure class="image is-48x48">
                            <?php
                            $imagequery = "SELECT * FROM employee_image WHERE employee_id = '" . $row['employee_id'] . "'";
                            $imageresult = mysqli_query($dbcon, $imagequery);

                            // Check if the query was successful and if any result was returned
                            if ($imageresult && mysqli_num_rows($imageresult) > 0) {
                              $imagedata = mysqli_fetch_array($imageresult);

                              // Check if 'employee_id' key exists in $imagedata
                              if (isset($imagedata['employee_id']) && $row['employee_id'] == $imagedata['employee_id']) {
                                $image = $imagedata['imagename'];
                                echo '<img class="is-rounded" src="../hr/employee_images/' . $image . '" alt="Employee Image">';
                              } else {
                                echo '<img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">';
                              }
                            } else {
                              // Default image if no record is found
                              echo '<img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">';
                            }
                            ?>
                          </figure>
                        </td>
                        <td class="is-size-6 pt-4"> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td class="is-size-6 pt-4"> <?php echo $row['branch']; ?> </td>
                        <td class="is-size-6 pt-4"><?php echo $row['phone']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="columns p-3">
        <div class="column">
          <article class="card is-info">
            <div class="message-header">
              <p>Weekly Sales Charts</p>
            </div>
            <div class="message-body has-background-white">
              <div id="donutchart1">
              </div>
            </div>
          </article>
        </div>
        <div class="column">
          <article class="card is-info">
            <div class="message-header">
              <p>Yet to Date Sales Charts</p>
            </div>
            <div class="message-body has-background-white">
              <div id="donutchart2">
              </div>
            </div>
          </article>
        </div>
      </div>

      <div class="columns p-3">
        <div class="column">
          <article class="card is-info">
            <div class="message-header">
              <p>Weekly Collections Charts</p>
            </div>
            <div class="message-body has-background-white">
              <div id="donutchart3">
              </div>
            </div>
          </article>
        </div>
        <div class="column">
          <article class="card is-info">
            <div class="message-header">
              <p>Year To Date Collection Charts</p>
            </div>
            <div class="message-body has-background-white">
              <div id="donutchart4">
              </div>
            </div>
          </article>
        </div>
        <div class="column">
          <article class="card is-info">
            <div class="message-header">
              <p>Recievable & Payables Charts</p>
            </div>
            <div class="message-body has-background-white">
              <div id="donutchart5">
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

  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);
  //Weekly sales Report
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Yet to Date Sales', 'Amount'],
      <?php
      $query = "SELECT SUM(yet_sales.sales_target_yet) AS salestargetyet,
                SUM(yet_sales.sales_to_date) AS salestodate
                FROM yet_sales WHERE archive_ysales = 'No'";
      $result = mysqli_query($dbcon, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "['Sales Target Yet to Date'," . $row['salestargetyet'] . "],";
        echo "['Sales to Date'," . $row['salestodate'] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Weekly Sales Report',
      pieHole: 0.3,
      slices: {
        0: {
          color: '#14ABEF',
          offset: 0.2
        },
        1: {
          color: '#D13ADF'
        },
        2: {
          color: '#F2AAFA'
        },
        3: {
          color: '#D13ADF'
        }
      },
      legend: {
        position: 'bottom',
        alignment: 'center'
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  //yet to date sales
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Weekly Sales', 'Amount'],
      <?php
      $query = "SELECT SUM(week_sales.sales_target) AS salestarget,
                SUM(week_sales.act_sale_target) AS actualsales
                FROM week_sales WHERE archive_wsales = 'No'";
      $result = mysqli_query($dbcon, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "['Sales Target'," . $row['salestarget'] . "],";
        echo "['Actual Sales'," . $row['actualsales'] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Yet to Date  Report',
      pieHole: 0.3,
      slices: {
        0: {
          color: '#233023',
          offset: 0.2
        },
        1: {
          color: '#FF9700'
        },
        2: {
          color: '#FD3550'
        },
        3: {
          color: '#30B87D'
        }
      },
      legend: {
        position: 'bottom',
        alignment: 'center'
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  //weekly collection
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Weekly Collections', 'Amount'],
      <?php
      $query = "SELECT SUM(week_collection.col_week_amt) AS weekamout,
                SUM(week_collection.col_budget_amt) AS budgetamount
                FROM week_collection WHERE archive_wcol = 'No'";
      $result = mysqli_query($dbcon, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "['Weekly Collection'," . $row['weekamout'] . "],";
        echo "['Annual Budget Collection'," . $row['budgetamount'] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Weekly Collection Report',
      pieHole: 0.3,
      slices: {
        0: {
          color: '#fa7f7f'
        },
        1: {
          color: '#92e6e6'
        },
        2: {
          color: '#FD3550'
        },
        3: {
          color: '#30B87D'
        }
      },
      legend: {
        position: 'bottom',
        alignment: 'center'
      },
      pieSliceTextStyle: {
        color: '#2f2519',
        fontSize: 12,
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart3'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  //Yearly collection
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year To Date Collections', 'Amount'],
      <?php
      $query = "SELECT SUM(year_collection.year_col_budget) AS colbudget,
                SUM(year_collection.year_col_annual) AS colannual
                FROM year_collection WHERE archive_ycol = 'No'";
      $result = mysqli_query($dbcon, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "['Yearly Budget'," . $row['colbudget'] . "],";
        echo "['Yearly Annual'," . $row['colannual'] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Year To Date Collection Report',
      pieHole: 0.3,
      slices: {
        0: {
          color: '#fa7d09'
        },
        1: {
          color: '#84a9ac'
        },
        2: {
          color: '#FD3550'
        },
        3: {
          color: '#30B87D'
        }
      },
      legend: {
        position: 'bottom',
        alignment: 'center'
      },
      pieSliceTextStyle: {
        color: '#2f2519',
        fontSize: 12,
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart4'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  //Recievables & Payables collection
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Recievables & Payables', 'Amount'],
      <?php
      $query = "SELECT pay_rec.type AS type, SUM(pay_rec.amount) AS amount
                FROM pay_rec WHERE archive_payrec = 'No'
                GROUP BY pay_rec.type";
      $result = mysqli_query($dbcon, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "['" . $row['type'] . "'," . $row['amount'] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Recievables & Payables Report',
      pieHole: 0.3,
      slices: {
        0: {
          color: '#b3c87a'
        },
        1: {
          color: '#84a9ac'
        },
        2: {
          color: '#FD3550'
        },
        3: {
          color: '#30B87D'
        }
      },
      legend: {
        position: 'bottom',
        alignment: 'center'
      },
      pieSliceTextStyle: {
        color: '#2f2519',
        fontSize: 12,
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart5'));
    chart.draw(data, options);
  }
</script>