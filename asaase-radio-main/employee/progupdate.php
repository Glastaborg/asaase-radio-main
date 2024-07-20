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
            <li ><a href="editprogramsched.php?program_id=<?php echo $_SESSION['program_id']; ?>" aria-current="page">< Back</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Update Program Lineup</h1>
            </div>

            <div class="column is-full">
              <?php
                $prog_upt_id = $_GET['prog_upt_id'];
                $dataquery = "SELECT * FROM program_update WHERE prog_upt_id ='$prog_upt_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);
              ?>
              <form class="columns is-multiline" action="progupdate.php?prog_upt_id=<?php echo $_GET['prog_upt_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">

                  <div class="field">
                    <input type="text"  name="prog_upt_id" value="<?php echo $_GET['prog_upt_id']; ?>" required readonly hidden>
                    <label class="label">Program Update <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="program_update" rows="3" placeholder="Enter Asset Description" required > <?php echo $data['program_update']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="update_date" type="date" value="<?php echo $data['update_date']; ?>" required >
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="updateprogstatus">
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

</script>
<script type="text/javascript">
    function delete_update(d){
    var id=d;
    $.ajax({
      type: "post",
      url: "progupd.php",
      data: {id:id},
      success: function(html) {
          $(".delete_update_tr" + id).fadeOut('slow');
      }
    });
  }
</script>
