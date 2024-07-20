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
    <title>Asaase Radio || Department Head Edit Employees Reports</title>
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
            <li class="is-active"><a href="#" aria-current="page">Edit Employees Report</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Employee Report</h1>
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
                  <div class="field">
          					<label class="label">Employee <span class="has-text-danger">*</span></label>
          					<div class="control">
                      <input type="text" name="employee_report_id" value="<?php echo $data['employee_report_id']; ?>" required hidden>
          						<input type="text" class="input" name="employee_id" value="<?php echo $data['employee_id']; ?>" list="employeelist" required>
          						<datalist name="employee_id" id="employeelist">
          						  <?php
          						  $query = "SELECT employee.* FROM employee
                                  WHERE job_description ='Employee'
                                  AND branch = '$sessbranch' AND department = '$sessdepartment'";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['employee_id']; ?>">
                          <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>
                        </option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
          					<label class="label">Activity <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="activity_id" value="<?php echo $data['activity_id']; ?>" list="activitylist" required>
          						<datalist name="activity_id" id="activitylist">
          						  <?php
          						  $query = "SELECT * FROM activities WHERE branch = '$sessbranch' AND department = '$sessdepartment'";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['activity_id']; ?>">
                          <?php echo $row['activity_name']; ?> - <?php echo $row['activity_date']; ?>
                        </option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="date" type="date" value="<?php echo $data['date']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Cost Value <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="cost_value" type="number" step="0.01" value="<?php echo $data['cost_value']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Progress<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="progress" rows="2" required><?php echo $data['progress']; ?></textarea>
                    </div>
                  </div>

                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Next Step<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="next_step" rows="2" required><?php echo $data['next_step']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">One Thing That Require Supervisor Attention<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="require_attention" rows="2" required><?php echo $data['require_attention']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">One Thing That Was Challenging<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="challenge" rows="2" required><?php echo $data['challenge']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Suggestion For Improvement<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="improve" rows="2" required><?php echo $data['improve']; ?></textarea>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updatempreport">
                        &nbsp; Update &nbsp;
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
