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
    <title>Asaase Radio || Department Head Add Agency </title>
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
            <li ><a href="agency.php" aria-current="page">Agencies</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Agency</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Agency</h1>
            </div>

            <div class="column is-full">
              <?php
                $agency_id = $_GET['agency_id'];
                $dataquery = "SELECT * FROM sales_agency WHERE agency_id ='$agency_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);
              ?>
              <form class="columns is-multiline" action="editagency.php?agency_id=<?php echo $agency_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Agency Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input  name="agency_id" type="text" value="<?php echo $data['agency_id']; ?>" required hidden>
                      <input class="input" name="agency_name" type="text" value="<?php echo $data['agency_name']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Agency Email <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="agency_email" type="email" value="<?php echo $data['agency_email']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Agency Phone Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="agency_phone" name="phone" type="tel" pattern="[0-9]{10}" value="<?php echo $data['agency_phone']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Agency Address <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="agency_location" rows="5" required><?php echo $data['agency_location']; ?></textarea>
                    </div>
                  </div>
                  
                  <div class="field">
                    <label class="label">Contact Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="agency_contact_name" type="text" placeholder="Agency Contact Name" value="<?php echo $data['contact_name']; ?>" required>
                    </div>
                  </div>
                  
                  <div class="field">
                    <label class="label">Contact Phone Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="agency_contact_phone" name="phone" type="tel" pattern="[0-9]{10}" placeholder="Agency Contact Phone Number" value="<?php echo $data['contact_phone']; ?>" required>
                    </div>
                  </div>

                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="updateagency">
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
