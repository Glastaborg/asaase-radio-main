<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');
if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }
  $no_of_pages = 20;
  $show_fisrt = ($page-1)*10;

  $query = "SELECT * FROM insets
            WHERE insets_type = 'Unplayed Insets'
            ORDER BY date DESC, branch
            LIMIT $show_fisrt,$no_of_pages";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Admin Unplayed Insets </title>
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
            <li class="is-active"><a href="#" aria-current="page">Unplayed Insets</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1" >
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Unplayed Insets Reports</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Reports" id="search">
                    <span class="icon is-small is-left">
                      <i class="fas fa-search"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="column is-full">
            <div class="columns is-align-items-center py-3" >
              <div class="">
                <p class="panel-tabs">
                  <a href="breaking.php">Breaking News</a>
                  &nbsp;&nbsp;
                  <a href="negative.php">Negative Feedback</a>
                  &nbsp;&nbsp;
                  <a href="winsets.php">Wrong Insets</a>
                  &nbsp;&nbsp;
                  <a class="is-active">Unplayed Insets</a>
                </p>
              </div>
            </div>
          </div>

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <a href="adduinsets.php" class="button is-info " type="button" name="button" id="addbtn">Add Unplayed Insets</a>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="genuinsets.php" class="button is-white" type="button" name="button" id="addbtn">
                    <i class="fas fa-print"></i>&nbsp; Generate Report
                  </a>
                </p>
              </div>
            </div>
          </div>

          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                <thead>
                  <tr>
                    <th class="is-size-6 is-size-7-mobile">Date</th>
                    <th class="is-size-6 is-size-7-mobile">Branch</th>
                    <th class="is-size-6 is-size-7-mobile">Description</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['branch']; ?></td>
                    <td class="is-size-6 is-size-7-mobile" style="width:30%"><?php echo $row['comment']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">
                      <a class="button is-size-7 is-info m-1" title="view unplayed insets"  href="viewuinsets.php?insets_id=<?php echo $row['insets_id']; ?>">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a class="button is-size-7 is-info m-1" title="update unplayed insets"  href="edituinsets.php?insets_id=<?php echo $row['insets_id']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete unplayed insets"  href="uinsets.php?insets_id=<?php echo $row['insets_id']; ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
            </div>
          </div>

          <div class="column is-full">
            <nav class="pagination is-small" role="navigation" aria-label="pagination">
              <ul class="pagination-list">
              <?php
                $pr_query = "SELECT * FROM insets
                            WHERE insets_type = 'Unplayed Insets'
                            ORDER BY date DESC, branch";
                $pr_result = mysqli_query($dbcon, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_pages = ceil($total_record/$no_of_pages);

                if($page>1){
                  echo "<a class='pagination-previous has-background-white' href='uinsets.php?page=".($page-1)."'> Previous</a>";
                }

                for($i=1;$i<$total_pages;$i++){
                  echo "<a class='pagination-link has-background-white' href='uinsets.php?page=".$i."'>$i</a>";
                }

                if($i>$page){
                  echo "<a class='pagination-next has-background-white' href=uinsets.php?page=".($page+1)."'>Next Page</a>";
                }
              ?>
            </ul>
            </nav>
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
