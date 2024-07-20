<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/add.php');


if (isset($_GET['perf_part_b_id'])) {
  $perf_id = $_SESSION['perf_id'];
}else{
  header('location: perf-review.php');
}

$perf_id = $_SESSION['perf_id'];


  $query = "SELECT * FROM perf_part_b
            INNER JOIN perf_rev ON perf_part_b.perf_id = perf_rev.perf_id
            WHERE perf_part_b.perf_id = '$perf_id'
            ORDER BY part_b_datecreated ASC";
  $result = mysqli_query($dbcon, $query);
  $table_no = 0;
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
            <li class="is-active"><a href="#" aria-current="page">Part B</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <a href="part-a.php?perf_part_a_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Back</a>
              </div>
              <div class="column is-half">
                <?php if (mysqli_num_rows($result) > 0 && $sessjob_post === "Supervisor") { ?>
                  <p class="has-text-right"><a href="part-c.php?perf_part_c_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Next Step</a></p>
                <?php }?>
                <?php if (mysqli_num_rows($result) > 0 && $sessjob_post != "Supervisor") { ?>
                  <!-- <p class="has-text-right"><a href="part-d.php?perf_part_d_id=<?php //echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Next Step</a></p> -->
                  <p class="has-text-right"><a href="perf-preview.php?perf_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Preview</a></p>
                <?php }?>
              </div> 
            </div>
          </div>

          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">PART B: Developmental Target: Specific areas of improvement for the appraisal year.</h1>
              </div>
              <div class="column">
                <p class="has-text-right"><a href="#appendix">Read Appendix</a></p>
              </div>
            </div>
          </div>

          
          
          <?php include('includes/part-b-form.php');?>

          <div class="column is-full has-background-light py-6"></div>

          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <thead>
                  <tr >
                    <th class="is-size-6 is-size-7-mobile">Target No</th>
                    <th class="is-size-6 is-size-7-mobile">Developmental Target</th>
                    <th class="is-size-6 is-size-7-mobile">Developmental Target Definition</th>
                    <th class="is-size-6 is-size-7-mobile">Assessment</th>
                    <th class="is-size-6 is-size-7-mobile">Rating</th>
                    <th class="is-size-6 is-size-7-mobile">Actual Score </th>
                    <th class="is-size-6 is-size-7-mobile has-text-right pr-6">Actions</th>
                  </tr>
                </thead>
                <?php while($row = mysqli_fetch_array ($result)){ ?>
                <tbody>
                  <tr class="datatr" >
                    <td class="is-size-6 is-size-7-mobile"><?php echo ++$table_no; ?></td>
                    <td class="is-size-6 is-size-7-mobile" width="200px">
                        <b><?php echo $row['dev_target']; ?></b>   
                        <p>Weighting: <?php echo $row['part_b_w']; ?> </p> 
                        <p>Weighted Score: <?php echo $row['part_b_ws']; ?></p>  
                    </td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['dev_targ_def']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['assestment']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['part_b_rating']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['part_b_act_score']; ?></td>
                    <td class="is-size-6 is-size-7-mobile has-text-right pr-6">
                    <?php 
                      //for supervisor only
                      if ($sessjob_post === "Supervisor") {
                    ?>
                      <a class="button is-size-7 is-info m-1" title="update"  href="editpart-b.php?part_b_id=<?php echo $row['part_b_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                    <?php } ?>
                      <a class="button is-size-7 is-danger m-1" title="delete"  href="assets/part-b-back.php?del_part_b_id=<?php echo $row['part_b_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                  <?php } } else {
                    echo '<tr><td><p class="subtitle is-size-6 py-3 has-text-danger">There is no data on Developmental Targets</p></td></tr>';
                  }?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="column is-full has-background-light py-6"></div>

          <?php include('includes/rating-table.php');?>



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
        }, "dev_targ_def");
        editor.startup();
    });

    require(["dijit/Editor", "dojo/domReady!"], function(Editor){
        // Make our editor
        var editor = new Editor({
            plugins: ["bold","italic","|","cut","copy","paste","|","insertUnorderedList"]
        }, "assestment");
        editor.startup();
    });
</script>


