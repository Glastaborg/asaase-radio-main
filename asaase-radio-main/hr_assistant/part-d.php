<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/add.php');


if (isset($_GET['perf_part_d_id'])) {
  $perf_id = $_SESSION['perf_id'];
}else{
  header('location: perf-review.php');
}

$perf_id = $_SESSION['perf_id'];


  $query = "SELECT * FROM perf_part_d
            INNER JOIN perf_rev ON perf_part_d.perf_id = perf_rev.perf_id
            WHERE perf_part_d.perf_id = '$perf_id'
            ORDER BY part_d_datecreated ASC";
  $result = mysqli_query($dbcon, $query);
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
          <?php if ( $sessjob_post === "Supervisor") { ?>
            <li><a href="part-c.php?perf_part_c_id=<?php echo $_SESSION['perf_id']; ?>"> &nbsp; Part C</a></li>
          <?php }?>
            <li class="is-active"><a href="#" aria-current="page">Part D</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
              <?php if ( $sessjob_post === "Supervisor") { ?>
                <a href="part-c.php?perf_part_c_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Back</a>
              <?php }?>
              <?php if ($sessjob_post !== "Supervisor") { ?>
                <a href="part-b.php?perf_part_b_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Back</a>
              <?php }?>
              </div>
              <div class="column is-half">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                  <p class="has-text-right"><a href="perf-preview.php?perf_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Preview</a></p>
                <?php }?>
              </div>
            </div>
          </div>

          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">PART D – Mid or End of Year Feedback & Comments [To be filled in by Appraiser and Appraisee].</h1>
              </div>
              <div class="column">
                <p class="has-text-right"><a href="#appendix">Read Appendix</a></p>
              </div>
            </div>
          </div>

          
          
          <?php if (mysqli_num_rows($result) <= 0) {include('includes/part-d-form.php'); ?> 
          
          <div class="column is-full  py-6"></div> 
          <?php }?>

          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-bordered  is-hoverable" id="table">
                
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php if($row = mysqli_fetch_array ($result)){ ?>
                <tbody>
                  <tr>
                    <td colspan="2" class="is-size-6 is-size-7-mobile has-text-right pr-6">
                      <?php //if ($row['leave_status'] !== 'Granted' AND $row['leave_status'] !== 'Rejected') {

                      ?>
                      <a class="button is-size-7 is-info m-1" title="update"  href="editpart-d.php?part_d_id=<?php echo $row['part_d_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete"  href="assets/part-d-back.php?del_part_d_id=<?php echo $row['part_d_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                      <?php //} ?>
                    </td>
                  </tr>
                  <tr >
                    <td class="is-size-6 is-size-7-mobile">Total Score- Target:</td>
                    <td class="is-size-6 is-size-7-mobile" width="200px"><?php echo $row['ts_target']; ?></td>
                    
                  </tr>
                  <tr>
                    <td class="is-size-6 is-size-7-mobile">Total Score- Job Fundamental: </td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['ts_job_fund']; ?></td>
                  </tr>
                  <tr>
                    <td class="is-size-6 is-size-7-mobile">Final Score-(Annual Targets+ Job Fundamentals)(Annual Review only)</td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['final_score']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2" class="is-size-6 is-size-7-mobile">
                      <b>Final Rating</b>
                      <p>
                        <div class="control">
                          <label class="radio">
                              <input type="radio" name="final_rating" value="5" <?php if ($row['final_rating'] == 5) { echo "checked"; } ; ?> disabled>
                              5-CEE
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="4" <?php if ($row['final_rating'] == 4) { echo "checked"; } ; ?> disabled>
                              4-EE
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="3" <?php if ($row['final_rating'] == 3) { echo "checked"; } ; ?> disabled>
                              3-ME
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="2" <?php if ($row['final_rating'] == 2) { echo "checked"; } ; ?> disabled>
                              2-PME
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="1" <?php if ($row['final_rating'] == 1) { echo "checked"; } ; ?> disabled>
                              1-UP
                          </label>
                        </div>
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="is-size-6 is-size-7-mobile">
                      <b>Comments by Employee</b>
                      <p><?php echo $row['emp_comment']; ?></p>
                      <p class="mt-5"><b>Date:</b> <?php echo $row['emp_date']; ?></p>
                    </td>
                  </tr>
                  <?php } } else {
                    echo '<tr><td><p class="subtitle is-size-6 py-3 has-text-danger">You have no data on Mid or End of Year Feedback & Comments</p></td></tr>';
                  }?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="column is-full py-6"></div>

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
        }, "emp_comment");
        editor.startup();
    });

</script>


