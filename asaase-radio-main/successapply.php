<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Vacancy </title>
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

                <div class="column is-full ">
                    <div class="card mt-2 p-1 ">
                        <div class="card-content has-background-success">
                            <p class="subtitle has-text-left is-size-3"> </p>
                            <p class="subtitle has-text-dark is-size-6"></p>
                            <div class="content  p-2">
                                <p class="title has-text-white has-text-centered" style="font-size:150px;"><i class="far fa-check-circle"></i></p>
                                
                            </div>
                            <br>
                        </div>
                        <div class="card-content p-6">
                            <p class="title  is-size-2 has-text-centered pb-5">Great!</p>
                            <p class="subtitle has-text-dark is-size-5 has-text-centered">Your application was submitted successfully!!!</p>
                            <div class="content has-text-centered">
                                <a href="vacancy.php" class="button p-5 has-background-success has-text-white">View other vacancies</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
  </body>
</html>
