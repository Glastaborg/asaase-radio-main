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
            <li class="is-active"><a href="#" aria-current="page">Edit Employee Leave</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Employee Leave</h1>
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
                    <!-- <label class="label">Employee <span class="has-text-danger">*</span></label> -->
                    <div class="control">
                      <input type="text" name="leave_id" value="<?php echo $data['leave_id']; ?>" hidden required>
                    </div>
                  </div>
                  <div  class="field">
                  <label for="" class="label">Reason for Requested leave</label>
                  <div class="control">
                      <select name="reason" class="input" id="reason" value= "<?php echo $data['reason']?>">
                          <option value="">--Select--</option>
                          <option value="Annual Leave">Annual Leave</option>
                          <option value="Sick Leave">Sick Leave</option>
                          <option value="Complaints Leave">Complaints Leave</option>
                          <option value="Unpaid Leave">Unpaid Leave</option>
                          <option value="Casual Leave">Casual Leave</option>
                          <option value="Paternity Leave">Paternity Leave</option>
                          <option value="Maternity Leave">Maternity Leave</option>
                          <option value="Study Leave with Pay">Study Leave with Pay</option>
                          <option value="Study Leave without Pay">Study Leave without Pay</option>
                          <option value="Other">Other</option>
                      </select>
                  </div>
                  <div class="field">
                      <span class="has-text-danger " id="duration"></span>
                  </div>
                  
                </div>
                <div class="field">
                    <label class="label">Date Requested: Leave Start</label>
                    <div class="control">
                      <input class="input" id="start_date" name="date_start" min="<?php echo date("Y-m-d"); ?>"  type="date" >
                    </div>
                </div>
                <div class="field">
                    <label class="label">Date Requested: Leave End</label>
                    <div class="control">
                      <input class="input" id="end_date" name="date_end" min="<?php echo date("Y-m-d"); ?>"  type="date" >
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
