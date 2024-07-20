<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT employee.* FROM employee
            WHERE employee.branch <> 'Admin'
            AND deleted='0'
            AND archive_emp = 'No'
            AND department = 'HR'
            -- AND position = 'Cleaner'
            ORDER BY firstname ASC, branch ASC";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Employees </title>
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
            <li class="is-active"><a href="#" aria-current="page">Employees</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Employees</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search employee" id="search">
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
                <a href="addemployees.php" class="button is-info " type="button" name="button" id="addbtn">Add Employee</a>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="genemp.php" class="button is-white" type="button" name="button" id="addbtn">
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
                  <a href="archiveemp.php" class="button is-white" type="button" name="button" id="addbtn">
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
                  <tr >
                    <th></th>
                    <th class="is-size-6 is-size-7-mobile">Emp ID</th>
                    <th class="is-size-6 is-size-7-mobile">Name</th>
                    <th class="is-size-6 is-size-7-mobile">Branch</th>
                    <th class="is-size-6 is-size-7-mobile">Phone</th>
                    <th class="is-size-6 is-size-7-mobile">Position</th>
                    <th class="is-size-6 is-size-7-mobile">Department</th>
                    <th class="is-size-6 is-size-7-mobile">Employee Type</th>
                    <th class="is-size-6 is-size-7-mobile">Job Description</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      
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
                              echo  '<div style="height:48px; width:48px;"><img style="height:inherit; width:inherit;" class="is-rounded" src="employee_images/'.$image.'"alt="Employee Image"></div>';
                            }else{
                              echo  ' <figure class="image is-48x48">
                                        <img class="is-rounded" src="employee_images/avatar.png" alt="Employee Image">
                                         </figure>';
                            }
                          ?>
                     
                    </td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['employee_id']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['branch']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['phone']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['position']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['department']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['employee_type']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $row['job_description']; ?></td>
                    
                    <td class="is-size-6 is-size-7-mobile pt-4">
                      <a class="button is-size-7 is-info m-1" title="update book"  href="editemployees.php?employee_id=<?php echo $row['employee_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete book"  href="employees.php?employee_id=<?php echo $row['employee_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                    <?php } ?>
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
