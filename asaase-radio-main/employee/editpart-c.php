<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/add.php');
include('assets/delete.php');


  $part_c_id = $_GET['part_c_id'];

  $query = "SELECT * FROM perf_part_c
            WHERE part_c_id = '$part_c_id'";
  $result = mysqli_query($dbcon, $query);
  $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio </title>
    <!-- CSS Links-->
    <?php include("../includes/includes_css.php"); ?>
    <!-- Js Scripts-->
    <?php include("../includes/includes_js.php"); ?>

    <style type="text/css">
    /* bring in the claro theme */
    @import "//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dijit/themes/claro/claro.css";
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js"
    data-dojo-config="async: true, parseOnLoad: true"> </script>
    <script>
        // Load the editor resource
        require(["dijit/Editor", "dojo/parser"]);
    </script>
  </head>
  <body class="has-background-light">
    <div class="columns">
      <?php include('includes/sidebar.php'); ?>
      <div class="column is-10 has-background-light" id="main">
        <?php include('includes/navbar.php'); ?>
        <nav class="breadcrumb p-3" aria-label="breadcrumbs">
          <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> &nbsp; Dashboard</a></li>
            <li><a href="perf-review.php"> &nbsp; Performace Review</a></li>
            <li><a href="part-a.php?perf_part_a_id=<?php echo $_SESSION['perf_id']; ?>"> &nbsp; Part A</a></li>
            <li><a href="part-b.php?perf_part_b_id=<?php echo $_SESSION['perf_id']; ?>"> &nbsp; Part B</a></li>
            <li><a href="part-c.php?perf_part_c_id=<?php echo $_SESSION['perf_id']; ?>"> &nbsp; Part C</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Part C</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <a href="part-c.php?perf_part_c_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Back</a>
              </div>
              <div class="column is-half">
                <!-- <p class="has-text-right"><a href="part-b.php" class="button is-info"  name="button" id="addbtn">Next Step</a></p> -->
              </div>
            </div>
          </div>

          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">PART C- Developmental Needs Identification (To be filled by the Appraiser in discussion with Appraisee 
                  and transferable to the Individual Development Plan Form. For Annual Review Only).</h1>
              </div>
              <div class="column">
                <p class="has-text-right"><a href="#appendix">Read Appendix</a></p>
              </div>
            </div>
          </div>    
          
          <!-- including form -->
          <?php include('includes/part-c-uform.php');?>


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
<script>
  // Load the editor resource
  require(["dijit/Editor", "dojo/domReady!"], function(Editor){
        // Make our editor
        var editor = new Editor({
            plugins: ["bold","italic","|","cut","copy","paste","|","insertUnorderedList"]
        }, "sum_of_id");
        editor.startup();
    });

    require(["dijit/Editor", "dojo/domReady!"], function(Editor){
        // Make our editor
        var editor = new Editor({
            plugins: ["bold","italic","|","cut","copy","paste","|","insertUnorderedList"]
        }, "dev_sup_need");
        editor.startup();
    });
</script>


