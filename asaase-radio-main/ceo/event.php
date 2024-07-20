<?php
session_start();
include('../connection.php');
include('includes/auth.php');
include('assets/delete.php');

  $query = "SELECT * FROM `event`
            INNER JOIN `employee` ON employee.employee_id = event.employee_id
            ORDER BY createdate DESC";
  $result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Events </title>
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
            <li class="is-active"><a href="#" aria-current="page">Events</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
          <div class="column is-full">
            <div class="columns is-align-items-center py-1">
              <div class="column is-two-thirds">
                <h1 class="title is-size-5">Events</h1>
              </div>
              <div class="column">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search" id="search">
                    <span class="icon is-small is-left">
                      <i class="fas fa-search"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="column is-full">
            <div class="columns">
              <div class="column is-half">
                <a href="addevent.php" class="button is-info " type="button" name="button" id="addbtn">Add Event</a>
              </div>
              <div class="column is-half">
                <p class="has-text-right">

                </p>
              </div>
            </div>
          </div> -->



          <div class="column is-full is-align-items-center">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-narrow is-hoverable" id="table">
                <thead>
                  <tr >
                  
                    <th class="is-size-6 is-size-7-mobile">Employee</th>
                    <th class="is-size-6 is-size-7-mobile">Event Name</th>
                    <th class="is-size-6 is-size-7-mobile">Event Date</th>
                    <th class="is-size-6 is-size-7-mobile">Budget</th>
                    <th class="is-size-6 is-size-7-mobile">Crew Members </th>
                    <th class="is-size-6 is-size-7-mobile">Programs Approval </th>
                    <th class="is-size-6 is-size-7-mobile">Finance Approval </th>
   
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <?php
                      while($row = mysqli_fetch_array ($result)){
                        if ($row['status'] === 'Granted') {
                          $style = "has-background-success has-text-light";
                        }
                        elseif ($row['status'] === 'Pending') {
                          $style = "has-background-warning";
                        }
                        elseif ($row['status'] === 'Rejected') {
                          $style = "has-background-danger has-text-light";
                        }
                       
                    ?>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['firstname'] . ' '. $row['lastname']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['name']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><?php echo $row['date']; ?></td>
                   <td class="is-size-6 is-size-7-mobile"><?php echo $row['budget']; ?></td>
                    <td class="is-size-6 is-size-7-mobile"><a href="<?php echo $row['activity_brief']; ?>"><?php echo $row['activity_brief']; ?></a></td>
                    <td class="is-size-6 is-size-7-mobile has-text-centered" ><div class="<?php echo $style; ?> p-2 " ><?php echo $row['status']; ?></td>
                    
                 
                    
                  </tr>
                </tbody>
                <?php } ?>
              </table>
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
