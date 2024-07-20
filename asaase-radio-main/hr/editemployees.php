<?php
  session_start();
  include('../connection.php');
  include('includes/auth.php');
  include('assets/update.php');
  include('assets/add.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Edit Employees </title>
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
            <li class="is-active"><a href="#" aria-current="page">Edit Employees</a></li>
          </ul>
        </nav>
        <?php
          $employee_id = $_GET['employee_id'];
          $dataquery = "SELECT * FROM employee WHERE employee_id ='$employee_id'";
          $dataresult = mysqli_query($dbcon, $dataquery);
          if (mysqli_num_rows($dataresult) > 0) {
            $data = mysqli_fetch_array($dataresult);

        ?>

        <!-- Employee Image -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Employee Picture</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <?php
                    $imagequery = "SELECT * FROM employee_image WHERE employee_id = '$employee_id'";
                    $imageresult = mysqli_query($dbcon, $imagequery);
                    if (mysqli_num_rows($imageresult) > 0) {
                      while ($imagedata = mysqli_fetch_array($imageresult)) {

                  ?>
                  <table class="table is-narrow">
                    <tbody>
                      <tr class="delete_image_tr<?php echo $imagedata['imageid']; ?>">
                        <td class="is-size-6" style="width: 80%">
                          <figure>
                            <img src="employee_images/<?php echo $imagedata['imagename']; ?>" style="width:132px; height:170px;" alt="Employee Picture">
                          </figure>
                        </td>
                        <td class="is-size-6">
                          <a class="button is-size-7 is-danger btn-danger" onclick="delete_image(<?php echo $imagedata['imageid']; ?>)">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <?php }} ?>

                </div>

                <div class="column is-half">
                  <label class="label">Employee Picture</label>
                  <input type="text" name="employee_id" value="<?php echo $data['employee_id']; ?>" hidden required>
                  <div class="field is-grouped my-5">
                    <div id="file-js-example" class="file has-name mr-2">
                      <label class="file-label">
                        <input class="file-input" type="file" name="emp_image" required>
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
                    <div class="control">
                      <button class="button is-info" type="submit" name="addempimage">
                        &nbsp; Upload Image &nbsp;
                      </button>
                    </div>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Details -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Employee Details</h1>
            </div>

            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label">First Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input name="employee_id" type="text" value="<?php echo $data['employee_id']; ?>" required hidden>
                      <input class="input" name="firstname" type="text" value="<?php echo $data['firstname']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Last Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="lastname" type="text" value="<?php echo $data['lastname']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Email <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="email" type="email" value="<?php echo $data['email']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date of Birth <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="dob" type="date" value="<?php echo $data['dob']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Branch <span class="has-text-danger">*</span></label>
                    <div class="control">
                  
                      <select name="branch" class="input" id="" required readonly>
                          <option value="" disabled>--Select Branch --</option>
                          <?php
                        $query = "SELECT branch FROM branch WHERE branch <> 'Admin'";
                        $result = mysqli_query($dbcon, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['branch']; ?>" <?php if($data['branch'] == $row['branch']){echo 'selected';}?>><?php echo $row['branch']; ?></option>
                        <?php } ?>  
                      </select>
                      
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Employee Type<span class="has-text-danger">*</span></label>
                    <div class="control" >
                      <div class="">
                        <select name="employee_type"  class="input" required>
                        
                          <option value="Permanent Staff" <?php if( $data['employee_type'] == "Permanent Staff"){echo 'selected';}?>>Permanent Staff</option>
                          <option value="Internal Service Provider" <?php if( $data['employee_type'] == "Internal Service Provider"){echo 'selected';}?>>Internal Service Provider</option>
                          <option value="External Service Provider" <?php if( $data['employee_type'] == "External Service Provider"){echo 'selected';}?>>External Service Provider</option>
                          <option value="Regional Correspondent" <?php if( $data['employee_type'] == "Regional Correspondent"){echo 'selected';}?> >Regional Correspondent</option>
                          <option value="Intern" <?php if( $data['employee_type'] == "Intern"){echo 'selected';}?>>Intern</option>
                          <option value="NSS" <?php if( $data['employee_type'] == "NSS"){echo 'selected';}?>>NSS</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="field">
          					<label class="label">Unit <span class="has-text-danger"></span></label>
          					<div class="control">
          						
          					   <select  id="" class="input" name="unit" >
          					          <option value="" >--Select Unit--</option>
                						  <?php
                						  $query = "SELECT unit FROM department_unit";
                						  $result = mysqli_query($dbcon, $query);
                						  while($row = mysqli_fetch_array($result)){
                						  ?>
                						  <option value="<?php echo $row['unit']; ?>"  <?php if($row['unit'] == $data['unit']){ echo 'selected';}?>><?php echo $row['unit']; ?></option>
                							<?php } ?>
          					   </select>
          				
          					</div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Phone Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="phone" type="tel" pattern="[0-9]{10}" value="<?php echo $data['phone']; ?>" required>
                    </div>
                  </div>
                  
                   <div class="field">
          					<label class="label">Job Description <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<select name="job_description" class="input" id="" required>
          						  <option value="" selected disabled>--Select Job Description --</option>
          						   <?php
          						  $query = "SELECT job_description FROM job";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['job_description']; ?>" <?php if($row['job_description'] == $data['job_description']){ echo 'selected';}?>><?php echo $row['job_description']; ?></option>
          							<?php } ?>
          						</select>
          						
          					</div>
                  </div>
                  
                  <div class="field">
          					<label class="label">Position <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<input type="text" class="input" name="position" value="<?php echo $data['position']; ?>" required>
          					</div>
                  </div>
                  <div class="field">
          					<label class="label">Department <span class="has-text-danger">*</span></label>
          					<div class="control">
          						<!-- <input type="text" class="input" name="department" value="<?php echo $data['department']; ?>" list="departmentlist" required> -->
          						<select name="department" class="input" id="" required>
          						    <?php
          						  $query = "SELECT department FROM department WHERE department <> 'Admin'";
          						  $result = mysqli_query($dbcon, $query);
          						  while($row = mysqli_fetch_array($result)){
          						  ?>
          						  <option value="<?php echo $row['department']; ?>" <?php if($row['department'] == $data['department']){ echo 'selected';}?>><?php echo $row['department']?></option>
          							<?php } ?>  
          						</select>
          						
          						
          					</div>
                  </div>
                  <div class="field">
                    <label class="label">Date Joined <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="date_joined" type="date" value="<?php echo $data['date_joined']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Previous Names</label>
                    <div class="control">
                      <input class="input" name="prev_name" type="text" value="<?php echo $data['prev_name']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Preferred Name </label>
                    <div class="control">
                      <input class="input" name="pref_name" type="text" value="<?php echo $data['pref_name']; ?>">
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updateemployee">
                        &nbsp; Update Details &nbsp;
                      </button>
                    </p>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Address -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Employee Address</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <?php
                  $addressquery = "SELECT * FROM employee_address WHERE employee_id = '$employee_id'";
                  $addressresult = mysqli_query($dbcon, $addressquery);
                  $addressdata = mysqli_fetch_array($addressresult);
                ?>
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Nationality <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input name="employee_id" type="text" value="<?php echo $data['employee_id']; ?>" required hidden>
                      <input class="input" name="nationality" type="text" value="<?php echo $addressdata['nationality']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Current Address <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="current_address" rows="3" required><?php echo $addressdata['current_address']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">City <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="city" type="text" value="<?php echo $addressdata['city']; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">District <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="district" type="text" value="<?php echo $addressdata['district']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Digital Address <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="digital_address" rows="3" required><?php echo $addressdata['digital_address']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Region <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="region" type="text" value="<?php echo $addressdata['region']; ?>" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <?php
                        $btnaddquery = "SELECT * FROM employee_address WHERE employee_id = '$employee_id'";
                        $btnaddresult = mysqli_query($dbcon, $btnaddquery);
                        if (mysqli_num_rows($btnaddresult) > 0) {
                          echo '<button class="button is-info" name="updateaddress">&nbsp; Update Address &nbsp;</button>';
                        }else{
                          echo '<button class="button is-info" name="addaddress">&nbsp; Save Address &nbsp;</button>';
                        }
                      ?>

                    </p>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Social -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Employee Socia Media</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <?php
                  $socialquery = "SELECT * FROM employee_social WHERE employee_id = '$employee_id'";
                  $socialresult = mysqli_query($dbcon, $socialquery);
                  $socialdata = mysqli_fetch_array($socialresult);
                ?>
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Twitter</label>
                    <div class="control">
                      <input name="employee_id" type="text" value="<?php echo $data['employee_id']; ?>" required hidden>
                      <input class="input" name="twitter" type="text" value="<?php echo $socialdata['twitter']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Facebook</label>
                    <div class="control">
                      <input class="input" name="facebook" type="text" value="<?php echo $socialdata['facebook']; ?>" >
                    </div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Instagram </label>
                    <div class="control">
                      <input class="input" name="instagram" type="text" value="<?php echo $socialdata['instagram']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">TikTok </label>
                    <div class="control">
                      <input class="input" name="tiktok" type="text" value="<?php echo $socialdata['tiktok']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Snapchat</label>
                    <div class="control">
                      <input class="input" name="snapchat" type="text" value="<?php echo $socialdata['snapchat']; ?>">
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <?php
                        $btnsocquery = "SELECT * FROM employee_social WHERE employee_id = '$employee_id'";
                        $btnsocresult = mysqli_query($dbcon, $btnsocquery);
                        if (mysqli_num_rows($btnsocresult) > 0) {
                          echo '<button class="button is-info" name="updatesocial">&nbsp; Update &nbsp;</button>';
                        }else{
                          echo '<button class="button is-info" name="addsocial">&nbsp; Save &nbsp;</button>';
                        }
                      ?>

                    </p>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Previous Employer -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Employee's Previous Employer</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <?php
                  $prevquery = "SELECT * FROM employee_prev WHERE employee_id = '$employee_id'";
                  $prevresult = mysqli_query($dbcon, $prevquery);
                  $prevdata = mysqli_fetch_array($prevresult);
                ?>
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Employer <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input name="employee_id" type="text" value="<?php echo $data['employee_id']; ?>" required hidden>
                      <input class="input" name="employer" type="text" value="<?php echo $prevdata['employer']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                      <input class="input" name="email" type="email" value="<?php echo $prevdata['email']; ?>" >
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Phone Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="phone" type="tel" pattern="[0-9]{10}" value="<?php echo $prevdata['phone']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Position <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="position" type="text" value="<?php echo $prevdata['position']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Website</label>
                    <div class="control">
                      <input class="input" name="website" type="text" value="<?php echo $prevdata['website']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">How Long? <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="period" type="text" value="<?php echo $prevdata['period']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Digital Address</label>
                    <div class="control">
                      <input class="input" name="digital_address" type="text" value="<?php echo $prevdata['digital_address']; ?>">
                    </div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Address <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="address" rows="4" required><?php echo $prevdata['address']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">City <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="city" type="text" value="<?php echo $prevdata['city']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">State </label>
                    <div class="control">
                      <input class="input" name="state" type="text" value="<?php echo $prevdata['state']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Region </label>
                    <div class="control">
                      <input class="input" name="region" type="text" value="<?php echo $prevdata['region']; ?>">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Hourly Salary</label>
                    <div class="control">
                      <input class="input" name="hourly_salary" type="number" min="0.00" step="any" value="<?php echo $prevdata['hourly_salary']; ?>"d>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Annual Income</label>
                    <div class="control">
                      <input class="input" name="annual_income" type="number" min="0.00" step="any" value="<?php echo $prevdata['annual_income']; ?>"d>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <?php
                        $btnquery = "SELECT * FROM employee_prev WHERE employee_id = '$employee_id'";
                        $btnresult = mysqli_query($dbcon, $btnquery);
                        if (mysqli_num_rows($btnresult) > 0) {
                          echo '<button class="button is-info" name="updateprev">&nbsp; Update &nbsp;</button>';
                        }else{
                          echo '<button class="button is-info" name="addprev">&nbsp; Save &nbsp;</button>';
                        }
                      ?>

                    </p>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Relative -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Employee Relative || Emergency Contact</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <?php
                  $relativequery = "SELECT * FROM employee_relative WHERE employee_id = '$employee_id'";
                  $relativeresult = mysqli_query($dbcon, $relativequery);
                  $relativedata = mysqli_fetch_array($relativeresult);
                ?>
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Name of Relative <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input name="employee_id" type="text " value="<?php echo $data['employee_id']; ?>" required hidden>
                      <input class="input" name="relative_name" type="text" value="<?php echo $relativedata['relative_name']; ?>"required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Phone Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="phone" type="tel" pattern="[0-9]{10}" value="<?php echo $relativedata['phone']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Relationship <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="relationship" type="text" value="<?php echo $relativedata['relationship']; ?>"required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Digital Address <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="digital_address" type="text" value="<?php echo $relativedata['digital_address']; ?>"required>
                    </div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Address <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="address" rows="4" required><?php echo $relativedata['address']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">City <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="city" type="text" value="<?php echo $relativedata['city']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Region <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="region" type="text" value="<?php echo $relativedata['region']; ?>" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <?php
                        $btnrelquery = "SELECT * FROM employee_relative WHERE employee_id = '$employee_id'";
                        $btnrelresult = mysqli_query($dbcon, $btnrelquery);
                        if (mysqli_num_rows($btnrelresult) > 0) {
                          echo '<button class="button is-info" name="updaterelative">&nbsp; Update &nbsp;</button>';
                        }else{
                          echo '<button class="button is-info" name="addrelative">&nbsp; Save &nbsp;</button>';
                        }
                      ?>

                    </p>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Allergies -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Medical Information</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <?php
                    $allergyquery = "SELECT * FROM employee_allergies WHERE employee_id = '$employee_id'";
                    $allergyresult = mysqli_query($dbcon, $allergyquery);
                    if (mysqli_num_rows($allergyresult) > 0) {
                      while ($allergydata = mysqli_fetch_array($allergyresult)) {

                  ?>
                  <table class="table is-narrow">
                    <tbody>
                      <tr class="delete_mem<?php echo $allergydata['allergy_id']; ?>">
                        <td class="is-size-6" style="width: 80%"><?php echo $allergydata['allergies']; ?></td>
                        <td class="is-size-6">
                          <a class="button is-size-7 is-danger btn-danger" onclick="delete_data(<?php echo $allergydata['allergy_id']; ?>)">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <?php }} ?>

                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Allergy</label>
                    <div class="control">
                      <input name="employee_id" type="text" value="<?php echo $data['employee_id']; ?>" required hidden>
                      <input class="input" name="allergies" type="text" placeholder="Enter Allergy" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="addallergy">&nbsp; Add Allergy &nbsp;</button>
                    </p>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Bank -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Employee Bank Details</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <?php
                  $bankquery = "SELECT * FROM employee_bank WHERE employee_id = '$employee_id'";
                  $bankresult = mysqli_query($dbcon, $bankquery);
                  $bankdata = mysqli_fetch_array($bankresult);
                ?>
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Bank <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input name="employee_id" type="text" value="<?php echo $data['employee_id']; ?>" required hidden>
                      <input class="input" name="bank" type="text" value="<?php echo $bankdata['bank']; ?>"required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Account Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="account_name" type="text" value="<?php echo $bankdata['account_name']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Account Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="account_number" type="text" value="<?php echo $bankdata['account_number']; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Bank Branch <span class="has-text-danger">*</span> </label>
                    <div class="control">
                      <input class="input" name="bank_branch" type="text" value="<?php echo $bankdata['bank_branch']; ?>"required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">SSNIT <span class="has-text-danger">*</span> </label>
                    <div class="control">
                      <input class="input" name="ssnit" type="text" value="<?php echo $bankdata['ssnit']; ?>"required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">TIN <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="tin" type="text" value="<?php echo $bankdata['tin']; ?>"required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <?php
                        $btnbankquery = "SELECT * FROM employee_bank WHERE employee_id = '$employee_id'";
                        $btnbankresult = mysqli_query($dbcon, $btnbankquery);
                        if (mysqli_num_rows($btnbankresult) > 0) {
                          echo '<button class="button is-info" name="updatebank">&nbsp; Update &nbsp;</button>';
                        }else{
                          echo '<button class="button is-info" name="addbank">&nbsp; Save &nbsp;</button>';
                        }
                      ?>

                    </p>
                  </div>
                </div>

              </form>
            </div>
        </div>

        <!-- Employee Pay -->
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Employee Salary</h1>
            </div>
            <div class="column is-full">
              <form class="columns is-multiline" action="editemployees.php?employee_id=<?php echo $employee_id; ?>" method="post" enctype="multipart/form-data">
                <?php
                  $salquery = "SELECT * FROM employee_salary WHERE employee_id = '$employee_id'";
                  $salresult = mysqli_query($dbcon, $salquery);
                  $saldata = mysqli_fetch_array($salresult);
                ?>
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Employee Status <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input name="employee_id" type="text" value="<?php echo $data['employee_id']; ?>" required hidden>
                      <div class="select">
                        <select name="employee_status" required>
                          <?php
                            if (empty($saldata['employee_status'])) {
                              echo "<option selected disabled>Select Employee Status</option>";
                            }else{
                              echo "<option selected>".$saldata['employee_status']."</option>";
                            }
                          ?>
                          <option>Full time</option>
                          <option>Part time</option>
                          <option>Casual</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date of First Pay <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="first_pay_date" type="date" value="<?php echo $saldata['first_pay_date']; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="column is-half">
                  <div class="field">
                    <label class="label">Hourly Pay<span class="has-text-danger">*</span> </label>
                    <div class="control">
                      <input class="input" name="hourly_pay" type="number" min="0.00" step="any" value="<?php echo $saldata['hourly_pay']; ?>"d>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Monthly Pay <span class="has-text-danger">*</span> </label>
                    <div class="control">
                      <input class="input" name="monthly_pay" type="number" min="0.00" step="any" value="<?php echo $saldata['monthly_pay']; ?>"d>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Annual Pay <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="annual_pay" type="number" min="0.00" step="any" value="<?php echo $saldata['annual_pay']; ?>"d>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <?php
                        $btnsalquery = "SELECT * FROM employee_salary WHERE employee_id = '$employee_id'";
                        $btnsalresult = mysqli_query($dbcon, $btnsalquery);
                        if (mysqli_num_rows($btnsalresult) > 0) {
                          echo '<button class="button is-info" name="updatesalary">&nbsp; Update &nbsp;</button>';
                        }else{
                          echo '<button class="button is-info" name="addsalary">&nbsp; Save &nbsp;</button>';
                        }
                      ?>

                    </p>
                  </div>
                </div>
              </form>
            </div>
          <?php } ?>
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
    function delete_data(d){
    var id=d;
    $.ajax({
      type: "post",
      url: "allergy.php",
      data: {id:id},
      success: function(html) {
          $(".delete_mem" + id).fadeOut('slow');
      }
    });
  }
</script>
<script type="text/javascript">
    function delete_image(d){
    var id=d;
    $.ajax({
      type: "post",
      url: "empimage.php",
      data: {id:id},
      success: function(html) {
          $(".delete_image_tr" + id).fadeOut('slow');
      }
    });
  }
</script>
<script>
  const fileInput = document.querySelector('#file-js-example input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-example .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
