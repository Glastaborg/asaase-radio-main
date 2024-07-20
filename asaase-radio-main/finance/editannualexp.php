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
    <title>Asaase Radio || Department Head Annual Budget Expense </title>
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
            <li ><a href="annualexpense.php" aria-current="page">Annual Budget Expense</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Annual Budget Expense</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Annual Budget Expense</h1>
            </div>

            <div class="column is-full">
              <?php
                $ann_exp_id = $_GET['ann_exp_id'];
                $dataquery = "SELECT * FROM annual_expense WHERE ann_exp_id ='$ann_exp_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editannualexp.php?ann_exp_id=<?php echo $ann_exp_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <input type="text" name="ann_exp_id" value="<?php echo $data['ann_exp_id']; ?>" hidden required>
                    <label class="label">Annual Budgeted Expense <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="annual_amount" type="number" min="0.01" step="any" value="<?php echo $data['annual_amount']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Year <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="exp_year" type="number" min="<?php echo date('Y'); ?>" max='2099'  step="1" value="<?php echo $data['exp_year']; ?>" required>
                    </div>
                  </div>

                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updateannualexp">
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
