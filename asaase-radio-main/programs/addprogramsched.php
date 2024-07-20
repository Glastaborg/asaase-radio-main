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
    <title>Asaase Radio || Department Head Add Program </title>
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
            <li ><a href="progsched.php" aria-current="page">Program Lineup</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Program Lineup</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Program Lineup</h1>
            </div>

            <div class="column is-full">
              <form class="columns is-multiline" action="addprogramsched.php" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label"> Program <span class="has-text-danger">*</span></label>
                    <div class="control">
                     
                      <select name="program_id" id="branchlist" class="input">
                        <option selected disabled>--Select Program--</option>
                        <?php
                        $query = "SELECT * FROM programs WHERE archive_program = 'No'";
                        $result = mysqli_query($dbcon, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['program_id']; ?>"><?php echo $row['program']; ?> - <?php echo $row['hostname']; ?>  (<?php echo $row['branch']; ?>) </option>
                        <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Start Time <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="start_time" type="time" placeholder="Program Name" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">End Time <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="end_time" type="time" placeholder="Host Name" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Day <span class="has-text-danger">*</span></label>
                    <div class="control pr-5" >
                      
                      <div class="select is-multiple ">
                        <select multiple  name="day[]" size="6"class="input" required>
                          <option selected disabled>Select Day for Program</option>
                          <option>Monday</option>
                          <option>Tuesday</option>
                          <option>Wednesday</option>
                          <option>Thursday</option>
                          <option>Friday</option>
                          <option>Saturday</option>
                          <option>Sunday</option>
                        </select>
                      </div>
                    
                 
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="addprog_schedule">
                        &nbsp; Save &nbsp;
                      </button>
                    </p>
                  </div>
                </div>

                <div class="column is-half">
                  <?php if (isset($_POST['addprog_schedule'])) {
                    $_SESSION['program_id'] = $_POST['program_id'];
                    $program_id = $_SESSION['program_id'];

                    $rowquery = "SELECT * FROM program_schedule
                                 INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                 WHERE program_schedule.program_id = '$program_id'";
                    $rowresult = mysqli_query($dbcon, $rowquery);

                  ?>
                  <div class="table=container">
                    <table class="table is-fullwidth">
                        <tbody>
                          <?php while ($row = mysqli_fetch_array($rowresult)) { ?>
                          <tr>
                            <td><?php echo $row['day']; ?></td>
                            <td><?php echo $row['program']; ?></td>
                            <td><?php echo $row['start_time']; ?> - <?php echo $row['end_time']; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                  </div>
                  <?php } ?>

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
