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
              WHERE department = '$sessdepartment'
              AND archive_emp = 'No'
              ORDER BY firstname ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-5 has-text-centered pb-3">Report on Employees</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Name</th>
                    <th class="is-size-6">Branch</th>
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
                <td class="is-size-6">'.$row['branch'].'</td>
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
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
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
//Report on week collection
  if(isset($_POST['genwcol'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($_POST['branch'] === "All") {
      $query = "SELECT * FROM week_collection
                  WHERE date LIKE '%$date%'
                  AND archive_wcol = 'No'
                  ORDER BY date ASC";
    }
    elseif ($_POST['branch'] != "All") {
      $query = "SELECT * FROM week_collection
                  WHERE date LIKE '%$date%'
                  AND branch = '$branch'
                  AND archive_wcol = 'No'
                  ORDER BY date ASC";
    }
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Weekly Collection</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Weekly Collection</th>
                    <th class="is-size-6">Annual Budget Collection</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['col_week_amt'].'</td>
                    <td class="is-size-6">'.$row['col_budget_amt'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($_POST['branch'] === "All") {
              $sumquery = "SELECT SUM(col_week_amt) AS col_week_amt,
                           SUM(col_budget_amt) AS col_budget_amt
                           FROM week_collection WHERE date LIKE '%$date%'
                           AND archive_wcol = 'No'";
            }
            elseif ($_POST['branch'] != "All") {
              $sumquery = "SELECT SUM(col_week_amt) AS col_week_amt,
                           SUM(col_budget_amt) AS col_budget_amt
                           FROM week_collection WHERE date LIKE '%$date%'AND branch = '$branch'
                           AND archive_wcol = 'No'";
            }

            $sumresult = mysqli_query($dbcon, $sumquery);
            $sumrow = mysqli_fetch_array($sumresult);
            echo '<tr>
                    <td class="is-size-6"></td>
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['col_week_amt'].'</td>
                    <td class="is-size-6">'.$sumrow['col_budget_amt'].'</td></tr>';
            echo '</tfoot></table></div></div>';
    }
  }
?>

<?php
//Report on year to date collection
  if(isset($_POST['genycol'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($_POST['branch'] === "All") {
      $query = "SELECT * FROM year_collection
                  WHERE date LIKE '%$date%'
                  AND archive_ycol = 'No'
                  ORDER BY date ASC";
    }
    elseif ($_POST['branch'] != "All") {
      $query = "SELECT * FROM year_collection
                  WHERE date LIKE '%$date%'
                  AND branch = '$branch'
                  AND archive_ycol = 'No'
                  ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Year to Date Collection</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Weekly Collection</th>
                    <th class="is-size-6">Annual Budget Collection</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['year_col_budget'].'</td>
                    <td class="is-size-6">'.$row['year_col_annual'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($_POST['branch'] === "All") {
              $sumquery = "SELECT SUM(year_col_budget) AS year_col_budget,
                           SUM(year_col_annual) AS year_col_annual
                           FROM year_collection WHERE date LIKE '%$date%'
                           AND archive_ycol = 'No'";
            }
            elseif ($_POST['branch'] != "All") {
              $sumquery = "SELECT SUM(year_col_budget) AS year_col_budget,
                           SUM(year_col_annual) AS year_col_annual
                           FROM year_collection WHERE date LIKE '%$date%'AND branch = '$branch'
                           AND archive_ycol = 'No'";
            }

            $sumresult = mysqli_query($dbcon, $sumquery);
            $sumrow = mysqli_fetch_array($sumresult);
            echo '<tr>
                    <td class="is-size-6"></td>
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['year_col_budget'].'</td>
                    <td class="is-size-6">'.$sumrow['year_col_annual'].'</td></tr>';
            echo '</tfoot></table></div></div>';
    }
  }
?>

<?php
//Report on recievables
  if(isset($_POST['genrec'])){
    $branch = $_POST['branch'];;
    $date = $_POST['date'];
    $type = 'Recievable';
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($_POST['branch'] === "All") {
      $query = "SELECT * FROM pay_rec
                  WHERE date LIKE '%$date%'
                  AND type = '$type'
                  AND archive_payrec = 'No'
                  ORDER BY date ASC";
    }
    elseif ($_POST['branch'] != "All") {
      $query = "SELECT * FROM pay_rec
                  WHERE date LIKE '%$date%'
                  AND branch = '$branch' AND type = '$type'
                  AND archive_payrec = 'No'
                  ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Recievables</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6 is-size-7-mobile">Description</th>
                    <th class="is-size-6 is-size-7-mobile">Recievable Type</th>
                    <th class="is-size-6 is-size-7-mobile">Amount</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['desciption'].'</td>
                    <td class="is-size-6">'.$row['payrectype'].'</td>
                    <td class="is-size-6">'.$row['amount'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($_POST['branch'] === "All") {
              $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                          WHERE date LIKE '%$date%'
                          AND archive_payrec = 'No'
                          AND type = '$type'";
            }
            elseif ($_POST['branch'] != "All") {
              $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                          WHERE date LIKE '%$date%'AND branch = '$branch'
                          AND archive_payrec = 'No'
                          AND type = '$type'";
            }

            $sumresult = mysqli_query($dbcon, $sumquery);
            $sumrow = mysqli_fetch_array($sumresult);
            echo '<tr>
                    <td class="is-size-6"></td>
                    <td class="is-size-6"></td>
                    <td class="is-size-6"></td>
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['amount'].'</td></tr>';
            echo '</tfoot></table></div></div>';
    }
  }
?>

<?php
//Report on payables
  if(isset($_POST['genpay'])){
    $branch = $_POST['branch'];;
    $date = $_POST['date'];
    $type = 'Payable';
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($_POST['branch'] === "All") {
      $query = "SELECT * FROM pay_rec
                  WHERE date LIKE '%$date%'
                  AND type = '$type'
                  AND archive_payrec = 'No'
                  ORDER BY date ASC";
    }
    elseif ($_POST['branch'] != "All") {
      $query = "SELECT * FROM pay_rec
                  WHERE date LIKE '%$date%'
                  AND branch = '$branch' AND type = '$type'
                  AND archive_payrec = 'No'
                  ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Payables</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6 is-size-7-mobile">Description</th>
                    <th class="is-size-6 is-size-7-mobile">Payable Type</th>
                    <th class="is-size-6 is-size-7-mobile">Amount</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['desciption'].'</td>
                    <td class="is-size-6">'.$row['payrectype'].'</td>
                    <td class="is-size-6">'.$row['amount'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($_POST['branch'] === "All") {
              $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                          WHERE date LIKE '%$date%'
                          AND archive_payrec = 'No'
                          AND type = '$type'";
            }
            elseif ($_POST['branch'] != "All") {
              $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                          WHERE date LIKE '%$date%'AND branch = '$branch'
                          AND archive_payrec = 'No'
                          AND type = '$type'";
            }

            $sumresult = mysqli_query($dbcon, $sumquery);
            $sumrow = mysqli_fetch_array($sumresult);
            echo '<tr>
                    <td class="is-size-6"></td>
                    <td class="is-size-6"></td>
                    <td class="is-size-6"></td>
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['amount'].'</td></tr>';
            echo '</tfoot></table></div></div>';
    }
  }
?>
