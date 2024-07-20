<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/update.php');
include('assets/delete.php');
if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }
  $no_of_pages = 10;
  $show_fisrt = ($page-1)*10;

  $query = "SELECT job.* FROM job LIMIT $show_fisrt,$no_of_pages";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Admin Job Description </title>
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
            <li class="is-active"><a href="#" aria-current="page">Job Description</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Job Descriptions</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search Job" id="search">
                    <span class="icon is-small is-left">
                      <i class="fas fa-search"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="column is-full">
            <a href="addjob.php" class="button is-info " type="button" name="button" id="addbtn">Add Job Description</a>
          </div>

          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                <thead>
                  <tr>
                    <th class="is-size-6 is-size-7-mobile">Job Description</th>
                    <th class="is-size-6 is-size-7-mobile">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      while($row = mysqli_fetch_array ($result)){
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['job_description']; ?></td>
                    <td class="is-size-6 is-size-7-mobile">

                      <a class="button is-size-7 is-info m-1" title="update job description"  href="editjob.php?job_description=<?php echo $row['job_description']; ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="button is-size-7 is-danger m-1" title="delete job description"  href="job.php?job_description=<?php echo $row['job_description']; ?>">
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
                $pr_query = "SELECT job.* FROM job";
                $pr_result = mysqli_query($dbcon, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_pages = ceil($total_record/$no_of_pages);

                if($page>1){
                  echo "<a class='pagination-previous has-background-white' href='job.php?page=".($page-1)."'> Previous</a>";
                }

                for($i=1;$i<$total_pages;$i++){
                  echo "<a class='pagination-link has-background-white' href='job.php?page=".$i."'>$i</a>";
                }

                if($i>$page){
                  echo "<a class='pagination-next has-background-white' href='job.php?page=".($page+1)."'>Next Page</a>";
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
