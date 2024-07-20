<?php
  session_start();
  include('../connection.php');
  include('includes/auth.php');
  include('assets/update.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || General Manager Add Comments Employees Reports</title>
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
            <li ><a href="employeesreports.php" aria-current="page">Employees Report</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Comments</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Comments</h1>
            </div>

            <div class="column is-full">
              <?php
                $employee_report_id = $_GET['employee_report_id'];
                $dataquery = "SELECT * FROM employee_report
                              INNER JOIN employee ON employee.employee_id = employee_report.employee_id
                              INNER JOIN activities ON activities.activity_id = employee_report.activity_id
                              WHERE employee_report_id ='$employee_report_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editempreport.php?employee_report_id=<?php echo $employee_report_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <input type="text" name="employee_report_id" value="<?php echo $data['employee_report_id']; ?>" required hidden>
                  <div class="field">
                    <label class="label">Comments<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="gmcomment" rows="5" required><?php echo $data['gmcomment']; ?></textarea>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="comment_empreport">
                        &nbsp; Add Comment &nbsp;
                      </button>
                    </p>
                  </div>
                </div>

              </form>
              <?php } ?>
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
