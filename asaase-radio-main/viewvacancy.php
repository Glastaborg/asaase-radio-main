<?php
session_start();
include('connection.php');

if(isset($_GET['vacancy_id'])){
    $vacancy_id = $_GET['vacancy_id'];
  }

$query = "SELECT * FROM vacancy WHERE vacancy_id = '$vacancy_id'";
$result = mysqli_query($dbcon, $query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || View Vacancy </title>
    <!-- CSS Links-->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="icon" href="images/logo.jpg">
    <!-- Js Scripts-->
    <script defer src="js/all.js" charset="utf-8"></script>
    <script src="js/jquery.min.js" charset="utf-8"></script>
    <script src="js/myjs.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
  </head>
  <body class="has-background-light ">
    <div class="container has-background-light ">
        <div class="section has-background-light ">
            <div class="columns is-multiline has-background-light ">
                <div class="column has-background-light is-12 py-3">
                    <div class="p-3">
                        <figure class="image is-128x128" id="loginimage">
                            <img class="is-rounded" src="images/logo.jpg">
                        </figure>
                    </div>
                    <br>    
                    <h2 class="title is-size-1 px-3 has-text-centered has-text-brown">Asaase Radio Job Vacancies</h2>
                </div>
                
                <?php
                    while($row = mysqli_fetch_array ($result)){
                ?>
                <nav class="breadcrumb p-3" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="vacancy.php"><i class="fas fa-home"></i> &nbsp; Vacancies</a></li>
                        <li class="is-active"><a href=""><?php echo $row['vacancy_title']; ?></a></li>
                        <!-- <li class="is-active"><a href="#" aria-current="page">View Vacancy</a></li> -->
                    </ul>
                </nav>
                <div class="column is-full">
                    <div class="card mt-2 p-1">
                        <div class="card-content">
                            <p class="subtitle has-text-left is-size-3"> <strong>Job Title: </strong>  <?php echo $row['vacancy_title']; ?></p>
                            <p class="subtitle has-text-dark is-size-6"><strong>Vacancy Deadline: </strong><?php echo $row['vacancy_end_date']; ?></p>
                            <div class="content">
                                <p class="title has-text-dark is-size-4">Job Description</p>
                                <?php echo $row['vacancy_desc']; ?>
                            </div>
                            <div class="content">
                                <p class="title has-text-dark is-size-4">Job Responsibilities / Duties</p>
                                <?php echo $row['vacancy_resp']; ?>
                            </div>
                            <div class="content">
                                <p class="title has-text-dark is-size-4">Job Qualification / Skills</p>
                                <?php echo $row['vacancy_qual']; ?>
                            </div>
                            <br>
                            <div class="content has-text-right">
                                <a href="apply.php?vacancy_id=<?php echo $row['vacancy_id']; ?>" class="button has-background-info has-text-white p-3"> Apply Job </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
  </body>
</html>
