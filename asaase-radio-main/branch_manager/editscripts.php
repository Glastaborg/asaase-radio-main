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
    <title>Asaase Radio || Department Head Add Program </title>
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
            <li ><a href="todayscripts.php" aria-current="page">Scripts</a></li>
            <li class="is-active"><a href="#" aria-current="page">Update Script</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Update Script</h1>
            </div>

            <div class="column is-full">
                     
               <?php
                $script_id= $_GET['script_id'];
                
              
                $dataquery = "SELECT * FROM `scripts`
                              WHERE script_id ='$script_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
            
              <form class="columns is-multiline" action="editscripts.php?script_id=<?php echo $_GET['script_id'];  ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
         
                 <input type="hidden" value="<?php echo $script_id ?>" name="script_id">
                  <div class="field">
                    <label class="label"> Program <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <select name="program_id" class="input form-control">
                        <option selected disabled>-- Select Program --</option>
                        <?php
                        $query = "SELECT * FROM programs WHERE branch = '$sessbranch'";
                        $result = mysqli_query($dbcon, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['program_id']; ?>" <?php if($row['program_id'] == $data['program_id']) { echo 'selected';}?>>
                            <?php echo $row['program'] . ' - ' .$row['branch'];?>
                        </option>
                        <?php } ?>
                        </select>
                    </div>
                  </div>
                 
                  <div class="field">
                    <label class="label">Script <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea name="script" id="" cols="20" rows="7" required class="textarea" value="<?php echo $data['script'];?>"><?php echo $data['script'];?></textarea>
                      
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Guest </label>
                    <div class="control">
                      <input type="text" class="input" name="guest" value="<?php echo $data['guest'] ?? '';?>" placeholder="Enter the name of guest" >

                    </div>
                  </div>
                  
                   <div class="field">
                    <label class="label">Panelist </label>
                    <div class="control">
                      <input type="text" class="input" name="panelist" value="<?php echo $data['panelist']?? '';?>" placeholder="Enter the name of Panelist" >

                    </div>
                  </div>
                
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="script_date" type="date" value="<?php echo $data['date'];?>" placeholder="Program Date" required>
                    </div>
                  </div>
                  
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="updatescript">
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
