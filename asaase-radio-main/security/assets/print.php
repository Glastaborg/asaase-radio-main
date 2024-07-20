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
              WHERE branch = '$sessbranch' AND department = '$sessdepartment'
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
    $activity_status = $_POST['activity_status'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($activity_status === 'All') {
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND branch = '$sessbranch' AND department = '$sessdepartment'
                AND archive_act = 'No'
                ORDER BY activity_date ASC";
    }else{
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND activity_status = '$activity_status'
                AND branch = '$sessbranch' AND department = '$sessdepartment'
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
//Report on assets
  if(isset($_POST['genasset'])){
    $branch = $sessbranch;
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM assets
              WHERE date LIKE '%$date%'
              AND branch = '$branch'
              AND archive_asset = 'No'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Assets</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Serial No / Number Plate</th>
                    <th class="is-size-6">Assets</th>
                    <th class="is-size-6">Type</th>
                    <th class="is-size-6">Branch</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['asset_id'].'</td>
                    <td class="is-size-6">'.$row['asset'].'</td>
                    <td class="is-size-6">'.$row['asset_type'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>


<?php
//Report on assets status
  if(isset($_POST['genasstat'])){
    $branch = $sessbranch;
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT *,asset_status.date AS asset_status_date FROM asset_status
              INNER JOIN assets ON assets.asset_id = asset_status.asset_id
              WHERE asset_status.date LIKE '%$date%'
              AND branch = '$branch'
              AND archive_asset_status = 'No'
              ORDER BY asset_status.date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Assets Status</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Serial No / Number Plate</th>
                    <th class="is-size-6">Assets</th>
                    <th class="is-size-6">Description</th>
                    <th class="is-size-6">Status</th>
                    <th class="is-size-6">Branch</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['asset_status_date'].'</td>
                    <td class="is-size-6">'.$row['asset_id'].'</td>
                    <td class="is-size-6">'.$row['asset'].'</td>
                    <td class="is-size-6">'.$row['description'].'</td>
                    <td class="is-size-6">'.$row['status'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>


<?php
//Report on assets employee
  if(isset($_POST['genasemp'])){
    $branch = $sessbranch;
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM asset_employee
              INNER JOIN employee ON employee.employee_id = asset_employee.employee_id
              INNER JOIN assets ON assets.asset_id = asset_employee.asset_id
              WHERE col_date LIKE '%$date%'
              AND assets.branch = '$branch'
              AND archive_asset_employee = 'No'
              ORDER BY col_date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Assets Assigned To Employees</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Assets</th>
                    <th class="is-size-6">Employee</th>
                    <th class="is-size-6">Return Date</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['col_date'].'</td>
                    <td class="is-size-6">'.$row['asset'].'</td>
                    <td class="is-size-6">'.$row['firstname'].' '.$row['lastname'].'</td>
                    <td class="is-size-6">'.$row['return_date'].' - '.$row['return_time'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>

<?php
//Report on facility
  if(isset($_POST['genfac'])){
    $branch = $sessbranch;
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM facility
              WHERE date LIKE '%$date%'
              AND branch = '$branch'
              AND archive_facility = 'No'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Facilities</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Facility</th>
                    <th class="is-size-6">Branch</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['facility'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>

<?php
//Report on facility status
  if(isset($_POST['genfacstat'])){
    $branch = $sessbranch;
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT *, facility_status.date AS fsdate FROM facility_status
              INNER JOIN facility ON facility.facility_id = facility_status.facility_id
              WHERE facility_status.date LIKE '%$date%'
              AND facility.branch = '$branch'
              AND archive_facility_status = 'No'
              ORDER BY facility_status.date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Facilities Status</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Facility</th>
                    <th class="is-size-6">Description</th>
                    <th class="is-size-6">Status</th>
                    <th class="is-size-6">Branch</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['fsdate'].'</td>
                    <td class="is-size-6">'.$row['facility'].'</td>
                    <td class="is-size-6">'.$row['description'].'</td>
                    <td class="is-size-6">'.$row['status'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>
