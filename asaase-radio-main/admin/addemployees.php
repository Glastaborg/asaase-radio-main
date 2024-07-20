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
    <title>Asaase Radio || Admin Add Employees </title>
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
            <li ><a href="employees.php" aria-current="page">Employees</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Employees</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Employee</h1>
            </div>
            
            

            <div class="column is-full">
              <form class="columns is-multiline" action="addemployees.php" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label">First Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="firstname" type="text" placeholder="Employee First Name" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Last Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="lastname" type="text" placeholder="Employee Last Name" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Email <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="email" type="email" placeholder="Employee Email" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Phone Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="phone" type="tel" pattern="[0-9]{10}" placeholder="Employee Phone Number" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date of Birth <span class="has-text-danger"></span></label>
                    <div class="control">
                      <input class="input" name="dob" type="date" >
                    </div>
                  </div>
                  <div class="field">
          					<label class="label">Position <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="position" placeholder="Enter Position" required>
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Preferred Name </label>
                    <div class="control">
                      <input class="input" name="pref_name" type="text" placeholder="Employee Preferred Name">
                    </div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
          					<label class="label">Branch <span class="has-text-danger">*</span></label>
          					<div class="control">
          					
          						  <select name="branch" id="" class="input" required>
          						      <option selected disabled value="">--Select Branch--</option>
                						  <?php
                						  $query = "SELECT branch FROM branch";
                						  $result = mysqli_query($dbcon, $query);
                						  while($row = mysqli_fetch_array($result)){
                						  ?>
                						  <option value="<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
                							<?php } ?>
          						  </select>
          						  
          					</div>
                  </div>
                  <div class="field">
          					<label class="label">Job Description <span class="has-text-danger">*</span></label>
          					<div class="control">
          				
          						
          						  <select name="job_description" id="" class="input" required>
          						    <option disabled selected value="">--Select Job Description--</option>
          						      	<?php
                  						  $query = "SELECT job_description FROM job";
                  						  $result = mysqli_query($dbcon, $query);
                  						  while($row = mysqli_fetch_array($result)){
                  						  ?>
                  						  <option value="<?php echo $row['job_description']; ?>"><?php echo $row['job_description']; ?></option>
          							       <?php } ?>
          						  </select>
          					
          					</div>
                  </div>
                  <div class="field">
          					<label class="label">Department <span class="has-text-danger">*</span></label>
          					<div class="control">
          				
          						<select name="department" class="input" id="department" required>
          						      <option disabled selected value="">--Select Department--</option>
                						  <?php
                						  $query = "SELECT department FROM department";
                						  $result = mysqli_query($dbcon, $query);
                						  while($row = mysqli_fetch_array($result)){
                						  ?>
                						  <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
                							<?php } ?>
          						</select>
          				
          					</div>
                  </div>
                   <div class="field">
          					<label class="label">Department Unit <span class="has-text-danger"></span></label>
          					<div class="control">
          						
          					   <select  id="" class="input" name="unit" >
          					          <option disabled selected value="" >--Select Unit--</option>
                						  <?php
                						  $query = "SELECT unit FROM department_unit";
                						  $result = mysqli_query($dbcon, $query);
                						  while($row = mysqli_fetch_array($result)){
                						  ?>
                						  <option value="<?php echo $row['unit']; ?>"><?php echo $row['unit']; ?></option>
                							<?php } ?>
          					   </select>
          				
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Password <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="password" type="password" minlength="8" placeholder="Employee Password" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Previous Names</label>
                    <div class="control">
                      <input class="input" name="prev_name" type="text" placeholder="Employee Previous Name">
                    </div>
                  </div>
                  <!-- Employee Picture -->
                  <div class="field">
                          <label class="label">Employee Picture <span class="has-text-danger">*</span></label>
                          <div id="file-js-example" class="file has-name mr-2">
                            <label class="file-label">
                              <input class="file-input" type="file" name="emp_image">
                              <span class="file-cta">
                                <span class="file-icon">
                                  <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                  Choose a file…
                                </span>
                              </span>
                              <span class="file-name">
                                No file uploaded
                              </span>
                            </label>
                          </div>
                  </div>
              
               
                
                </div>
            
                  
                </div>
                <div class="column is-half"></div>
                <div class="column is-half">
                    <div class="field is-grouped my-5 mx-4">
                      <p class="control is-expanded is-size-6">
  
                      </p>
                      <p class="control">
                        <button class="button is-info" name="addemployee">
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


$('#department').on('change',function(){

});
</script>
