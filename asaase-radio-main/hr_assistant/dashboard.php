<?php
session_start();
$sessbranch = $_SESSION['branch'];
$sessdept = $_SESSION['department'];
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
          <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-info is-size-3"><i class="fas fa-users"></i></p>
                <p class="subtitle has-text-centered has-text-info-dark is-size-6">Employees</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                    $query = "SELECT COUNT(employee_id) AS totalemployee
                              FROM employee WHERE deleted='0'";
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
                <p class="subtitle has-text-centered has-text-brown is-size-3"><i class="fas fa-house-user"></i></p>
                <p class="subtitle has-text-centered has-text-warning-dark is-size-6">Total Leave</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                    $query = "SELECT COUNT(leave_id) AS totalleave FROM employee_leave
                              INNER JOIN employee ON employee.employee_id = employee_leave.employee_id
                              WHERE employee.deleted ='0'";
                    $result = mysqli_query($dbcon, $query);
                    if ($row = mysqli_fetch_array($result)) {
                      echo $row['totalleave'];
                    }
                  ?>
                </p>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-warning is-size-3"><i class="fas fa-portrait"></i></p>
                <p class="subtitle has-text-centered has-text-brown is-size-6">Pending Leaves</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                    $query = "SELECT COUNT(leave_id) AS totalleavepending
                              FROM employee_leave
                              INNER JOIN employee ON employee.employee_id = employee_leave.employee_id
                              WHERE leave_status = 'Pending'
                              AND employee.deleted='0'";
                    $result = mysqli_query($dbcon, $query);
                    if ($row = mysqli_fetch_array($result)) {
                      echo $row['totalleavepending'];
                    }
                  ?>
                </p>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="card mt-2 p-1">
              <div class="card-content">
                <p class="subtitle has-text-centered has-text-success is-size-3"><i class="fas fa-user-check"></i></p>
                <p class="subtitle has-text-centered has-text-success-dark is-size-6">Granted Leaves</p>
                <p class="subtitle has-text-centered has-text-grey-dark">
                  <?php
                    $query = "SELECT COUNT(leave_id) AS totalleavegranted FROM employee_leave 
                             INNER JOIN employee ON employee.employee_id = employee_leave.employee_id
                              WHERE leave_status = 'Granted'
                              AND employee.deleted='0'";
                    $result = mysqli_query($dbcon, $query);
                    if ($row = mysqli_fetch_array($result)) {
                      echo $row['totalleavegranted'];
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
                <p>Latest Leave Notification</p>
                <button class="button" onclick="window.location='leave.php';" > View All</button>
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
                                  AND employee.deleted ='0'
                                  ORDER BY applied_date DESC
                                  LIMIT 10";
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
                      <tr  onclick="window.location='editleave.php?leave_id=<?php echo $row['leave_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'" >
                         <td class="is-size-6 ">
                     
                          <?php
                          $id = $row['employee_id'];
                           //query for image
                            $imagequery = "SELECT * FROM employee_image WHERE employee_id ='$id' ";
                            $imageresult = mysqli_query($dbcon, $imagequery);
                            $imagedata = mysqli_fetch_assoc($imageresult);
                            if ($imagedata) {
                              $image =  $imagedata['imagename'];
                              echo  '<div style="height:48px; width:48px;"><img style="height:inherit; width:inherit;" class="is-rounded" src="../hr/employee_images/'.$image.'"alt="Employee Image"></div>';
                            }else{
                              echo  ' <figure class="image is-48x48">
                                        <img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">
                                         </figure>';
                            }
                          ?>
                     
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
            <div class="card is-info">
              <div class="message-header">
                <p>Recent Added Employees</p>
                <button class="button" onclick="window.location='employees.php';" > View All</button>
              </div>
              <div class="message-body has-background-white" id="rowbody">
                <div class="table-container">
                  <table class="table is-narrow is-fullwidth has-background-transparent">
                    <tbody>
                      <?php
                      $query = "SELECT employee.* FROM employee
                                WHERE employee.branch <> 'Admin'
                                AND archive_emp = 'No'
                                AND deleted='0'
                                ORDER BY date_joined DESC
                                LIMIT 10";
                      $result = mysqli_query($dbcon, $query);

                    

                        while($row = mysqli_fetch_array ($result)){
                      ?>
                      <tr class="datatr" onclick="window.location='viewemployees.php?employee_id=<?php echo $row['employee_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'">
                      <td class="is-size-6 ">
                     
                          <?php
                          $id = $row['employee_id'];
                            $imagequery = "SELECT * FROM employee_image WHERE employee_id ='$id' ";
                            $imageresult = mysqli_query($dbcon, $imagequery);
                            $imagedata = mysqli_fetch_assoc($imageresult);
                            if ($imagedata) {
                              $image =  $imagedata['imagename'];
                              echo  '<div style="height:48px; width:48px;"><img style="height:inherit; width:inherit;" class="is-rounded" src="../hr/employee_images/'.$image.'"alt="Employee Image"></div>';
                            }else{
                              echo  ' <figure class="image is-48x48">
                                        <img class="is-rounded" src="../hr/employee_images/avatar.png" alt="Employee Image">
                                         </figure>';
                            }
                          ?>
                     
                    </td>
                        <td class="is-size-6 pt-4"> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td class="is-size-6 pt-4"> <?php echo $row['branch']; ?> </td>
                        <td class="is-size-6 pt-4"><?php echo $row['phone']; ?></td>
                        <td class="is-size-6 pt-4"><?php echo $row['date_joined']; ?></td>
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
                <p>Pending Job Requests</p>
                <button class="button" onclick="window.location='jobrequest.php';" > View All</button>
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

                        while($row = mysqli_fetch_array ($result)){
                      ?>
                      <tr  onclick="window.location='editjobreq.php?jr_id=<?php echo $row['jr_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'" >
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['jr_request']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['jr_role']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['jr_branch']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['jr_department']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['jr_req_date']; ?></td>
                        <td class="is-size-6 is-size-7-mobile has-text-centered" ><div class="has-background-warning p-2 " ><?php echo $row['jr_status']; ?></td>
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
                <p>Pending Vehicle Requests</p>
                <button class="button" onclick="window.location='assetrequest.php';" > View All</button>
              </div>
              <div class="message-body has-background-white" id="rowbody">
                <div class="table-container">
                  <table class="table is-fullwidth has-background-transparent">
                    <tbody>
                      <?php
                        $query = "SELECT * FROM asset_request
                                  WHERE department = '$sessdept'
                                  AND request_status = 'Pending'
                                  ORDER BY request_time DESC
                                  LIMIT 10";
                        $result = mysqli_query($dbcon, $query);

                        while($row = mysqli_fetch_array ($result)){
                      ?>
                      <tr  onclick="window.location='editassetreq.php?ar_id=<?php echo $row['asset_request_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'" >
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['request_time']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['departure']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['destination']; ?></td>
                        <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['drop_off']; ?></td>
                        <td class="is-size-6 is-size-7-mobile has-text-centered" ><div class="has-background-warning  p-2 " ><?php echo $row['request_status']; ?></td>
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
                <p>Assigned Assets</p>
                <button class="button" onclick="window.location='assetemployee.php';" > View All</button>
              </div>
              <div class="message-body has-background-white" id="rowbody">
                <div class="table-container">
                  <table class="table is-narrow is-fullwidth has-background-transparent">
                    <tbody>
                      <?php
                        $query = "SELECT *, assets.branch AS assbranch FROM asset_employee
                                  INNER JOIN assets ON assets.asset_id = asset_employee.asset_id
                                  INNER JOIN employee ON employee.employee_id = asset_employee.employee_id
                                  WHERE archive_asset_employee = 'No'
                                  AND return_date IS NULL
                                  ORDER BY col_date DESC ";
                        $result = mysqli_query($dbcon, $query);

                        //query for image
                        $imagequery = "SELECT * FROM employee_image";
                        $imageresult = mysqli_query($dbcon, $imagequery);
                        $imagedata = mysqli_fetch_array($imageresult);

                        while($row = mysqli_fetch_array ($result)){
                      ?>
                      <tr class="datatr" onclick="window.location='editassetemployee.php?asset_employee_id=<?php echo $row['asset_employee_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'"><td class="is-size-6 ">
                          <figure class="image is-48x48">
                              <?php

                                if ($row['employee_id'] == $imagedata['employee_id']) {
                                  $image =  $imagedata['imagename'];

                                  //echo  '<img class="is-rounded" src="employee_images/wear.jpg" alt="Employee Image">';
                                  echo  '<img class="is-rounded" src="employee_images/'.$image.'"alt="Employee Image">';
                                }else{
                                  echo  '<img class="is-rounded" src="employee_images/avatar.png" alt="Employee Image">';
                                }
                              ?>
                          </figure>
                        </td>
                        <td class="is-size-6 pt-4"> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td class="is-size-6 pt-4"> <?php echo $row['asset']; ?> </td>
                        <td class="is-size-6 pt-4"> <?php echo $row['col_date']; ?> </td>
                        <td class="is-size-6 pt-4"><?php echo $row['branch']; ?></td>
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
                <p>Returned Assets</p>
                <button class="button" onclick="window.location='assetemployee.php';" > View All</button>
              </div>
              <div class="message-body has-background-white" id="rowbody">
                <div class="table-container">
                  <table class="table is-narrow is-fullwidth has-background-transparent">
                    <tbody>
                      <?php
                        $query = "SELECT *, assets.branch AS assbranch FROM asset_employee
                                  INNER JOIN assets ON assets.asset_id = asset_employee.asset_id
                                  INNER JOIN employee ON employee.employee_id = asset_employee.employee_id
                                  WHERE archive_asset_employee = 'No'
                                  AND return_date IS NOT NULL
                                  ORDER BY return_date DESC 
                                  LIMIT 10";
                        $result = mysqli_query($dbcon, $query);

                        //query for image
                        $imagequery = "SELECT * FROM employee_image";
                        $imageresult = mysqli_query($dbcon, $imagequery);
                        $imagedata = mysqli_fetch_array($imageresult);

                        while($row = mysqli_fetch_array ($result)){
                      ?>
                      <tr class="datatr" onclick="window.location='editassetemployee.php?asset_employee_id=<?php echo $row['asset_employee_id']; ?>';" style="cursor:pointer;" onMouseOver="this.style.background='#c4c4c4'" onMouseOut="this.style.background='#ffffff'"><td class="is-size-6 ">
                          <figure class="image is-48x48">
                              <?php

                                if ($row['employee_id'] == $imagedata['employee_id']) {
                                  $image =  $imagedata['imagename'];

                                  //echo  '<img class="is-rounded" src="employee_images/wear.jpg" alt="Employee Image">';
                                  echo  '<img class="is-rounded" src="employee_images/'.$image.'"alt="Employee Image">';
                                }else{
                                  echo  '<img class="is-rounded" src="employee_images/avatar.png" alt="Employee Image">';
                                }
                              ?>
                          </figure>
                        </td>
                        <td class="is-size-6 pt-4"> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td class="is-size-6 pt-4"> <?php echo $row['asset']; ?> </td>
                        <td class="is-size-6 pt-4"> <?php echo $row['col_date']; ?> </td>
                        <td class="is-size-6 pt-4"> <?php echo $row['return_date']; ?> </td>
                        <td class="is-size-6 pt-4"><?php echo $row['branch']; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
