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
    <title>Asaase Radio || Department Head Edit Recievables Report </title>
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
            <li ><a href="payable.php" aria-current="page">Payables</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Payables</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Payables</h1>
            </div>

            <div class="column is-full">
              <?php
                $pay_rec_id = $_GET['pay_rec_id'];
                $dataquery = "SELECT * FROM pay_rec WHERE pay_rec_id ='$pay_rec_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editpayable.php?pay_rec_id=<?php echo $pay_rec_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <input type="text"  name="pay_rec_id" value="<?php echo $data['pay_rec_id']; ?>" hidden required>
                    <label class="label">Description <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="desciption" rows="3" required><?php echo $data['desciption']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <input type="text"  name="pay_rec_id" value="<?php echo $data['pay_rec_id']; ?>" hidden required>
                    <label class="label">Payable Type <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="payrectype" rows="3" required><?php echo $data['payrectype']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Amount <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="amount" type="number" min="0.01" step="any" value="<?php echo $data['amount']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="date" type="date" value="<?php echo $data['date']; ?>" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Branch <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="branch" value="<?php echo $data['branch']; ?>" list="branchlist" required>
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
                      <button class="button is-info" name="updatepayable">
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
