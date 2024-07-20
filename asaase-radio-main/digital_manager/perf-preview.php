<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/add.php');


if (isset($_GET['perf_id'])) {
  $perf_id = $_SESSION['perf_id'];
}else{
  header('location: perf-review.php');
}

$perf_id = $_SESSION['perf_id'];

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
            <!-- <li><a href="part-c.php?perf_part_c_id=<?php //echo $_SESSION['perf_id']; ?>"> &nbsp; Part C</a></li>
            <li><a href="part-d.php?perf_part_d_id=<?php //echo $_SESSION['perf_id']; ?>"> &nbsp; Part D</a></li> -->
            <li class="is-active"><a href="#" aria-current="page">Preview</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <a href="part-b.php?perf_part_b_id=<?php echo $_SESSION['perf_id']; ?>" class="button is-info" name="button" id="addbtn">Back</a>
              </div>
              <div class="column is-half">
                  <p class="has-text-right"><a href="perf-review.php" class="button is-info" name="button" id="addbtn">Exit</a></p>
              </div>
            </div>
          </div>

          <div class="column is-full">
            <h4 class="title has-text-centered is-size-4 py-3">PERFORMANCE REVIEW FORM</h4>
          </div>

          <div class="column is-full">
            <?php 
                  $empquery = "SELECT * FROM employee
                  WHERE employee.employee_id = '$sessemp_id'";
                  $empresult = mysqli_query($dbcon, $empquery);
                  $emprow = mysqli_fetch_assoc($empresult);
            ?>
            <div class="columns">
              <div class="column is-half">
                <b>NAME OF EMPLOYEE: </b><?php echo $emprow['firstname']; ?> <?php echo $emprow['lastname']; ?><br>
                <b>DATE OF JOINING: </b><?php echo $emprow['date_joined']; ?>  
              </div>
              <div class="column is-half">
                <b>DEPARTMENT:</b> <?php echo $emprow['department']; ?>
              </div>
            </div>
          </div>

          <div class="column is-full">
            
            <div class="columns">
              <?php
                $perfquery = "SELECT * FROM perf_rev
                          WHERE perf_id = '$perf_id'
                          ORDER BY perf_date DESC";
                $perfresult = mysqli_query($dbcon, $perfquery);
                $perfrow = mysqli_fetch_assoc($perfresult);
                ?>
              <div class="column is-half">
                <b>DATE OF APPRAISAL: </b> <?php echo $perfrow['perf_date']; ?> 
              </div>
              <?php 
                  $supquery = "SELECT * FROM employee
                  WHERE employee.department = '$sessdepartment'
                  AND position = 'Supervisor'";
                  $supresult = mysqli_query($dbcon, $supquery);
                  $suprow = mysqli_fetch_assoc($supresult);
              ?>
              <div class="column is-half">
                <b>NAME OF THE APPRAISER: </b> <?php if($suprow == null){ echo ''; }else { echo $suprow['firstname'] ." ".$suprow['lastname'] ;}  ?>
              </div>
            </div>
          </div>

          <?php 
            //part a
            $query = "SELECT * FROM perf_part_a
            INNER JOIN perf_rev ON perf_part_a.perf_id = perf_rev.perf_id
            WHERE perf_part_a.perf_id = '$perf_id'
            ORDER BY part_a_datecreated ASC";
            $result = mysqli_query($dbcon, $query);
            $table_no = 0;

            if (mysqli_num_rows($result) > 0) { 
          ?>
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-full">
                <h1 class="title is-size-5">Part A: Review of Mid or Annual Goals/Targets </h1>
              </div>
            </div>
          </div>
          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-bordered is-hoverable" id="table">
                <tbody>
                <tr >
                    <td class="is-size-6 is-size-7-mobile ">Target No</td>
                    <td class="is-size-6 is-size-7-mobile">Key Results Area</td>
                    <td class="is-size-6 is-size-7-mobile">Target (Description)</td>
                    <td class="is-size-6 is-size-7-mobile">Outcome of Target Description(Mid-year OR End of year review – please indicate as appropriate)</td>
                    <td class="is-size-6 is-size-7-mobile">Rating</td>
                    <td class="is-size-6 is-size-7-mobile">Actual Score (one can score more tdan 100% on a goal)</td>
                  </tr>
                <?php while($row = mysqli_fetch_array ($result)){ ?>
                  <tr class="datatr" >
                    <td class="is-size-6 is-size-7-mobile"><?php echo ++$table_no; ?></td>
                    <td class="is-size-6 is-size-7-mobile" width="200px">
                        <b><?php echo $row['key_results']; ?></b>   
                        <p>Weighting: <?php echo $row['part_a_w']; ?> </p> 
                        <p>Weighted Score: <?php echo $row['part_a_ws']; ?></p>  
                    </td>
                    <td class="is-size-6 is-size-7-mobile" ><?php echo $row['target_desc']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['outcome_desc']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['part_a_rating']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['part_a_act_score']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <?php }  ?>




          <?php 
            //part b
            $query = "SELECT * FROM perf_part_b
            INNER JOIN perf_rev ON perf_part_b.perf_id = perf_rev.perf_id
            WHERE perf_part_b.perf_id = '$perf_id'
            ORDER BY part_b_datecreated ASC";
            $result = mysqli_query($dbcon, $query);
            $table_no = 0;

            if (mysqli_num_rows($result) > 0) { 
          ?>
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-full">
                <h1 class="title is-size-5">PART B: Developmental Target: Specific areas of improvement for the appraisal year.</h1>
              </div>
            </div>
          </div>
          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-bordered is-hoverable" id="table">
                
                <tbody>
                <tr >
                    <td class="is-size-6 is-size-7-mobile">Target No</td>
                    <td class="is-size-6 is-size-7-mobile">Developmental Target</td>
                    <td class="is-size-6 is-size-7-mobile">Developmental Target Definition</td>
                    <td class="is-size-6 is-size-7-mobile">Assessment</td>
                    <td class="is-size-6 is-size-7-mobile">Rating</td>
                    <td class="is-size-6 is-size-7-mobile">Actual Score </td>
                  </tr>
                <?php while($row = mysqli_fetch_array ($result)){ ?>
                  <tr >
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
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php }  ?>



          <?php 
            //part c
            $query = "SELECT * FROM perf_part_c
            INNER JOIN perf_rev ON perf_part_c.perf_id = perf_rev.perf_id
            WHERE perf_part_c.perf_id = '$perf_id'
            ORDER BY part_c_datecreated ASC";
            $result = mysqli_query($dbcon, $query);
            $table_no = 0;

            if (mysqli_num_rows($result) > 0) { 
          ?>
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-full">
                <h1 class="title is-size-5">PART C- Developmental Needs Identification (To be filled by the Appraiser in discussion with Appraisee 
                  and transferable to the Individual Development Plan Form. For Annual Review Only).</h1>
              </div>
            </div>
          </div>
          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-bordered is-hoverable" id="table">
                
                <?php if($row = mysqli_fetch_array ($result)){ ?>
                <tbody>
                  <tr>
                    <td>
                      <b>Summary of Identified Gap(s) (Technical and/or Behavioural):</b>
                      <p><?php echo $row['sum_of_id']; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <b>Development Support Needed: (Please indicate how support will be provided)</b>
                      <p><?php echo $row['dev_sup_need']; ?></p>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php }  ?>

          
          
          <?php 
          //part d
            $query = "SELECT * FROM perf_part_d
            INNER JOIN perf_rev ON perf_part_d.perf_id = perf_rev.perf_id
            WHERE perf_part_d.perf_id = '$perf_id'
            ORDER BY part_d_datecreated ASC";
            $result = mysqli_query($dbcon, $query);

            if (mysqli_num_rows($result) > 0) { 
          ?>
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">PART D – Mid or End of Year Feedback & Comments [To be filled in by Appraiser and Appraisee].</h1>
              </div>
              <div class="column">
                <p class="has-text-right"><a href="#appendix"></a></p>
              </div>
            </div>
          </div>
          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-bordered  is-hoverable" id="table">
                <?php if($row = mysqli_fetch_array ($result)){ ?>
                <tbody>
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
                    <td class="is-size-6 is-size-7-mobile" width="50%">
                      <b>Comments by Employee</b>
                      <p><?php echo $row['emp_comment']; ?></p>
                      <p class="mt-5"><b>Date:</b> <?php echo $row['emp_date']; ?></p>
                    </td>
                    <td class="is-size-6 is-size-7-mobile">
                      <b>Comments by Appraiser</b>
                      <p><?php echo $row['sup_comment']; ?></p>
                      <p class="mt-5"><b>Date:</b> <?php echo $row['sup_date']; ?></p>
                    </td>
                  </tr>
                  <tr>
                      <td class="is-size-6 is-size-7-mobile">
                        <b>Comments by Manager</b>
                        <p><?php echo $row['mgn_comment']; ?></p>
                        <p class="mt-5"><b>Date:</b> <?php echo $row['mgn_date']; ?></p>
                      </td>
                      <td class="is-size-6 is-size-7-mobile">
                        <b>Comments by HR</b>
                        <p><?php echo $row['hr_comment']; ?></p>
                        <p class="mt-5"><b>Date:</b> <?php echo $row['hr_date']; ?></p>
                      </td>
                    </tr>
                  <?php }  ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php }  ?>



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


