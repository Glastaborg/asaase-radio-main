<?php
  session_start();
  include('../connection.php');
  include('includes/auth.php');
  include('assets/add.php');
  include('assets/update.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Add Team Members </title>
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
            <li ><a href="activities.php" aria-current="page">Activities</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Team Members</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <?php
            $dataquery = "SELECT * FROM activities WHERE activity_id ='$sess_activity_id' AND archive_act = 'No'";
            $dataresult = mysqli_query($dbcon, $dataquery);
            if (mysqli_num_rows($dataresult) > 0) {
              $data = mysqli_fetch_array($dataresult);

          ?>
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Activity Name: <?php echo $data['activity_name']; ?></h1>
            </div>

            <div class="column is-full">
            <?php } ?>
            </div>



            <div class="column is-full">
              <form class="columns is-multiline" action="editteams.php?activity_id=<?php echo $sess_activity_id; ?>" method="post" enctype="multipart/form-data">

                <div class="column is-half">
                  <h1 class="title is-size-5">Add Team Members</h1>
                  <div class="field">
                    <label class="label">Team Member <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input  type="text" name="activity_id" value="<?php echo $data['activity_id']; ?>" required hidden>
                      <input type="text" class="input" name="employee_id" placeholder="Enter or Select Employee" list="employeelist" required>
                      <datalist name="employee_id" id="employeelist">
                        <?php
                        $query = "SELECT employee.* FROM employee
                                  WHERE job_description ='Employee'
                                  AND branch = '$sessbranch' AND department = '$sessdepartment'
                                  AND archive_emp = 'No'
                                  AND employee.employee_id
                                  NOT IN
                                  (SELECT teammembers.employee_id FROM teammembers
                                  INNER JOIN activities ON activities.activity_id = teammembers.activity_id
                                  WHERE activities.activity_id = '$sess_activity_id'
                                  )";
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
                    <label class="label">Team Member Role <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="member_type" placeholder="Enter or Select Role" list="rolelist" required>
                      <datalist name="member_type" id="rolelist">
                        <option value="Unit Head"></option>
                        <option value="Member"></option>
                      </datalist>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                  <p class="control is-expanded is-size-6"></p>
                  <p class="control">
                    <button class="button is-info" name="addteam">
                      &nbsp; Add Member &nbsp;
                    </button>
                  </p>
                </div>
                </div>

                <div class="column is-half">
                  <h1 class="title is-size-5">Current Team Members</h1>
                  <p>No team member available</p>
                </div>
            </form>
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
