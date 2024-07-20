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
    <title>Asaase Radio || Department Head Trade Recievables Report </title>
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
            <li class="is-active"><a href="#" aria-current="page">Trade Recievables Report</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <form class="column is-half" action="gentrade.php" method="post">
            <h1 class="title is-size-5">Trade Recievables Report</h1>
            <div class="field">
              <label class="label">Date for Report<span class="has-text-danger">*</span></label>
              <div class="control">
                <input class="input" name="date" type="date" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Branch <span class="has-text-danger">*</span></label>
              <div class="control">
                <input type="text" class="input" name="branch" placeholder="Select or Enter Branch" list="branchlist" required>
                <datalist name="branch" id="branchlist">
                  <option value="All"></option>
                  <?php
                  $query = "SELECT branch FROM branch WHERE branch <> 'Admin'";
                  $result = mysqli_query($dbcon, $query);
                  while($row = mysqli_fetch_array($result)){
                  ?>
                  <option value="<?php echo $row['branch']; ?>"></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <div class="field is-grouped my-5">
              <p class="control is-expanded is-size-6">

              </p>
              <p class="control">
                <button class="button is-info" name="gentrade">
                  &nbsp; Generate &nbsp;
                </button>
              </p>
            </div>
          </form>

          <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
            <p class="has-text-right has-text-info">
              <a href="" class="button is-white" type="button" name="button" id="print">
                <i class="fas fa-print"></i>&nbsp; Print
              </a>
            </p>
          </div>

          <div class="column is-full" id="report">
            <div class="columns is-multiline has-background-white">
                <?php
                    if (isset($_POST['gentrade'])) {
                      $date = $_POST['date'];
                      $branch = $_POST['branch'];

                ?>
                <div class="column is-full" id="report">
                  <p class="has-text-centered">
                    <img src="../images/asaase banner.png" alt="banner logo" width="300" height="120">
                  <p>
                  <h1 class="title is-size-5 has-text-centered pb-3"><?php echo $branch; ?> Trade Recievables Report</h1>
                </div>
                <div class="column is-half">
                  <table class="table is-fullwidth">
                    <tbody>
                      <!-- Opening Balance -->
                      <tr>
                        <?php
                          //previous year revenue total
                          if ($_POST['branch'] === "All") {
                            $prevrev = "SELECT SUM(amount) AS prev_rev FROM `pay_rec`
                                        WHERE YEAR(date) = YEAR(DATE_SUB('$date', INTERVAL 1 YEAR))
                                        AND type = 'Recievable'
                                        AND archive_payrec = 'No'";
                          }
                          elseif ($_POST['branch'] != "All") {
                            $prevrev = "SELECT SUM(amount) AS prev_rev FROM `pay_rec`
                                        WHERE YEAR(date) = YEAR(DATE_SUB('$date', INTERVAL 1 YEAR))
                                        AND type = 'Recievable' AND branch = '$branch'
                                        AND archive_payrec = 'No'";
                          }

                          $prevrevresult = mysqli_query($dbcon, $prevrev);
                          $prevrevrow = mysqli_fetch_assoc($prevrevresult);

                          //previous year collection total
                          if ($_POST['branch'] === "All") {
                            $prevcol = "SELECT SUM(col_budget_amt) AS prev_col FROM `week_collection`
                                        WHERE YEAR(date) = YEAR(DATE_SUB('$date', INTERVAL 1 YEAR))
                                        AND archive_wcol = 'No'";
                          }
                          elseif ($_POST['branch'] != "All") {
                            $prevcol = "SELECT SUM(col_budget_amt) AS prev_col FROM `week_collection`
                                        WHERE YEAR(date) = YEAR(DATE_SUB('$date', INTERVAL 1 YEAR))
                                        AND archive_wcol = 'No' AND branch = '$branch'";
                          }

                          $prevcolresult = mysqli_query($dbcon, $prevcol);
                          $prevcolrow = mysqli_fetch_assoc($prevcolresult);


                        ?>
                        <td> <b> Opening Balance as at 1st January <?php echo date('Y'); ?> </b></td>
                        <td>
                          <?php
                            // calculation opening bal
                            $prevrevamt = $prevrevrow['prev_rev'];
                            $prevcolamt = $prevcolrow['prev_col'];
                            $openbal = ($prevrevamt - $prevcolamt);
                            echo  $openbal;
                          ?>
                        </td>
                      </tr>

                      <!--Actual Revenue Yet to Date -->
                      <tr>
                        <?php
                          $start_of_the_year = date('Y');
                          $start_of_the_year = $start_of_the_year.'-01-01';
                          if ($_POST['branch'] === "All") {
                            $revytdquery = "SELECT SUM(amount) AS revenue_ytd FROM pay_rec
                                            WHERE pay_rec.date >= '$start_of_the_year' AND pay_rec.date <= NOW()
                                            AND type = 'Recievable'
                                            AND archive_payrec = 'No'";
                          }
                          elseif ($_POST['branch'] != "All") {
                            $revytdquery = "SELECT SUM(amount) AS revenue_ytd FROM pay_rec
                                            WHERE pay_rec.date >= '$start_of_the_year' AND pay_rec.date <= NOW()
                                            AND type = 'Recievable'
                                            AND branch = '$branch'
                                            AND archive_payrec = 'No'";
                          }

                          $revytdresult = mysqli_query($dbcon, $revytdquery);
                          $revytdrow = mysqli_fetch_assoc($revytdresult);
                        ?>
                        <td> <b>Total Revenue YTD </b></td>
                        <td> <?php echo $revytdrow['revenue_ytd']; ?> </td>
                      </tr>

                      <!--Actual Collections Yet to Date -->
                      <tr>
                        <?php
                          $start_of_the_year = date('Y');
                          $start_of_the_year = $start_of_the_year.'-01-01';
                          if ($_POST['branch'] === "All") {
                            $colytdquery = "SELECT SUM(col_week_amt) AS col_week_amt FROM week_collection
                                            WHERE week_collection.date >= '$start_of_the_year' AND week_collection.date <= NOW()
                                            AND archive_wcol = 'No'";
                          }
                          elseif ($_POST['branch'] != "All") {
                            $colytdquery = "SELECT SUM(col_week_amt) AS col_week_amt FROM week_collection
                                            WHERE week_collection.date >= '$start_of_the_year' AND week_collection.date <= NOW()
                                            AND branch = '$branch'
                                            AND archive_wcol = 'No'";
                          }

                          $colytdresult = mysqli_query($dbcon, $colytdquery);
                          $colytdrow = mysqli_fetch_assoc($colytdresult);
                        ?>
                        <td> <b>Total Collections YTD </b></td>
                        <td> <?php echo "(".$colytdrow['col_week_amt'].")"; ?> </td>
                      </tr>

                      <!--Closing balance -->
                      <tr>
                        <td> <b> Closing Balance as at date</b></td>
                        <td>
                          <?php
                            // calculation closing bal
                            $closerevamt = $revytdrow['revenue_ytd'];
                            $closecolamt = $colytdrow['col_week_amt'];
                            $closebal = ($openbal + $closerevamt - $closecolamt);
                            if ($closebal < 0) {
                              echo "<b>(".$closebal.")</b>";
                            }
                            elseif ($closebal > 0) {
                              echo "<b>".$closebal."</b>";
                            }
                          ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                    }
                 ?>
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

</script>
<script>
$(document).ready(function(){
    var report = document.getElementById('report').innerHTML;
    var mainbody = document.body.innerHTML;
    var css = '<link rel="stylesheet" href="../css/bulma.min.css">';
    $("#print").click(function(){
      document.body.innerHTML = "<html><head><title></title>" + css + "</head><body>" + report + "</body>";
      window.print();
      document.body.innerHTML = mainbody;
    });
});
</script>
