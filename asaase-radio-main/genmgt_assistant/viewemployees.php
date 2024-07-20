<?php
session_start();
include('../connection.php');
include('includes/auth.php');
if(isset($_GET['employee_id'])){
    $employee_id = $_GET['employee_id'];
  }

  $query = "SELECT * FROM employee
            WHERE employee_id = '$employee_id'";
  $result = mysqli_query($dbcon, $query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || General Manager || Employees </title>
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
            <li><a href="employees.php">Employees</a></li>
            <li class="is-active"><a href="#" aria-current="page">View Employees</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">

          <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <p class="has-text-left">
                </p>
              </div>
              <div class="column is-half">
                <p class="has-text-right">
                  <a href="" class="button is-white" type="button" name="button" id="print">
                    <i class="fas fa-print"></i>&nbsp; Print Report
                  </a>
                </p>
              </div>
            </div>
          </div>
          <div class="column is-full" id="report">
            <div class="columns is-multiline">
              <div class="column is-full">
                <p class="has-text-centered"><img src="../images/banner.png" alt="banner logo" width="300" height="120"><p>
                <h2 class="title is-size-4 has-text-centered">EMPLOYEE PROFILE FORM</h2>
              </div>

              <div class="column is-full">
                <div class="" >
                  <table class="table is-fullwidth  is-bordered">
                    <thead>
                      <tr>
                        <th colspan="3" class="has-text-centered">EMPLOYEE INFORMATION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $imagequery = "SELECT * FROM employee_image WHERE employee_id = '$employee_id'";
                        $imageresult = mysqli_query($dbcon, $imagequery);
                        if (mysqli_num_rows($imageresult) > 0 ) {
                          $imagedata = mysqli_fetch_array($imageresult);
                          $emp_pic = $imagedata['imagename'];
                          echo '<tr>
                                  <td colspan="3">
                                    <figure>
                                      <img src="../hr/employee_images/'.$emp_pic.'" style="width:132px; height:170px;" alt="Employee Picture">
                                    </figure>
                                  </td>
                                </tr>';
                        }
                       ?>
                      <tr>
                        <td colspan="3">

                        </td>
                      </tr>
                      <tr>
                        <td colspan="3"><strong>Name: </strong> <br> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="3"><strong>Preferred Name: </strong> <br> <?php echo $row['pref_name']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="3"><strong>Previous Name: </strong> <br> <?php echo $row['pref_name']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td ><strong>Personal Email Address: </strong><br> <?php echo $row['email']?? ''; ?></td>
                        <td ><strong>Date of Birth: </strong><br> <?php echo $row['dob']?? ''; ?></td>
                        <td ><strong>Phone Number: </strong><br> <?php echo $row['phone']?? ''; ?></td>
                      </tr>
                      <?php
                        $addressquery = "SELECT * FROM employee_address WHERE employee_id = '$employee_id'";
                        $addressresult = mysqli_query($dbcon, $addressquery);
                        $addressdata = mysqli_fetch_array($addressresult);
                      ?>
                      <tr>
                        <td colspan="3"><strong>Current Address: </strong><br>  <?php echo $addressdata['current_address']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td><strong>City: </strong><br> <?php echo $addressdata['city']?? ''; ?></td>
                        <td><strong>District: </strong><br> <?php echo $addressdata['district']?? ''; ?></td>
                        <td><strong>Region: </strong><br> <?php echo $addressdata['region']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="3"><strong>Digital Address: </strong><br> <?php echo $addressdata['digital_address']?? ''; ?></td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th colspan="3" class="has-text-centered">SOCIAL MEDIA USERNAMES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $socialquery = "SELECT * FROM employee_social WHERE employee_id = '$employee_id'";
                      $socialresult = mysqli_query($dbcon, $socialquery);
                      $socialdata = mysqli_fetch_array($socialresult);
                      ?>
                      <tr>
                        <td><strong>Usernames: </strong></td>
                        <td><strong>Twitter: </strong><br> <?php echo $socialdata['twitter']?? ''; ?></td>
                        <td><strong>Facebook: </strong><br> <?php echo $socialdata['facebook']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Instagram: </strong><br> <?php echo $socialdata['instagram']?? ''; ?></td>
                        <td><strong>Tik Tok: </strong><br> <?php echo $socialdata['tiktok']?? ''; ?></td>
                        <td><strong>Snapchat: </strong><br> <?php echo $socialdata['snapchat']?? ''; ?></td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th colspan="3" class="has-text-centered">PREVIOUS EMPLOYMENT INFORMATION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $prevquery = "SELECT * FROM employee_prev WHERE employee_id = '$employee_id'";
                        $prevresult = mysqli_query($dbcon, $prevquery);
                        $prevdata = mysqli_fetch_array($prevresult);
                      ?>
                      <tr>
                        <td colspan="3"><strong>Employer: </strong><br> <?php echo $prevdata['employer']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>Employer Address: </strong><br> <?php echo $prevdata['address']?? ''; ?></td>
                        <td ><strong>How long?: </strong><br> <?php echo $prevdata['period']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Phone Number: </strong><br> <?php echo $prevdata['phone']?? ''; ?></td>
                        <td><strong>Email: </strong><br> <?php echo $prevdata['email']?? ''; ?></td>
                        <td><strong>Website: </strong><br> <?php echo $prevdata['website']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Position: </strong><br> <?php echo $prevdata['position']?? ''; ?></td>
                        <td><strong>Hourly Salary: </strong><br> <?php echo $prevdata['hourly_salary']?? ''; ?></td>
                        <td><strong>Annual income: </strong><br> <?php echo $prevdata['annual_income']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>State: </strong><br> <?php echo $prevdata['state']?? ''; ?></td>
                        <td ><strong>Digital Address: </strong><br> <?php echo $prevdata['digital_address']?? ''; ?></td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th colspan="3" class="has-text-centered">RELATIVE INFORMATION/ EMERGENCY CONTACTS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $relativequery = "SELECT * FROM employee_relative WHERE employee_id = '$employee_id'";
                        $relativeresult = mysqli_query($dbcon, $relativequery);
                        $relativedata = mysqli_fetch_array($relativeresult);
                      ?>
                      <tr>
                        <td colspan="3"><strong>Name of relative not residing with you: </strong><br> <?php echo $relativedata['relative_name']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>Address: </strong><br> <?php echo $relativedata['address']?? ''; ?></td>
                        <td ><strong>Phone Number: </strong><br> <?php echo $relativedata['phone']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td><strong>City: </strong><br> <?php echo $relativedata['city']?? ''; ?></td>
                        <td><strong>Region: </strong><br> <?php echo $relativedata['region']?? ''; ?></td>
                        <td><strong>Digital Address: </strong><br> <?php echo $relativedata['digital_address']?? ''; ?></td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th colspan="3" class="has-text-centered">MEDICAL INFORMATION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="3"><strong>Allergies: </strong><br></td>
                      </tr>
                    <?php
                      $allergyquery = "SELECT * FROM employee_allergies WHERE employee_id = '$employee_id'";
                      $allergyresult = mysqli_query($dbcon, $allergyquery);
                      if (mysqli_num_rows($allergyresult) > 0) {
                        while ($allergydata = mysqli_fetch_array($allergyresult)) {
                    ?>
                      <tr>
                        <td colspan="3"><?php echo $allergydata['allergies']?? ''; ?></td>
                      </tr>
                    <?php }} ?>
                    <tr>
                      <td colspan="3">I authorise ABC Radio Limited to verify the information provided on this form as to my employment history.</td>
                    </tr>
                    <tr>
                      <td colspan="2"><strong>Signature of applicant </strong><br> <br></td>
                      <td><strong>Date </strong><br> <br> </td>
                    </tr>
                    <tr>
                      <td colspan="2"><strong>Signature of witness </strong><br> <br></td>
                      <td><strong>Date </strong><br> <br> </td>
                    </tr>
                    </tbody>

                  </table>
                  <br> <br>
                  <table class="table is-fullwidth  is-bordered">
                    <thead>
                      <tr>
                        <th colspan="3" class="has-text-centered">BANK DETAILS</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $bankquery = "SELECT * FROM employee_bank WHERE employee_id = '$employee_id'";
                      $bankresult = mysqli_query($dbcon, $bankquery);
                      $bankdata = mysqli_fetch_array($bankresult);
                    ?>
                      <tr>
                        <td colspan="2"><strong>Bank: </strong><br> <?php echo $bankdata['bank']?? ''; ?></td>
                        <td ><strong>Bank Branch: </strong><br> <?php echo $bankdata['bank_branch']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>Account Name: </strong><br> <?php echo $bankdata['account_name']?? ''; ?></td>
                        <td colspan=""><strong>Account Number: </strong><br> <?php echo $bankdata['account_number']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>SSNIT: </strong><br> <?php echo $bankdata['ssnit']?? ''; ?></td>
                        <td colspan=""><strong>TIN: </strong><br> <?php echo $bankdata['tin']?? ''; ?></td>
                      </tr>
                    </tbody>
                  </table>

                  <br> <br>
                  <table class="table is-fullwidth">
                    <thead>
                      <tr>
                        <th colspan="3" class="has-text-centered">OFFICIAL USE ONLY</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $salquery = "SELECT * FROM employee_salary WHERE employee_id = '$employee_id'";
                      $salresult = mysqli_query($dbcon, $salquery);
                      $saldata = mysqli_fetch_array($salresult);
                    ?>
                      <tr>
                        <td colspan="3"><strong>Name: </strong> <br> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="is-size-6 ">
                          <strong>Status: </strong> <br>
                          &nbsp; &nbsp;
                          <span class="mr-4">
                            <?php if ($saldata['employee_status']?? '' === 'Full time'){ echo '<i class="fa fa-check-square"></i>';}  else{ echo '<i class="far fa-square"></i>';} ?>
                          </span>
                          <strong>Full time &nbsp;&nbsp;</strong> <br>
                          &nbsp; &nbsp;
                          <span class="mr-4">
                            <?php if ($saldata['employee_status']?? '' === 'Part time'){ echo '<i class="fa fa-check-square"></i>';}  else{ echo '<i class="far fa-square"></i>';} ?>
                          </span>
                          <strong>Part time &nbsp;&nbsp;</strong> <br>
                          &nbsp; &nbsp;
                          <span class="mr-4">
                            <?php if ($saldata['employee_status']?? '' === 'Casual'){ echo '<i class="fa fa-check-square"></i>';}  else{ echo '<i class="far fa-square"></i>';} ?>
                          </span>
                          <strong>Casual &nbsp;&nbsp;</strong> <br>
                        </td>
                        <td class="is-size-6 ">
                          <strong>Pay rate: </strong> <br>
                          &nbsp; &nbsp;<strong>Annual: </strong> &nbsp; <u><?php echo $saldata['annual_pay'] ?? ''; ?></u>  <br>
                          &nbsp; &nbsp;<strong>Monthly: </strong> &nbsp; <u><?php echo $saldata['monthly_pay'] ?? ''; ?></u>  <br>
                          &nbsp; &nbsp;<strong>Hourly rate: </strong> &nbsp; <u><?php echo $saldata['hourly_pay'] ?? ''; ?></u>   <br>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" ><strong>Position: </strong> <?php echo $row['position']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><strong>Department: </strong> <?php echo $row['department']?? ''; ?></td>
                      </tr>
                      <tr>
                        <td colspan="3"><strong>Date of first pay rewiew: </strong>&nbsp; &nbsp; <u><?php echo $saldata['first_pay_date']?? ''; ?></u> </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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

$(document).ready(function(){
    var report = document.getElementById('report').innerHTML;
    var mainbody = document.body.innerHTML;
    var css = '<link rel="stylesheet" href="../css/bulma.min.css">';
    $("#print").click(function(){
      document.body.innerHTML = "<html><head><title></title>" + css + "</head><body>" + report + "</body>";
      window.print();
      document.body.innerHTML = mainbody;
    });
});
</script>
