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
    <title>Asaase Radio || Department Head Weekly Collection Report </title>
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
            <li ><a href="wcolreports.php" aria-current="page">Weekly Collection</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Weekly Collection</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Weekly Collection</h1>
            </div>

            <div class="column is-full">
              <form class="columns is-multiline" action="addcolweek.php" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label">Total Collection for The Week <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="col_week_amt" type="number" min="0.01" step="any" placeholder="Enter Total Collection for The Week" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Total Collection Budget Annual <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="col_budget_amt" type="number" min="0.01" step="any" placeholder="Enter Total Collection Budget Annual" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="date" type="date" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Reasons for Difference <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="reason" rows="3" placeholder="Enter Reasons for Difference" required></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Branch <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="branch" placeholder="Select or Enter Branch" list="branchlist" required>
                      <datalist name="branch" id="branchlist">
                        <option disabled>Select Branch</option>
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
                      <button class="button is-info" name="addweekcol">
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
