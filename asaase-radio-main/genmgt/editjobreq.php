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
    <title>Asaase Radio || Department Head Add Activity </title>
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
            <li ><a href="jobrequest.php" aria-current="page">Job Request</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Job Request</a></li>
          </ul>
        </nav>
        <?php
          $jr_id = $_GET['jr_id'];
          $dataquery = "SELECT * FROM job_request WHERE jr_id ='$jr_id'";
          $dataresult = mysqli_query($dbcon, $dataquery);
          if (mysqli_num_rows($dataresult) > 0) {
            $data = mysqli_fetch_array($dataresult);

        ?>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Job Request</h1>
            </div>

            <div class="column is-full">
              <form class="columns is-multiline" action="editjobreq.php?jr_id=<?php echo $jr_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label"> Branch <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" name="jr_id" value="<?php echo $data['jr_id']; ?>" hidden>
                      <input type="text" class="input" name="jr_branch" value="<?php echo $data['jr_branch']; ?>" readonly >
                    </div>
                  </div>
                  <div class="field">
                    <label class="label"> Department <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="jr_department" value="<?php echo $data['jr_department']; ?>" readonly >
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Request <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="jr_request" rows="2" required><?php echo $data['jr_request']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Role <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="jr_role" type="text" value="<?php echo $data['jr_role']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Expected Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="jr_exp_date" type="date" value="<?php echo $data['jr_exp_date']; ?>" required>
                    </div>
                  </div>

                  <div class="field">
                    <label class="label">Expected Salary (If known enter salary)</label>
                    <div class="control">
                      <input class="input" name="jr_salary" type="number" step="0.01"  value="<?php echo $data['jr_salary']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Has the role been budgeted for?<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <?php if ($data['jr_salary'] === "Yes") {echo "checked"; } ?>
                      <input class="radio" name="jr_budgeted" type="radio" value="Yes" required <?php if ($data['jr_budgeted'] === "Yes") {echo "checked"; } ?>> Yes
                      <input class="radio" name="jr_budgeted" type="radio" value="No"  required <?php if ($data['jr_budgeted'] === "No") {echo "checked"; } ?>> No
                    </div>
                  </div>
                  <div class="field preason">
                    <label class="label">If not budgeted for, give reasons<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea reason" name="jr_reason" rows="2" value="<?php echo $data['jr_reason']; ?>"></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Job Request Status<span class="has-text-danger">*</span></label>
                    <div class="control pr-5" >
                      <div class="select ">
                        <select name="jr_status" required>
                          <option selected ><?php echo $data['jr_status']; ?></option>
                          <option>Approved</option>
                          <option>Declined</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="update_jr">
                        &nbsp; Update &nbsp;
                      </button>
                    </p>
                  </div>
                </div>

                <div class="column is-half">

                </div>

              </form>
            </div>


        </div>
        <?php } ?>
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

$(function () {
  $('.preason').hide();
  $('.reason').hide();

  $("input[name=jr_budgeted]:radio").click(function () {
      if ($('input[name=jr_budgeted]:checked').val() == "Yes") {
          $('.preason').hide();
          $('.reason').hide();
          $('.reason').attr('required', false);
      }
      else if ($('input[name=jr_budgeted]:checked').val() == "No") {
          $('.preason').show();
          $('.reason').show();
          $('.reason').attr('required', true);
      }
      else if ($('input[name=jr_budgeted]:unchecked')) {
        $('.preason').hide();
        $('.reason').hide();
        $('.reason').attr('required', false);
      }
  });
});
</script>
