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
    <title>Asaase Radio || Admin Add Asset Employee </title>
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
            <li ><a href="assetemployee.php" aria-current="page">Asset Employee</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Asset Employee</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Asset Employee</h1>
            </div>

            <div class="column is-full">
              <form class="columns is-multiline" action="addassetemployee.php" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
          					<label class="label">Asset Serial No / Vehicle Number <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="asset_id" placeholder="Select or Enter Asset Serial No / Vehicle Number" list="assetlist" required>
          						<datalist name="asset_id" id="assetlist">
          						  <option disabled>Select Assets</option>
          						  <?php
          						  $query = "SELECT * FROM assets";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['asset_id']; ?>"><?php echo $row['asset']; ?></option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
          					<label class="label">Employee <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="employee_id" placeholder="Select or Enter Employee" list="employeelist" required>
          						<datalist name="employee_id" id="employeelist">
          						  <?php
          						  $query = "SELECT * FROM employee";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['employee_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['firstname']; ?></option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Description <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="description" rows="4" placeholder="Enter Asset Status Description" required></textarea>
                    </div>
                  </div>

                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Assign Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="col_date" type="date" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Assign Time <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="col_time" type="time" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Return Date <span class="has-text-danger"></span></label>
                    <div class="control">
                      <input class="input" name="return_date" type="date" >
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Return Time <span class="has-text-danger"></span></label>
                    <div class="control">
                      <input class="input" name="return_time" type="time" >
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="addassetemployee">
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
