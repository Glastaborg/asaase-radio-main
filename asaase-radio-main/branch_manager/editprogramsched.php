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
              <form class="columns is-multiline" action="editprogramsched.php?program_id=<?php echo $_GET['program_id'];  ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <input type="text"  name="program_id" value="<?php echo $_GET['program_id']; ?>" required readonly hidden>
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
                  <div class="field is-grouped my-2">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="addprog_schedule">
                        &nbsp; Save &nbsp;
                      </button>
                    </p>
                  </div>
                </div>

                <div class="column is-half">
                  <?php
                    $program_id = $_GET['program_id'];
                    $_SESSION['program_id'] = $_GET['program_id'];

                    $rowquery = "SELECT * FROM program_schedule
                                 INNER JOIN programs ON programs.program_id = program_schedule.program_id
                                 WHERE program_schedule.program_id = '$program_id'";
                    $rowresult = mysqli_query($dbcon, $rowquery);

                  ?>
                  <div class="table=container">
                    <table class="table is-fullwidth">
                        <tbody>
                          <?php while ($row = mysqli_fetch_array($rowresult)) { ?>
                          <tr class="delete_image_tr<?php echo $row['prog_sched_id']; ?>">
                            <td><?php echo $row['day']; ?></td>
                            <td><?php echo $row['program']; ?></td>
                            <td>
                              <?php
                                $start_time = new DateTime($row['start_time']);
                                $start_time = $start_time->format('H:i');

                                $end_time = new DateTime($row['end_time']);
                                $end_time = $end_time->format('H:i A');

                                echo $start_time." - ".$end_time;
                              ?>
                            </td>
                            <td class="is-size-6">
                              <a class="button is-size-7 is-danger btn-danger" onclick="delete_image(<?php echo $row['prog_sched_id']; ?>)">
                                <i class="fas fa-trash-alt"></i>
                              </a>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                  </div>

                </div>
              </form>
            </div>

            <div class="column is-full my-6">

            </div>

            <!-- <div class="column is-full" >
              <h1 class="title is-size-5">Add Program Update</h1>
            </div> -->

            <!-- <div class="column is-full">
              <?php
                $program_id = $_GET['program_id'];

                $rowquery = "SELECT * FROM program_update
                             WHERE program_update.program_id = '$program_id'
                             ORDER BY update_date DESC";
                $rowresult = mysqli_query($dbcon, $rowquery);
                if (mysqli_num_rows($rowresult) <= 0) {
                  echo '<div class="notification is-danger is-light">There are no related reports for program status.</div>';
                }
              else{ ?>
              <div class="table=container">
                <table class="table is-fullwidth">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Program Update</th>
                      <th>Comments</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_array($rowresult)) { ?>
                    <tr class="delete_update_tr<?php echo $row['prog_upt_id']; ?>">
                      <td><?php echo $row['update_date']; ?></td>
                      <td><?php echo $row['program_update']; ?></td>
                      <td><?php echo $row['prog_comment']; ?></td>
                      <td class="is-size-6">
                        <a class="button is-size-7 is-info btn-danger" href="progupdate.php?prog_upt_id=<?php echo $row['prog_upt_id']; ?>">
                          <i class="fas fa-edit"></i>
                        </a>

                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } ?>
            </div> -->


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
<script type="text/javascript">
    function delete_update(d){
    let id=d;
    $.ajax({
      type: "post",
      url: "progupd.php",
      data: {id:id},
      success: function(html) {
          $(".delete_update_tr" + id).fadeOut('slow');
      }
    });
  }
  
  function delete_image(sid){
    
    $.ajax({
      type: "post",
      url: "schedule.php",
      data: {id:sid},
      success: function(html) {
          $(".delete_image_tr" + sid).fadeOut('slow');
      }
    });
  }
</script>
