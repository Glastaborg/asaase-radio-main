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
    <title>Asaase Radio || Department Head Add Program </title>
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
            <li ><a href="progsched.php" aria-current="page">Program Lineup</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Program Lineup</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Program Update</h1>
            </div>

            <div class="column is-full">
              <?php
                $_SESSION['program_id'] = $_GET['program_id'];
                $program_id = $_GET['program_id'];
                $producer = $_SESSION['employee_id'];

                $producer_check = "SELECT * FROM programs WHERE program_id = '$program_id' AND producer = '$producer'";
                $producer_result = mysqli_query($dbcon, $producer_check);

                if (mysqli_affected_rows($dbcon) == 1) {

              ?>
              <form class="columns is-multiline" action="editprogramsched.php?program_id=<?php echo $_GET['program_id'];  ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <input type="text"  name="program_id" value="<?php echo $_GET['program_id']; ?>" required readonly hidden>
                    <label class="label">Program Update <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <textarea class="textarea" name="program_update" rows="3" placeholder="Enter Asset Description" required></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Date <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input class="input" name="update_date" type="date" required>
                    </div>
                  </div>
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="addprog_status">
                        &nbsp; Save &nbsp;
                      </button>
                    </p>
                  </div>
                </div>


              </form>
            </div>

            <div class="column is-full">
              <?php
                $program_id = $_GET['program_id'];

                $rowquery = "SELECT * FROM program_update
                             WHERE program_update.program_id = '$program_id'
                             ORDER BY update_date DESC";
                $rowresult = mysqli_query($dbcon, $rowquery);
                if (mysqli_num_rows($rowresult) <= 0) {
                  echo '<div class="notification is-danger is-light">There are no related reports for program status.</div>';
                }
              else{ ?>
              <div class="table=container">
                <table class="table is-fullwidth">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Program Update</th>
                      <th>Comments</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_array($rowresult)) { ?>
                    <tr class="delete_update_tr<?php echo $row['prog_upt_id']; ?>">
                      <td><?php echo $row['update_date']; ?></td>
                      <td><?php echo $row['program_update']; ?></td>
                      <td><?php echo $row['prog_comment']; ?></td>
                      <td class="is-size-6">
                        <a class="button is-size-7 is-info btn-danger" href="progupdate.php?prog_upt_id=<?php echo $row['prog_upt_id']; ?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="button is-size-7 is-danger btn-danger" onclick="delete_update(<?php echo $row['prog_upt_id']; ?>)">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } ?>
              <?php } else{ ?>
              <div class="notification is-danger is-light">You are not assigned to this program.</div>
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
<script type="text/javascript">
    function delete_update(d){
    var id=d;
    $.ajax({
      type: "post",
      url: "progupd.php",
      data: {id:id},
      success: function(html) {
          $(".delete_update_tr" + id).fadeOut('slow');
      }
    });
  }
</script>
