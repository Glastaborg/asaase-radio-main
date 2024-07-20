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
    <title>Asaase Radio || Department Head Revenue Report </title>
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
            <li class="is-active"><a href="#" aria-current="page">Revenue Report</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <form class="column is-half" action="genrev.php" method="post">
            <h1 class="title is-size-5">Revenue Report</h1>
            <div class="field">
              <label class="label">Date for Revenue Report<span class="has-text-danger">*</span></label>
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
                <button class="button is-info" name="genrev">
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
                    if (isset($_POST['genrev'])) {
                      $date = $_POST['date'];
                      $branch = $_POST['branch'];

                ?>
                <div class="column is-full" id="report">
                  <p class="has-text-centered">
                    <img src="../images/asaase banner.png" alt="banner logo" width="300" height="120">
                  <p>
                  <h1 class="title is-size-5 has-text-centered pb-3"><?php echo $branch; ?> Revenue Report</h1>
                </div>
                <div class="column is-half">
                  <table class="table is-fullwidth">
                    <tbody>
                      <!-- Monthly Revenue -->
                      <tr>
                        <?php
                          if ($_POST['branch'] === "All") {
                            $mrevquery = "SELECT SUM(amount) AS month_revenue FROM pay_rec
                                          WHERE Month(pay_rec.date) = Month('$date')
                                          AND Year(pay_rec.date) = Year('$date')
                                          AND type = 'Recievable'
                                          AND archive_payrec = 'No'";
                          }
                          elseif ($_POST['branch'] != "All") {
                            $mrevquery = "SELECT SUM(amount) AS month_revenue FROM pay_rec
                                          WHERE Month(pay_rec.date) = Month('$date')
                                          AND Year(pay_rec.date) = Year('$date')
                                          AND type = 'Recievable'
                                          AND branch = '$branch'
                                          AND archive_payrec = 'No'";
                          }

                          $mrevresult = mysqli_query($dbcon, $mrevquery);
                          $mrevrow = mysqli_fetch_assoc($mrevresult);
                        ?>
                        <td> <b> Monthly Revenue </b></td>
                        <td> <?php echo  $mrevrow['month_revenue']; ?> </td>
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
                        <td> <b> Revenue YTD (Actual) </b></td>
                        <td> <?php echo $revytdrow['revenue_ytd']; ?> </td>
                      </tr>
                      <!-- Annual Budgeted Revenue -->
                      <tr>
                        <?php
                          $start_of_the_year = date('Y');
                          $start_of_the_year = $start_of_the_year.'-01-01';
                          if ($_POST['branch'] === "All") {
                            $acbrevquery = "SELECT SUM(amount) AS annual_revenue FROM pay_rec
                                            WHERE Year(pay_rec.date) = Year('$date')
                                            AND type = 'Recievable'
                                            AND archive_payrec = 'No'";
                          }
                          elseif ($_POST['branch'] != "All") {
                            $acbrevquery = "SELECT SUM(amount) AS annual_revenue FROM pay_rec
                                            WHERE Year(pay_rec.date) = Year('$date')
                                            AND type = 'Recievable'
                                            AND branch = '$branch'
                                            AND archive_payrec = 'No'";
                          }

                          $acbrevresult = mysqli_query($dbcon, $acbrevquery);
                          $acbrevrow = mysqli_fetch_assoc($acbrevresult);
                        ?>
                        <td> <b> Annual Budgeted Revenue </b></td>
                        <td><?php echo $acbrevrow['annual_revenue']; ?></td>
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
