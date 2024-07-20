<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

                $query = "SELECT probation.*, employee.firstname, employee.lastname 
          FROM probation
          INNER JOIN employee ON employee.employee_id = probation.employee_id";

$result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Meta tags, title, CSS, and JavaScript includes -->
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
      <!-- Breadcrumb navigation -->
      <!-- Main content -->
      <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
        <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
          <h1 class="title is-size-5">Probation Report</h1>
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
              <thead>
                <tr>
                  <th class="is-size-6 is-size-7-mobile">Employee Name</th>
                  <th class="is-size-6 is-size-7-mobile">File</th>
                  <th class="is-size-6 is-size-7-mobile">Date</th>
                  <th class="is-size-6 is-size-7-mobile has-text-right pr-6">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td class='is-size-6 is-size-7-mobile'>{$row['firstname']} {$row['lastname']}</td>";
                    echo "<td class='is-size-6 is-size-7-mobile'><a href='../files/{$row['filename']}' download>{$row['filename']}</a></td>";
                    echo "<td class='is-size-6 is-size-7-mobile'>{$row['date']}</td>";
                    echo "<td class='is-size-6 is-size-7-mobile has-text-right pr-6'>";
                    // Add any actions here if needed
                    echo "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='4'><p class='subtitle is-size-6 py-3 has-text-danger'>You have no probation report</p></td></tr>";
                }
                ?>
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

  //Search Function
  $(document).ready(function() {
    $('#search').on('keyup', function() {
      var searchTerm = $(this).val().toLowerCase();
      $('#table tbody tr').each(function() {
        var lineStr = $(this).text().toLowerCase();
        if (lineStr.indexOf(searchTerm) === -1) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
    });
  });
</script>