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
    <title>Asaase Radio || Admin Add Department </title>
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
            <li ><a href="department.php" aria-current="page">Department</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Department</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
            <h1 class="title is-size-5">Add Department</h1>
          </div>

          <div class="column is-full">

            <form class="columns is-multiline" action="adddepartment.php" method="post" enctype="multipart/form-data">
              <div class="column is-half">
                <div class="field">
                  <label class="label">Department <span class="has-text-danger">*</span></label>
                  <div class="control">
                    <input class="input" name="department" type="text" placeholder="Department" required>
                  </div>
                </div>
                <div class="field is-grouped my-5">
                  <p class="control is-expanded is-size-6"></p>
                  <p class="control">
                    <button class="button is-info" name="adddepartment">
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
</script>
