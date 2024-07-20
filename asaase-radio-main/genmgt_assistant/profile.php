<?php
  session_start();
  include('../connection.php');
  include('includes/auth.php');
  include('assets/update.php');
  $query = "SELECT * FROM employee
            WHERE employee.employee_id = '$sessemp_id'";
  $result = mysqli_query($dbcon, $query);
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || General Manager Profile </title>
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
            <li class="is-active"><a href="#" aria-current="page">My Profile</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-4"> Profile Details</h1>
            </div>

            <div class="column is-full">
              <div class="columns is-multiline" >
                <form class="column is-half" action="profile.php" method="post" enctype="multipart/form-data">
                  <h1 class="title is-size-5"> Update Details</h1>
                  <div class="field">
                    <label class="label">First Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="firstname" type="text" value="<?php echo $row['firstname']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Last Name <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="lastname" type="text" value="<?php echo $row['lastname']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Email <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="email" type="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Phone Number <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="phone" type="tel" pattern="[0-9]{10}" value="<?php echo $row['phone']; ?>" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updateprofile">
                        &nbsp; Update Details &nbsp;
                      </button>
                    </p>
                  </div>
                </form>

                <form class="column is-half" action="profile.php" method="post" enctype="multipart/form-data">
                  <h1 class="title is-size-5"> Update Password Details</h1>
                  <div class="field">
                    <label class="label">New Password <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="npassword" type="password" minlength="8" placeholder="Enter New Password" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Confirm New Password <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="cpassword" type="password" minlength="8" placeholder="Confirm New Password" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updatepassword">
                        &nbsp; Update Password &nbsp;
                      </button>
                    </p>
                  </div>
                </form>

              </div>
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
