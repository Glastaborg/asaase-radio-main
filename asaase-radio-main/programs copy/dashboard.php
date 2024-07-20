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
    <title>Asaase Radio || Department Head Dashboard </title>
    <!-- CSS Links-->
    <?php include("../includes/includes_css.php"); ?>
    <!-- Js Scripts-->
    <?php include("../includes/includes_js.php"); ?>
  </head>
  <body class="has-background-light" >
    <div class="columns">
      <?php include('includes/sidebar.php'); ?>
      <div class="column is-10 has-background-light" id="main">
        <?php include('includes/navbar.php'); ?>
        <div class="columns p-3">
        <?php if ($_SESSION['job_description'] === 'Department Head') { ?>
          <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-info is-size-3"><i class="fas fa-users"></i></p>
                <p class="subtitle has-text-centered has-text-info-dark is-size-6">Employees</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                    $query = "SELECT COUNT(employee_id) AS totalemployee
                              FROM employee
                              WHERE employee.department = '$sessdepartment'
                              AND archive_emp = 'No'";
                    $result = mysqli_query($dbcon, $query);
                    if ($row = mysqli_fetch_array($result)) {
                      echo $row['totalemployee'];
                    }
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
        
        <?php if ($_SESSION['position'] == 'Program Manager') { ?>
        <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-info is-size-3"><i class="fas fa-clipboard-list"></i></p>
                <p class="subtitle has-text-centered has-text-info-dark is-size-6">Programs</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                    $query = "SELECT COUNT(program_id) AS totalprog FROM programs
                              WHERE  archive_program = 'No'";
                    $result = mysqli_query($dbcon, $query);
                    if ($row = mysqli_fetch_array($result)) {
                      echo $row['totalprog'];
                    }
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>

          
          


          <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-warning is-size-3"><i class="fas fa-calendar-day"></i></p>
                <p class="subtitle has-text-centered has-text-warning-dark is-size-6">Pending Activities</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                    $query = "SELECT COUNT(activity_id) AS totalpendingactivities
                              FROM activities
                              WHERE activities.activity_status = 'Pending'
                              AND archive_act = 'No'
                              AND activities.department = '$sessdepartment'";
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
                    $query = "SELECT COUNT(activity_id) AS totalongoingactivities
                              FROM activities
                              WHERE activities.activity_status = 'Ongoing'
                              AND archive_act = 'No'
                              AND activities.department = '$sessdepartment'";
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
                    $query = "SELECT COUNT(activity_id) AS totalcompletedactivities
                              FROM activities
                              WHERE activities.activity_status = 'Completed'
                              AND archive_act = 'No'
                              AND activities.department = '$sessdepartment'";
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

        <div class="columns p-3">
          <div class="column">
            <div class="card is-info">
              <div class="message-header">
                <p>My Leave Notification</p>
                <button class="button" onclick="window.location='leave.php';" > View All</button>
              </div>
              <div class="message-body has-background-white" id="rowbody">
                <div class="table-container">
                  <table class="table is-fullwidth has-background-transparent">
                    <tbody>
                      <?php
                        $query = "SELECT * FROM employee
                                    INNER JOIN employee_leave ON employee.employee_id = employee_leave.employee_id
                                    WHERE employee.branch = '$sessbranch' AND employee.employee_id = '$sessemp_id'
                                    AND archive_leave = 'No'
                                    ORDER BY applied_date DESC";
                        $result = mysqli_query($dbcon, $query);

                        while($row = mysqli_fetch_array ($result)){
                          if ($row['leave_status'] === 'Granted') {
                            $style = "has-background-success has-text-light";
                          }
                          elseif ($row['leave_status'] === 'Pending') {
                            $style = "has-background-warning";
                          }
                          elseif ($row['leave_status'] === 'Rejected') {
                            $style = "has-background-danger has-text-light";
                          }
                      ?>
                      <tr  onclick="window.location='leave.php';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'" >
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['applied_date']; ?></td>
                        <td class="is-size-6 is-size-7-mobile"><?php echo $row['reason']; ?></td>
                        <td class="is-size-6 is-size-7-mobile has-text-centered" ><div class="<?php echo $style; ?> p-2 " ><?php echo $row['leave_status']; ?></td>
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
                <p>Pending Activities</p>
                <button class="button" onclick="window.location='pendingactivities.php';" > View All</button>
              </div>
              <div class="message-body has-background-white" id="rowbody">
              <div class="table-container">
                  <table class="table is-narrow is-fullwidth has-background-transparent">
                    <tbody>
                      <?php
                        $query = "SELECT activities.* FROM activities
                                  WHERE activities.activity_status  = 'Pending'
                                  AND archive_act = 'No'
                                  AND activities.department = '$sessdepartment'
                                  LIMIT 8";
                        $result = mysqli_query($dbcon, $query);

                        while($row = mysqli_fetch_array ($result)){
                      ?>
                      <tr>
                        <td class="is-size-6 p-2 "> <?php echo $row['branch']; ?> </td>
                        <td class="is-size-6 p-2 "> <?php echo $row['activity_name']; ?> </td>
                        <td class="is-size-7 p-2  has-text-right"><?php echo $row['activity_date']; ?></td>
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
                <p>Latest Employee Leave Notification</p>
                <button class="button" onclick="window.location='subleaverequests.php';" > View All</button>
              </div>
              <div class="message-body has-background-white" id="rowbody">
                <div class="table-container">
                  <table class="table is-fullwidth has-background-transparent">
                    <tbody>
                      <?php
                        $query = "SELECT *, DATEDIFF(date_to,date_from) AS date_diff FROM employee
                                  INNER JOIN employee_leave ON employee.employee_id = employee_leave.employee_id
                                  WHERE archive_leave = 'No'
                                  AND leave_status = 'Pending' 
                                  AND employee.job_description='News Editor' OR employee.job_description='Producer' OR employee.job_description='Presenter' 
                                  OR employee.job_description='Supervising Editor' OR employee.job_description='Coordinator' OR employee.job_description='Dj' OR employee.department='Event'
                                  ORDER BY applied_date DESC
                                  LIMIT 10";
                        $result = mysqli_query($dbcon, $query);

                        //query for image
                        $imagequery = "SELECT * FROM employee_image";
                        $imageresult = mysqli_query($dbcon, $imagequery);
                        $imagedata = mysqli_fetch_array($imageresult);


                        while($row = mysqli_fetch_array ($result)){
                          if ($row['leave_status'] === 'Granted') {
                            $style = "has-background-success has-text-light";
                          }
                          elseif ($row['leave_status'] === 'Pending') {
                            $style = "has-background-warning";
                          }
                          elseif ($row['leave_status'] === 'Rejected') {
                            $style = "has-background-danger has-text-light";
                          }
                      ?>
                      <tr  onclick="window.location='editleave.php?leave_id=<?php echo $row['leave_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'" >
                        <td class="is-size-6 ">
                          <figure class="image is-48x48">
                              <?php
                                if ($row['employee_id'] == $imagedata['employee_id']) {
                                  $image =  $imagedata['imagename'];

                                  //echo  '<img class="is-rounded" src="employee_images/wear.jpg" alt="Employee Image">';
                                  echo  '<img class="is-rounded" src="../hr/employee_images/'.$image.'"alt="Employee Image">';
                                }else{
                                  echo  '<img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">';
                                }
                              ?>
                          </figure>
                        </td>
                        <td class="is-size-6 py-5"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td class="is-size-6 py-5"><?php echo $row['applied_date']; ?> </td>
                        <td class="is-size-6 py-3 " width="50px"> <div class="<?php echo $style; ?> p-2 " ><?php echo $row['leave_status']; ?></div></td>

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
