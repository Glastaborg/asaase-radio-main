<?php
  session_start();
  include('../connection.php');
  include('includes/auth.php');
  include('assets/add.php');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
  </head>
  <body class="has-background-light">
    <div class="columns">
      <?php include('includes/sidebar.php'); ?>
      <div class="column is-10 has-background-light" id="main">
        <?php include('includes/navbar.php'); ?>
        <nav class="breadcrumb p-3" aria-label="breadcrumbs">
          <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> &nbsp; Dashboard</a></li>
            <li ><a href="leave.php" aria-current="page">My Leave</a></li>
            <li class="is-active"><a href="#" aria-current="page">Request Leave</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">My Leave</h1>
            </div>

            <div class="column is-full">
              <form class="columns is-multiline" action="addleave.php" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                <div  class="field">
                  <label for="" class="label">Reason for Requested leave <span class="has-text-danger">*</span></label>
                  <div class="control">
                      <select name="reason" class="input" id="reason" required>
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
                    <label class="label">Date Requested: Leave Start <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" id="start_date" name="date_start" min="<?php echo date("Y-m-d"); ?>"  type="date" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Date Requested: Leave End <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" id="end_date" name="date_end" min="<?php echo date("Y-m-d"); ?>"  type="date" required>
                    </div>
                  </div>
              
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="addleave">
                        &nbsp; Save &nbsp;
                      </button>
                    </p>
                  </div>

                </div>


              </form>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="../employee/scripts/index.js">

</script>
