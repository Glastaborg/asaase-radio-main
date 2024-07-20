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

    if ($branch = "All") {
      $query = "SELECT employee.* FROM employee
                WHERE branch <> 'Admin'
                AND archive_emp = 'No'
                ORDER BY branch ASC, firstname";
    }else{
      $query = "SELECT employee.* FROM employee
                WHERE branch = '$branch' AND branch <> 'Admin'
                AND archive_emp = 'No'
                ORDER BY branch ASC, firstname";
    }
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-5 has-text-centered pb-3">Report on '.$branch.' Employees</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Name</th>
                    <th class="is-size-6">Email</th>
                    <th class="is-size-6">Phone</th>
                    <th class="is-size-6">Branch</th>
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
                <td class="is-size-6">'.$row['branch'].'</td>
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
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $activity_status = $_POST['activity_status'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($branch === 'All' AND $activity_status === 'All') {
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND archive_act = 'No'
                ORDER BY activity_date ASC";
    }elseif ($branch === 'All' AND $activity_status !== 'All'){
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND archive_act = 'No'
                AND activity_status = '$activity_status'
                ORDER BY activity_date ASC";
    }elseif ($branch !== 'All' AND $activity_status === 'All'){
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND archive_act = 'No'
                AND branch = '$branch'
                ORDER BY activity_date ASC";
    }elseif ($branch !== 'All' AND $activity_status !== 'All'){
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND archive_act = 'No'
                AND activity_status = '$activity_status'
                AND branch = '$branch'
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
//Report on weekly sales
  if(isset($_POST['genwsales'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($branch === "All") {
      $query = "SELECT * FROM week_sales
                  WHERE date LIKE '%$date%'
                  AND archive_wsales = 'No'
                  ORDER BY date ASC";
    }elseif($branch !== "All"){
      $query = "SELECT * FROM week_sales
                  WHERE date LIKE '%$date%'
                  AND archive_wsales = 'No'
                  AND branch = '$branch'
                  ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Weekly Sales</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Sales Target</th>
                    <th class="is-size-6">Actual Sales</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['sales_target'].'</td>
                    <td class="is-size-6">'.$row['act_sale_target'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($branch === "All"){
              $sumquery = "SELECT SUM(sales_target) AS sales_target,
                           SUM(act_sale_target) AS act_sale_target
                           FROM week_sales WHERE date LIKE '%$date%'
                           AND archive_wsales = 'No'
                           AND archive_ysales = 'No'
                           ORDER BY branch ASC, date ASC";
            }elseif($branch !== "All"){
              $sumquery = "SELECT SUM(sales_target) AS sales_target,
                           SUM(act_sale_target) AS act_sale_target
                           FROM week_sales WHERE date LIKE '%$date%'AND branch = '$branch'
                           AND archive_wsales = 'No'
                           AND archive_ysales = 'No'
                           ORDER BY branch ASC, date ASC";
            }
            $sumresult = mysqli_query($dbcon, $sumquery);
            $sumrow = mysqli_fetch_array($sumresult);
            echo '<tr>
                    <td class="is-size-6"></td>
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['sales_target'].'</td>
                    <td class="is-size-6">'.$sumrow['act_sale_target'].'</td></tr>';
            echo '</tfoot></table></div></div>';
    }
  }
?>

<?php
//Report on yet to sales
  if(isset($_POST['genysales'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($branch === "All") {
      $query = "SELECT * FROM yet_sales
                WHERE date LIKE '%$date%'
                AND archive_ysales = 'No'
                ORDER BY date ASC";
    } elseif ($branch !== "All") {
      $query = "SELECT * FROM yet_sales
                WHERE date LIKE '%$date%'
                AND archive_ysales = 'No'
                AND branch = '$branch'
                ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Yet to Sales</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class=" py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Branch</th>
                    <th class="is-size-6">Sales Target Yet to Date</th>
                    <th class="is-size-6">Sales to Date</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['sales_target_yet'].'</td>
                    <td class="is-size-6">'.$row['sales_to_date'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($branch === "All") {
              $sumquery = "SELECT SUM(sales_target_yet) AS sales_target_yet,
                           SUM(sales_to_date) AS sales_to_date
                           FROM yet_sales WHERE date LIKE '%$date%'
                           AND archive_ysales = 'No'
                           AND archive_wcol = 'No'
                           AND archive_wcol = 'No'
                           ORDER BY branch ASC, date ASC";
            }elseif ($branch !== "All") {
              $sumquery = "SELECT SUM(sales_target_yet) AS sales_target_yet,
                           SUM(sales_to_date) AS sales_to_date
                           FROM yet_sales WHERE date LIKE '%$date%'AND branch = '$branch'
                           AND archive_ysales = 'No'
                           AND archive_wcol = 'No'
                           AND archive_wcol = 'No'
                           ORDER BY branch ASC, date ASC";
            }
            $sumresult = mysqli_query($dbcon, $sumquery);
            $sumrow = mysqli_fetch_array($sumresult);
            echo '<tr>
                    <td class="is-size-6"></td>
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['sales_target_yet'].'</td>
                    <td class="is-size-6">'.$sumrow['sales_to_date'].'</td></tr>';
            echo '</tfoot></table></div></div>';
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

    if ($branch === "All") {
      $query = "SELECT * FROM week_collection
                  WHERE date LIKE '%$date%'
                  AND archive_wcol = 'No'
                  AND archive_wcol = 'No'
                  ORDER BY date ASC";
    }elseif ($branch !== "All") {
      $query = "SELECT * FROM week_collection
                  WHERE date LIKE '%$date%'
                  AND archive_wcol = 'No'
                  AND archive_wcol = 'No'
                  AND branch = '$branch'
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
            if ($branch === "All") {
              $sumquery = "SELECT SUM(col_week_amt) AS col_week_amt,
                           SUM(col_budget_amt) AS col_budget_amt
                           FROM week_collection WHERE date LIKE '%$date%'";
            }elseif ($branch !== "All") {
              $sumquery = "SELECT SUM(col_week_amt) AS col_week_amt,
                           SUM(col_budget_amt) AS col_budget_amt
                           FROM week_collection WHERE date LIKE '%$date%'AND branch = '$branch'";
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

    if ($branch === "All") {
      $query = "SELECT * FROM year_collection
                  WHERE date LIKE '%$date%'
                  ORDER BY date ASC";
    }elseif ($branch !== "All") {
      $query = "SELECT * FROM year_collection
                  WHERE date LIKE '%$date%'
                  AND branch = '$branch'
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
            if ($branch === "All") {
              $sumquery = "SELECT SUM(year_col_budget) AS year_col_budget,
                           SUM(year_col_annual) AS year_col_annual
                           FROM year_collection WHERE date LIKE '%$date%'
                           AND archive_wcol = 'No'";
            }elseif ($branch !== "All") {
              $sumquery = "SELECT SUM(year_col_budget) AS year_col_budget,
                           SUM(year_col_annual) AS year_col_annual
                           FROM year_collection WHERE date LIKE '%$date%'AND branch = '$branch'
                           AND archive_wcol = 'No'";
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
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $type = 'Recievable';
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($branch === "All"){
      $query = "SELECT * FROM pay_rec
                  WHERE date LIKE '%$date%'
                  AND type = '$type'
                  AND archive_payrec = 'No'
                  ORDER BY date ASC";
    }
    elseif ($branch !== "All"){
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
                    <th class="is-size-6">Weekly Collection</th>
                    <th class="is-size-6">Annual Budget Collection</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['desciption'].'</td>
                    <td class="is-size-6">'.$row['amount'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($branch === "All") {
              $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                          WHERE date LIKE '%$date%'
                          AND archive_payrec = 'No'
                          AND type = '$type'";
            }elseif ($branch !== "All") {
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
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['amount'].'</td></tr>';
            echo '</tfoot></table></div></div>';
    }
  }
?>

<?php
//Report on payables
  if(isset($_POST['genpay'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $type = 'Payable';
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');


    if ($branch === "All"){
      $query = "SELECT * FROM pay_rec
                  WHERE date LIKE '%$date%'
                  AND type = '$type'
                  AND archive_payrec = 'No'
                  ORDER BY date ASC";
    }
    elseif ($branch !== "All"){
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
                    <th class="is-size-6">Weekly Collection</th>
                    <th class="is-size-6">Annual Budget Collection</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td>
                    <td class="is-size-6">'.$row['desciption'].'</td>
                    <td class="is-size-6">'.$row['amount'].'</td></tr>';
              }
            echo '</tbody><tfoot>';
            //sum total
            if ($branch === "All") {
              $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                          WHERE date LIKE '%$date%'
                          AND archive_payrec = 'No'
                          AND type = '$type'";
            }elseif ($branch !== "All") {
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
                    <td class="is-size-6 title">Total</td>
                    <td class="is-size-6">'.$sumrow['amount'].'</td></tr>';
            echo '</tfoot></table></div></div>';
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

    if ($branch === "All") {
      $query = "SELECT * FROM breaking_news
                WHERE date LIKE '%$date%'
                AND archive_break = 'No'
                ORDER BY date ASC";
    }elseif ($branch !== "All") {
      $query = "SELECT * FROM breaking_news
                WHERE date LIKE '%$date%'
                AND archive_break = 'No'
                AND branch = '$branch'
                ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
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
              if ($branch === "All") {
                $sumquery = "SELECT SUM(amt) AS amt FROM breaking_news
                            WHERE date LIKE '%$date%'
                            AND archive_break = 'No' ";
              }elseif ($branch !== "All") {
                $sumquery = "SELECT SUM(amt) AS amt FROM breaking_news
                            WHERE date LIKE '%$date%'AND branch = '$branch'
                            AND archive_break = 'No' ";
              }

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

    if ($branch === "All") {
      $query = "SELECT * FROM negative_fed
                WHERE date LIKE '%$date%'
                AND archive_neg = 'No'
                ORDER BY date ASC";
    }elseif ($branch !== "All") {
      $query = "SELECT * FROM negative_fed
                WHERE date LIKE '%$date%'
                AND archive_neg = 'No'
                AND branch = '$branch'
                ORDER BY date ASC";
    }


    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
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

    if ($branch === "All") {
      $query = "SELECT * FROM insets
                WHERE date LIKE '%$date%' AND insets_type = '$insets_type'
                AND archive_inset = 'No'
                ORDER BY date ASC";
    }elseif ($branch !== "All") {
      $query = "SELECT * FROM insets
                WHERE date LIKE '%$date%' AND insets_type = '$insets_type'
                AND archive_inset = 'No'
                AND branch = '$branch'
                ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
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

    if ($branch === "All") {
      $query = "SELECT * FROM insets
                WHERE date LIKE '%$date%' AND insets_type = '$insets_type'
                AND archive_inset = 'No'
                ORDER BY date ASC";
    }elseif ($branch !== "All") {
      $query = "SELECT * FROM insets
                WHERE date LIKE '%$date%' AND insets_type = '$insets_type'
                AND archive_inset = 'No'
                AND branch = '$branch'
                ORDER BY date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.png" alt="banner logo" width="300" height="120"><p>';
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
