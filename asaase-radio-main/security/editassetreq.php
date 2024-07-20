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
            <li ><a href="assetrequest.php" aria-current="page">Vehicle Request</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Vehicle Request</a></li>
          </ul>
        </nav>
        <?php
          $ar_id = $_GET['ar_id'];
          $dataquery = "SELECT * FROM asset_request WHERE asset_request_id ='$ar_id'";
          $dataresult = mysqli_query($dbcon, $dataquery);
          if (mysqli_num_rows($dataresult) > 0) {
            $data = mysqli_fetch_array($dataresult);

        ?>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Vehicle Request</h1>
            </div>

            <div class="column is-full">
              <form class="columns is-multiline" action="editassetreq.php?ar_id=<?php echo $ar_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                <input type="text" name="ar_id" value="<?php echo $data['asset_request_id']; ?>" hidden>
                  <div class="field">
          					<label class="label">Employee <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="employee_id" value="<?php echo $data['employee']; ?>" list="employeelist" required>
          						<datalist name="employee_id" id="employeelist">
          						  <?php
          						  $query = "SELECT * FROM employee 
                                  WHERE branch = '$sessbranch' 
                                  AND department <> '$sessdept'
                                  AND archive_emp = 'No'";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['employee_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['firstname']; ?></option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
          					<label class="label">Department <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="department" value="<?php echo $data['department']; ?>" list="departmentlist" required>
          						<datalist name="department" id="departmentlist">
          						  <option disabled>Select Branch</option>
          						  <?php
          						  $query = "SELECT department FROM department WHERE department <> 'Admin'";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['department']; ?>"></option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div> 
                  <div class="field">
                    <label class="label">From <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="departure" rows="2"  required><?php echo $data['departure']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">To <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="destination" rows="2"  required><?php echo $data['destination']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date / Time <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="request_time" type="datetime-local" value="<?php echo $data['request_time']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Program / Drop Off <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="drop_off" rows="2" placeholder="Enter drop dff" required><?php echo $data['drop_off']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
          					<label class="label">Driver <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="driver" value="<?php echo $data['driver']; ?>" list="driverlist" required>
          						<datalist name="driver" id="driverlist">
          						  <?php
          						  $query = "SELECT * FROM employee 
                                  WHERE branch = '$sessbranch' 
                                  AND department = '$sessdept'
                                  AND archive_emp = 'No'";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option ><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
          							<?php } ?>
          						</datalist>
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Request Status<span class="has-text-danger">*</span></label>
                    <div class="control pr-5" >
                      <div class="select ">
                        <select name="request_status" required>
                          <option selected disabled value=""> --select status --</option>
                          <option <?php if($data['request_status']== 'Pending'){ echo 'selected';} ?> value="Pending">Pending</option>
                          <option <?php if($data['request_status']== 'Approved'){ echo 'selected';} ?> value="Approved">Approved</option>
                          <option <?php if($data['request_status']== 'Declined'){ echo 'selected';} ?> value="Declined">Declined</option>
                        </select>
                      </div>
                    </div>
                  </div>
  
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="update_vehicle_book">
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

</script>
