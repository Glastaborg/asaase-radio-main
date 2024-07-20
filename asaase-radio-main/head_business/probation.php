<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT * FROM probation
            INNER JOIN employee ON employee.employee_id = probation.employee_id
            WHERE employee.employee_id = '$sessemp_id'";
  $result = mysqli_query($dbcon, $query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio  </title>
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
            <li class="is-active"><a href="#" aria-current="page">Performace Review</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Probation Report</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search" id="search">
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
                <a href="addprobation.php" class="button is-info" type="button" name="filename" id="addbtn">Upload Probation Report</a>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                    <a href="../files/probation.pdf" class="button is-info" name="create" download>Download Form</a>
                </p>
              </div>
            </div>
          </div>



          <div class="column is-full is-align-items-center">
            <h4 class="subtitle">My Probation Report</h4>
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <thead>
                  <tr >
                    <th class="is-size-6 is-size-7-mobile">File</th>
                    <th class="is-size-6 is-size-7-mobile">Date</th>
                    <th class="is-size-6 is-size-7-mobile has-text-right pr-6">Actions</th>
                  </tr>
                </thead>
                <?php while($row = mysqli_fetch_array ($result)){ ?>
                <tbody>
                  <tr class="datatr" >
                    <td class="is-size-6 is-size-7-mobile"><a href="../files/<?php echo $row['filename']; ?>" download><?php echo $row['filename']; ?></a></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile has-text-right pr-6">
                      <?php //if ($row['leave_status'] !== 'Granted' AND $row['leave_status'] !== 'Rejected') {

                     ?>
                     <a class="button is-size-7 is-info m-1" title="update"  href="editprobation.php?probation_id=<?php echo $row['probation_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete"  href="probation.php?probation_id=<?php echo $row['probation_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                      <?php //} ?>
                    </td>
                  </tr>
                  <?php } } else {
                    echo '<tr><td><p class="subtitle is-size-6 py-3 has-text-danger">You have no probational report</p></td></tr>';
                  }?>
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
