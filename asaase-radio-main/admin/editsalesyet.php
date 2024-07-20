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
    <title>Asaase Radio || Admin Weekly Sales Report </title>
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
            <li ><a href="ysalesreports.php" aria-current="page">Yet to Date Sales</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Sales</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Sales</h1>
            </div>

            <div class="column is-full">
              <?php
                $yet_sales_id = $_GET['yet_sales_id'];
                $dataquery = "SELECT * FROM yet_sales WHERE yet_sales_id ='$yet_sales_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editsalesyet.php?yet_sales_id=<?php echo $yet_sales_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
          					<label class="label">Branch <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="branch" value="<?php echo $data['branch']; ?>" list="branchlist" required>
          						<datalist name="branch" id="branchlist">
          						  <option selected value="<?php echo $data['branch']; ?>"></option>
          						  <?php
          						  $query = "SELECT branch FROM branch";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['branch']; ?>"></option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Sales Target Yet to Date<span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input name="yet_sales_id" type="text" step="0.01" value="<?php echo $data['yet_sales_id']; ?>" required hidden>
                      <input class="input" name="sales_target_yet" type="number" step="0.01" value="<?php echo $data['sales_target_yet']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Sales to Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="sales_to_date" type="number" step="0.01" value="<?php echo $data['sales_to_date']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="date" type="date" value="<?php echo $data['date']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Reasons for Difference <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="reason" rows="3" placeholder="Enter Reasons for Difference" required><?php echo $data['reason']; ?></textarea>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updateyetsales">
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
