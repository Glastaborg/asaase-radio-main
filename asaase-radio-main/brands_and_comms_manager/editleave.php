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
    <title>Asaase Radio || Employees Leave </title>
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
            <li ><a href="leave.php" aria-current="page">Employee Leave</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Employee Leave</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Employee Leave</h1>
            </div>

            <div class="column is-full">
              <?php
                $leave_id = $_GET['leave_id'];
                $dataquery = "SELECT * FROM employee_leave
                              INNER JOIN employee ON employee.employee_id = employee_leave.employee_id
                              WHERE leave_id ='$leave_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editleave.php?leave_id=<?php echo $leave_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Employee <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" name="leave_id" value="<?php echo $data['leave_id']; ?>" hidden required>
                    </div>
                  </div>
                  <div class="field">
                    <?php
                      $reason = $data['reason'];
                     ?>
                    <label class="label">Reason for Requested Leave <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="reason" value="Annual Leave" <?php if ($reason === 'Annual Leave') {echo 'checked';} ?> required>
                        Annual Leave
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Sick Leave" <?php if ($reason === 'Sick Leave') {echo 'checked';} ?>>
                        Sick Leave
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Complaints Leave" <?php if ($reason === 'Complaints Leave') {echo 'checked';} ?>>
                        Complaints Leave
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Unpaid Leave" <?php if ($reason === 'Unpaid Leave') {echo 'checked';} ?>>
                        Unpaid Leave
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Casual Leave" <?php if ($reason === 'Casual Leave') {echo 'checked';} ?>>
                        Casual Leave
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Paternity Leave" <?php if ($reason === 'Paternity Leave') {echo 'checked';} ?>>
                        Paternity Leave
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Maternity Leave" <?php if ($reason === 'Maternity Leave') {echo 'checked';} ?>>
                        Maternity Leave
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Study Leave with Pay" <?php if ($reason === 'Study Leave with Pay') {echo 'checked';} ?>>
                        Study Leave with Pay
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Study Leave without Pay" <?php if ($reason === 'Study Leave without Pay') {echo 'checked';} ?>>
                        Study Leave without Pay
                      </label>
                      <br>
                      <label class="radio">
                        <input type="radio" name="reason" value="Other" <?php if ($reason === 'Other') {echo 'checked';} ?>>
                        Other
                      </label>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updateleave">
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
