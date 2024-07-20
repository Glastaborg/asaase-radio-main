<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT * FROM employee_report
            INNER JOIN employee ON employee.employee_id = employee_report.employee_id
            INNER JOIN activities ON activities.activity_id = employee_report.activity_id
            WHERE employee.branch = '$sessbranch' AND employee.department = '$sessdepartment'
            AND archive_emp_rep= 'No'
            ORDER BY date DESC, activities.branch";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Employees Report </title>
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
            <li class="is-active"><a href="#" aria-current="page">Employees Reports</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-3" >
              <div class="">
                <p class="panel-tabs">
                  <a class="is-active">All Reports</a>
                </p>
              </div>
            </div>
          </div>
          <div class="column is-full">
            <div class="columns is-align-items-center py-1" style="border-bottom: 1px solid #c7c7c7;">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Employees Reports</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Reports" id="search">
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
                <a href="addempreport.php" class="button is-info " type="button" name="button" id="addbtn">Add Employee Report</a>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="archiveempr.php" class="button is-white" type="button" name="button" id="addbtn">
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
                    <th class="is-size-6 is-size-7-mobile">Employee</th>
                    <th class="is-size-6 is-size-7-mobile">Activity</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['activity_name']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">
                      <a class="button is-size-7 is-success m-1" title="view employeesreports"  href="viewemployeesreport.php?employee_report_id=<?php echo $row['employee_report_id']; ?>">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a class="button is-size-7 is-info m-1" title="update employeesreports"  href="editempreport.php?employee_report_id=<?php echo $row['employee_report_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete employeesreports"  href="employeesreports.php?employee_report_id=<?php echo $row['employee_report_id']; ?>">
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
