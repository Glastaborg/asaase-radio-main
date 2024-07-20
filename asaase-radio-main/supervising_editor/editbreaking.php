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
    <title>Asaase Radio || Department Head Edit Breaking News </title>
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
            <li ><a href="breaking.php" aria-current="page">Breaking News</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Breaking News</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Breaking News</h1>
            </div>

            <div class="column is-full">
              <?php
                $break_id = $_GET['break_id'];
                $dataquery = "SELECT * FROM breaking_news WHERE break_id ='$break_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editbreaking.php?break_id=<?php echo $break_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label"> Branch <span class="has-text-danger">*</span></label>
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
                  <div class="field">
                    <input type="text" name="break_id" value="<?php echo $data['break_id']; ?>" hidden required>
                    <label class="label">Description <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="comment" rows="3" required><?php echo $data['comment']; ?></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Number of Times <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="amt" type="number" step="1" value="<?php echo $data['amt']; ?>"  required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Where News is From<span class="has-text-danger">*</span></label>
                    <div class="control pr-5" >
                      <div class="select ">
                        <select name="type" required>
                          <option selected ><?php echo $data['type']; ?></option>
                          <option>Web</option>
                          <option>Business</option>
                          <option>Current Affairs</option>
                          <option>Newsroom</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="date" type="date" value="<?php echo $data['date']; ?>" required>
                    </div>
                  </div>

                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updatebreaking">
                        &nbsp; Update &nbsp;
                      </button>
                    </p>
                  </div>
                </div>

              </form>
              <?php }?>
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
