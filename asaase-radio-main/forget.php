<?php
session_start();
include('connection.php');
include('includes/forget.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Forgot Password </title>
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
  <body class="index-body">
    <div class="container is-flex is-justify-content-center">
      <div class="section ">
        <div class="columns mt-5 has-brown-down-borderline">
          <div class="column has-background-white is-12 py-3 mt-6">
            <div class="p-3">
              <figure class="image is-64x64" id="loginimage">
                <img class="is-rounded" src="images/logo.jpg">
              </figure>
            </div>
            <h2 class="title is-size-4 px-3 has-text-brown">Reset Account</h2>
            <form class="px-3" action="forget.php" method="post">
              <div class="field my-5">
                <label class="lable">Email</label>
                <p class="control has-icons-left has-icons-right">
                  <input class="input" type="email" name="email" placeholder="Email" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <label class="label">Phone Number <span class="has-text-danger">*</span></label>
                <div class="control">
                  <p class="control has-icons-left has-icons-right">
                    <input class="input" name="phone" type="tel" pattern="[0-9]{10}" placeholder="Phone Number" required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-phone"></i>
                    </span>
                  </p>
                </div>
              </div>
              <div class="field is-grouped my-1">
                <p class="control is-expanded is-size-6">
                  <a href="index.php" class="is-size-7" id="forget">Remember password...?</a>
                </p>
              </div>
              <div class="field is-grouped my-5">
                <p class="control is-expanded is-size-6">
                </p>
                <p class="control">
                  <button class="button has-background-brown has-text-white" name="forget">
                    Reset Account
                  </button>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
