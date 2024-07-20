<?php
session_start();
include('../connection.php');
include('includes/auth.php');
if(isset($_GET['vacancy_id'])){
    $vacancy_id = $_GET['vacancy_id'];
  }

  $query = "SELECT * FROM vacancy
            WHERE vacancy_id = '$vacancy_id'";
  $result = mysqli_query($dbcon, $query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Vacancy </title>
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
            <li><a href="vacancy.php">Vacancy</a></li>
            <li class="is-active"><a href="#" aria-current="page">View Vacancy</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <p class="has-text-left">
                  <a href="editvacancy.php?vacancy_id=<?php echo $row['vacancy_id']; ?>" class="button is-info " type="button" name="button" id="addbtn">Edit Vacancy</a>
                </p>
              </div>
              <div class="column is-half">
                <!-- <p class="has-text-right">
                  <a href="" class="button is-white" type="button" name="button" id="print">
                    <i class="fas fa-print"></i>&nbsp; Print Report
                  </a>
                </p> -->
              </div>
            </div>
          </div>
          <div class="column is-full" id="report">
            <div class="columns is-multiline">
              <div class="column is-full">
                <h2 class="title is-size-2 has-text-centered">VACANCY INFORMATION</h2>
              </div>

              <div class="column is-full">
                <h2 class="title is-size-4 has-text-left">VACANCY TITLE</h2>
                <h2 class="content subtitle  is-size-6 has-text-left"> <?php echo $row['vacancy_title']; ?> </h2>
              </div>

              <div class="column is-full">
                <h2 class="title is-size-4 has-text-left">VACANCY DESCRIPTION</h2>
                <div class="content subtitle  is-size-6 has-text-left vac"> <?php echo $row['vacancy_desc']; ?> </div>
              </div>

              <div class="column is-full">
                <h2 class="title is-size-4 has-text-left">VACANCY RESPONSIBILITIES / DUTIES</h2>
                <div class="content subtitle  is-size-6 has-text-left vac"> <?php echo $row['vacancy_resp']; ?> </div>
              </div>

              <div class="column is-full">
                <h2 class="title is-size-4 has-text-left">VACANCY QUALIFICATION / SKILLS</h2>
                <div class="content subtitle  is-size-6 has-text-left vac"> <?php echo $row['vacancy_qual']; ?> </div>
              </div>

              <div class="column is-full">
                <h2 class="title is-size-4 has-text-left">VACANCY END DATE</h2>
                <div class="content subtitle  is-size-6 has-text-left vac"> <?php echo $row['vacancy_end_date']; ?> </div>
              </div>

              <div class="column is-full">
                
              </div>

              <div class="column is-full">
                <h2 class="title is-size-4 has-text-left">APPLICANTS</h2>
                <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                <thead>
                  <tr >
                    <th class="is-size-6 is-size-7-mobile">CV</th>
                    <th class="is-size-6 is-size-7-mobile">Applicant Name</th>
                    <th class="is-size-6 is-size-7-mobile">Email</th>
                    <th class="is-size-6 is-size-7-mobile">Phone Number</th>
                    <th class="is-size-6 is-size-7-mobile has-text-right pr-4">Applied Date</th>
                    <th class="is-size-6 is-size-7-mobile has-text-right pr-4">Actions</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                        $query = "SELECT * FROM applicant
                                  WHERE vacancy_id = '$vacancy_id'";
                        $result = mysqli_query($dbcon, $query);
                      while($data = mysqli_fetch_array ($result)){
                    ?> 
                  <tr >
                    <td class="is-size-6 is-size-7-mobile pt-4"> 
                      <a href="../applicants/<?php echo $data['cv_name']; ?>" class="button is-size-7 is-success m-1" download>
                        <i class="fas fa-download"></i>
                      </a> 
                    </td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $data['fullname']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $data['email']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4"><?php echo $data['phone']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4 has-text-right pr-4"><?php echo $data['applied_date']; ?></td>
                    <td class="is-size-6 is-size-7-mobile pt-4 has-text-right pr-4">
                      <a class="button is-size-7 is-info m-1" title="send mail"  href="mailapplicant.php?applicant_id=<?php echo $row['applicant_id']; ?>">
                        <i class="fas fa-envelope"></i>
                      </a>
                    </td>
                  </tr>
                    <?php } ?>
                </tbody> 

              </table>
              </div>

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
