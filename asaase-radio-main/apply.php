<?php
session_start();
include('connection.php');
include('includes/applyjob.php');

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
    <title>Asaase Radio || Apply </title>
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
                        <li ><a href="viewvacancy.php?vacancy_id=<?php echo $row['vacancy_id']; ?>"><?php echo $row['vacancy_title']; ?></a></li>
                        <li class="is-active"><a href="#" aria-current="page">Apply for <?php echo $row['vacancy_title']; ?></a></li>
                    </ul>
                </nav>
                <div class="column is-full">
                    <div class="card mt-2 p-1">
                        <form class="card-content" action="apply.php?vacancy_id=<?php echo $vacancy_id; ?>" method="post" enctype="multipart/form-data">
                            <p class="subtitle has-text-left is-size-3"> <strong>Job Title: </strong>  <?php echo $row['vacancy_title']; ?></p>
                            <div class="content">
                                <div class="field">
                                    <label class="label">Full Name <span class="has-text-danger">*</span></label>
                                    <div class="control">
                                    <input  name="apply_vacancy_id" type="text" value="<?php echo $row['vacancy_id']; ?>" hidden>
                                    <input class="input" name="fullname" type="text" placeholder="Enter your full name" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Email<span class="has-text-danger">*</span></label>
                                    <div class="control">
                                    <input class="input" name="email" type="email" placeholder="Enter your email" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Phone Number<span class="has-text-danger">*</span></label>
                                    <div class="control">
                                    <input class="input" name="phone" type="tel" placeholder="Enter your phone number" required>
                                    </div>
                                </div>
                                <label class="label">Upload CV<span class="has-text-danger">*</span></label>
                                <div class="field is-grouped my-5">
                                    <div id="file-js-example" class="file has-name mr-2">
                                        <label class="file-label">
                                            <input class="file-input" type="file" accept="application/pdf" name="cv_name" required>
                                            <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                Choose a file…
                                            </span>
                                            </span>
                                            <span class="file-name">
                                            No file uploaded
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="field is-grouped my-5">
                                    <p class="control is-expanded is-size-6">

                                    </p>
                                    <p class="control">
                                    <button class="button is-info" name="apply">
                                        &nbsp; Submit &nbsp;
                                    </button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
  </body>
</html>
<script>
  const fileInput = document.querySelector('#file-js-example input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-example .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>