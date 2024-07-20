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
    <title>Asaase Radio || Department Head Edit Activity </title>
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
            <li class="is-active"><a href="#" aria-current="page">Edit Activities</a></li>
          </ul>
        </nav>
        <?php
          $activity_id = $_GET['activity_id'];
          $dataquery = "SELECT * FROM activities WHERE activity_id ='$activity_id'";
          $dataresult = mysqli_query($dbcon, $dataquery);
          if (mysqli_num_rows($dataresult) > 0) {
            $data = mysqli_fetch_array($dataresult);

        ?>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1" style="border-bottom: 1px solid #c7c7c7;">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Edit Activity</h1>
              </div>
              <div class="column">
                <p class="has-text-right">
                  <a href="editteams.php?activity_id=<?php echo $activity_id; ?>" class="button is-info "  id="addbtn">Edit Team Members</a>
                </p>
              </div>
            </div>
          </div>

            <div class="column is-full">

              <form class="columns is-multiline" action="editactivity.php?activity_id=<?php echo $activity_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Activity Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input  name="activity_id" type="text" value="<?php echo $data['activity_id']; ?>" required hidden>
                      <input class="input" name="activity_name" type="text" value="<?php echo $data['activity_name']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Activity Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="activity_date" type="date" value="<?php echo $data['activity_date']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Assignment <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="assignment" rows="5" required><?php echo $data['assignment']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Branch <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="branch" value="<?php echo $data['branch']; ?>" list="branchlist" required>
                      <datalist name="branch" id="branchlist">
                        <option disabled>Select Branch</option>
                        <?php
                        $query = "SELECT branch FROM branch WHERE branch <> 'Admin'";
                        $result = mysqli_query($dbcon, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['branch']; ?>"></option>
                        <?php } ?>
                      </datalist>
                    </div>
                  </div>
                </div>

                

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Estimates<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="estimates" type="text"  value="<?php echo $data['estimates']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Activity Status<span class="has-text-danger">*</span></label>
                    <div class="control pr-5" >
                      <div class="select ">
                        <select name="activity_status">
                          <option selected ><?php echo $data['activity_status']; ?></option>
                          <option>Completed</option>
                          <option>Ongoing</option>
                          <option>Pending</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Observation</label>
                    <div class="control">
                      <textarea class="textarea" name="observation" rows="5" ><?php echo $data['observation']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">End Date</label>
                    <div class="control">
                      <input class="input" name="end_date" type="date"  value="<?php echo $data['end_date']; ?>">
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="updateactivity">
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
