<?php
session_start();
include('../connection.php');
include('includes/auth.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Admin Unit </title>
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
            <li ><a href="unit.php" aria-current="page">Unit</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Unit</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
            <h1 class="title is-size-5">Edit Unit</h1>
          </div>

          <div class="column is-full">
            <?php
              $unit = $_GET['unit'];
              $dataquery = "SELECT * FROM department_unit WHERE unit ='$unit'";
              $dataresult = mysqli_query($dbcon, $dataquery);
              if (mysqli_num_rows($dataresult) > 0) {
                $data = mysqli_fetch_array($dataresult);

            ?>
            <form class="columns is-multiline" action="unit.php" method="post" enctype="multipart/form-data">
              <div class="column is-half">
                <div class="field">
                  <label class="label">Unit <span class="has-text-danger">*</span></label>
                  <div class="control">
                    <input name="ounit" type="text" value="<?php echo $data['unit']; ?>" required hidden>
                    <input class="input" name="nunit" type="text" value="<?php echo $data['unit']; ?>" required>
                  </div>
                </div>
                <div class="field">
                    <label class="label">Department <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input  name="odepartment" type="hidden" value="<?php echo $data['department'] ?>" required >
                      <select name="ndepartment" class="input" id="" required>
                          <option value="">--Select--</option>
                           <?php
                              $query = "SELECT department.* FROM 
                                        department
                                        ";
                              $result = mysqli_query($dbcon, $query);
                              while($row = mysqli_fetch_array($result)){
                              ?>
                              <option value="<?php echo $row['department']; ?>" <?php if($row['department'] === $data['department']){ echo('selected'); }   ?>>
                                <?php echo $row['department']; ?> 
                              </option>
                            <?php } ?>
                      </select>
                    
                    </div>
                  </div>
                <div class="field is-grouped my-5">
                  <p class="control is-expanded is-size-6"></p>
                  <p class="control">
                    <button class="button is-info" name="updateunit">
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
