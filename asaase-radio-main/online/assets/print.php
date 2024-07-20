<script>
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

<?php
//Report on employees
  if(isset($_POST['genemp'])){
    $branch = $_POST['branch'];

    $query = "SELECT employee.* FROM employee
              WHERE branch = '$branch' AND department = '$sessdepartment'
              AND archive_emp = 'No'
              ORDER BY firstname ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-5 has-text-centered pb-3">Report on '.$branch.' Employees</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Name</th>
                    <th class="is-size-6">Email</th>
                    <th class="is-size-6">Phone</th>
                    <th class="is-size-6">Job Description</th>
                    <th class="is-size-6">Department</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                <td class="is-size-6">'.$row['firstname'].' '.$row['lastname'].'</td>
                <td class="is-size-6">'.$row['email'].'</td>
                <td class="is-size-6">'.$row['phone'].'</td>
                <td class="is-size-6">'.$row['job_description'].'</td>
                <td class="is-size-6">'.$row['department'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>

<?php
//Report on activities
  if(isset($_POST['genact'])){
    $date = $_POST['date'];
    $branch = $_POST['branch'];
    $activity_status = $_POST['activity_status'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($activity_status === 'All') {
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND branch = '$branch' AND department = '$sessdepartment'
                AND archive_act = 'No'
                ORDER BY activity_date ASC";
    }else{
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND activity_status = '$activity_status'
                AND branch = '$branch' AND department = '$sessdepartment'
                AND archive_act = 'No'
                ORDER BY activity_date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Activities</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Activity Name</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Department</th>
                    <th class="is-size-6">Status</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['activity_date'].'</td>
                    <td class="is-size-6">'.$row['activity_name'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['department'].'</td>
                    <td class="is-size-6">'.$row['activity_status'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>


<?php
//Report on breaking news
  if(isset($_POST['genbreak'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM breaking_news
              WHERE date LIKE '%$date%'
              AND branch = '$branch'
              AND archive_break = 'No'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Breaking News</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Source</th>
                    <th class="is-size-6">Description</th>
                    <th class="is-size-6">Number of Times</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['type'].'</td>
                    <td class="is-size-6">'.$row['comment'].'</td>
                    <td class="is-size-6">'.$row['amt'].'</td></tr>';
              }
              echo '</tbody><tfoot>';
              //sum total
              $sumquery = "SELECT SUM(amt) AS amt FROM breaking_news
                          WHERE date LIKE '%$date%'AND branch = '$branch'
                          AND archive_break = 'No'";
              $sumresult = mysqli_query($dbcon, $sumquery);
              $sumrow = mysqli_fetch_array($sumresult);
              echo '<tr>
                      <td class="is-size-6"></td>
                      <td class="is-size-6"></td>
                      <td class="is-size-6"></td>
                      <td class="is-size-6 title">Total</td>
                      <td class="is-size-6">'.$sumrow['amt'].'</td></tr>';
              echo '</tfoot></table></div></div>';
    }
  }
?>

<?php
//Report on negative feedbacks
  if(isset($_POST['genneg'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM negative_fed
              WHERE date LIKE '%$date%'
              AND branch = '$branch'
              AND archive_neg = 'No'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Negative Feedback</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Description</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['comment'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>

<?php
//Report on wrong insets
  if(isset($_POST['genwinsets'])){
    $branch = $_POST['branch'];
    $insets_type = 'Wrong Insets';
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM insets
              WHERE date LIKE '%$date%' AND insets_type = '$insets_type'
              AND branch = '$branch'
              AND archive_inset = 'No'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Wrong Insets</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Description</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['comment'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>

<?php
//Report on wrong insets
  if(isset($_POST['genuinsets'])){
    $branch = $_POST['branch'];
    $insets_type = 'Unplayed Insets';
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM insets
              WHERE date LIKE '%$date%' AND insets_type = '$insets_type'
              AND branch = '$branch'
              AND archive_inset = 'No'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Unplayed Insets</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Description</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['comment'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>


<?php
//Report on breaking news
  if(isset($_POST['genprogram'])){
    $branch = $_POST['branch'];
    $date = $_POST['program_date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT programs.*, firstname, lastname FROM programs
              INNER JOIN employee ON employee.employee_id = programs.producer
              WHERE program_date LIKE '%$date%'
              AND programs.branch = '$branch'
              AND archive_program = 'No'";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Programs</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Program</th>
                    <th class="is-size-6">Host Name</th>
                    <th class="is-size-6">Producer</th>
                    <th class="is-size-6">Branch</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['program_date'].'</td>
                    <td class="is-size-6">'.$row['program'].'</td>
                    <td class="is-size-6">'.$row['hostname'].'</td>
                    <td class="is-size-6">'.$row['firstname'].' '.$row['lastname'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td></tr>';
              }
            echo '</tbody></table></div></div>';
    }
  }
?>
