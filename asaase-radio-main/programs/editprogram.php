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
    <title>Asaase Radio || Department Head Edit Program </title>
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
            <li ><a href="program.php" aria-current="page">Programs</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Programs</li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Programs</h1>
            </div>

            <div class="column is-full">
              <?php
                $program_id = $_GET['program_id'];
                $dataquery = "SELECT * FROM programs WHERE program_id ='$program_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editprogram.php?program_id=<?php echo $program_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label"> Branch <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text"  name="program_id" value="<?php echo $data['program_id']; ?>" list="branchlist" hidden required>
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
                  <div class="field">
                    <label class="label">Program <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="program" type="text" value="<?php echo $data['program']; ?>"required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Host Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="hostname" type="text" value="<?php echo $data['hostname']; ?>" required>
                    </div>
                  </div>
                   <div class="field">
                    <label class="label">Co-Host Name </label>
                    <div class="control">
                      <input class="input" name="cohost" type="text" value="<?php echo $data['cohost']?? ''; ?>" >
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Producer <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="producer" value="<?php echo $data['producer']; ?>" list="employeelist" required>
                      <datalist name="producer" id="employeelist">
                        <?php
                        $activitybranch = $data['branch'];
                        $query = "SELECT employee.* FROM employee
                                  WHERE job_description ='Employee'
                                  AND department = '$sessdepartment'
                                  AND archive_emp = 'No'";
                        $result = mysqli_query($dbcon, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['employee_id']; ?>">
                          <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> - <?php echo $row['branch']; ?>
                        </option>
                        <?php } ?>
                      </datalist>
                    </div>
                  </div>
                  
                  <div class="field">
                    <label class="label">Producers </label>
                    <div class="control">
                      <textarea class="textarea" name="producers" type="text" placeholder="Producers" ><?php echo $data['producers'] ?? ''; ?></textarea>
                    
                    </div>
                  </div>
                  
                   <div class="field">
                    <label class="label">DJ <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="dj" placeholder="Enter or Select DJ" value="<?php echo $data['dj']; ?>" list="djlist" required>
                      <datalist name="dj" id="djlist">
                        <?php
                        $activitybranch = $data['branch'];
                        $query = "SELECT employee.* FROM employee
                                  WHERE job_description ='Dj'
                                  AND archive_emp = 'No'";
                        $result = mysqli_query($dbcon, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['employee_id']; ?>">
                          <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> - <?php echo $row['branch']; ?>
                        </option>
                        <?php } ?>
                      </datalist>
                    </div>
                  </div>
             
                  <div class="field">
                    <label class="label">Program Description <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="program_desc" type="text" placeholder="Program Description" required><?php echo $data['program_desc']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Program Colour Scheme <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="program_color" type="color" value="<?php echo $data['program_color']; ?>" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="updateprogram">
                        &nbsp; Update &nbsp;
                      </button>
                    </p>
                  </div>
                </div>

              </form>
              <?php }?>
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
