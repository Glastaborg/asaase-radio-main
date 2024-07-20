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
    <title>Asaase Radio || Admin Edit Asset Status </title>
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
            <li ><a href="assetstatus.php" aria-current="page">Asset Status</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Asset Status</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Asset Status</h1>
            </div>

            <div class="column is-full">
              <?php
                $asset_status_id = $_GET['asset_status_id'];
                $dataquery = "SELECT * FROM asset_status
                              WHERE asset_status_id ='$asset_status_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editassetstatus.php?asset_status_id=<?php echo $asset_status_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
          					<label class="label">Asset Serial No / Vehicle Number <span class="has-text-danger">*</span></label>
          					<div class="control">
                      <input type="text" name="asset_status_id" value="<?php echo $data['asset_status_id']; ?>" hidden required>
          						<input type="text" class="input" name="asset_id" value="<?php echo $data['asset_id']; ?>" list="assetlist" required>
          						<datalist name="asset_id" id="assetlist">
          						  <?php
          						  $query = "SELECT * FROM assets WHERE branch = '$sessbranch' AND archive_asset = 'No'";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['asset_id']; ?>"><?php echo $row['asset']; ?></option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Asset Status Description <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="description" rows="3" required><?php echo $data['description']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Asset Status<span class="has-text-danger">*</span></label>
                    <div class="control pr-5" >
                      <div class="select ">
                        <select name="status" required>
                          <option selected ><?php echo $data['status']; ?></option>
                          <option>Repair</option>
                          <option>Maintenance</option>
                          <option>Damaged</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="date" type="date" value="<?php echo $data['date']; ?>" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updateassetstatus">
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
