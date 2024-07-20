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
              WHERE branch = '$branch'
              ORDER BY firstname ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-5 has-text-centered pb-3">Report on '.$branch.' Employees</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $activity_status = $_POST['activity_status'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    if ($activity_status === 'All') {
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND branch = '$branch'
                ORDER BY activity_date ASC";
    }else{
      $query = "SELECT * FROM activities
                WHERE activity_date LIKE '%$date%'
                AND activity_status = '$activity_status'
                AND branch = '$branch'
                ORDER BY activity_date ASC";
    }

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Activities</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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


    $query = "SELECT * FROM week_sales
                WHERE date LIKE '%$date%'
                AND branch = '$branch'
                ORDER BY date ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Weekly Sales</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
            $sumquery = "SELECT SUM(sales_target) AS sales_target,
                         SUM(act_sale_target) AS act_sale_target
                         FROM week_sales WHERE date LIKE '%$date%'AND branch = '$branch'
                         ORDER BY branch ASC, date ASC";
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


    $query = "SELECT * FROM yet_sales
                WHERE date LIKE '%$date%'
                AND branch = '$branch'
                ORDER BY date ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Yet to Sales</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
            $sumquery = "SELECT SUM(sales_target_yet) AS sales_target_yet,
                         SUM(sales_to_date) AS sales_to_date
                         FROM yet_sales WHERE date LIKE '%$date%'AND branch = '$branch'
                         ORDER BY branch ASC, date ASC";
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


    $query = "SELECT * FROM week_collection
                WHERE date LIKE '%$date%'
                AND branch = '$branch'
                ORDER BY date ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Weekly Collection</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
            $sumquery = "SELECT SUM(col_week_amt) AS col_week_amt,
                         SUM(col_budget_amt) AS col_budget_amt
                         FROM week_collection WHERE date LIKE '%$date%'AND branch = '$branch'";
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


    $query = "SELECT * FROM year_collection
                WHERE date LIKE '%$date%'
                AND branch = '$branch'
                ORDER BY date ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Year to Date Collection</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
            $sumquery = "SELECT SUM(year_col_budget) AS year_col_budget,
                         SUM(year_col_annual) AS year_col_annual
                         FROM year_collection WHERE date LIKE '%$date%'AND branch = '$branch'";
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


    $query = "SELECT * FROM pay_rec
                WHERE date LIKE '%$date%'
                AND branch = '$branch' AND type = '$type'
                ORDER BY date ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Recievables</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
            $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                        WHERE date LIKE '%$date%'AND branch = '$branch'
                        AND type = '$type'";
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


    $query = "SELECT * FROM pay_rec
                WHERE date LIKE '%$date%'
                AND branch = '$branch' AND type = '$type'
                ORDER BY date ASC";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Payables</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
            $sumquery = "SELECT SUM(amount) AS amount FROM pay_rec
                        WHERE date LIKE '%$date%'AND branch = '$branch'
                        AND type = '$type'";
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

    $query = "SELECT * FROM breaking_news
              WHERE date LIKE '%$date%'
              AND branch = '$branch'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Breaking News</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
                          WHERE date LIKE '%$date%'AND branch = '$branch'";
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
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Negative Feedback</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Wrong Insets</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Unplayed Insets</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
//Report on assets
  if(isset($_POST['genasset'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM assets
              WHERE date LIKE '%$date%'
              AND branch = '$branch'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Assets</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT *,asset_status.date AS asset_status_date FROM asset_status
              INNER JOIN assets ON assets.asset_id = asset_status.asset_id
              WHERE asset_status.date LIKE '%$date%'
              AND branch = '$branch'
              ORDER BY asset_status.date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Assets Status</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM asset_employee
              INNER JOIN employee ON employee.employee_id = asset_employee.employee_id
              INNER JOIN assets ON assets.asset_id = asset_employee.asset_id
              WHERE col_date LIKE '%$date%'
              AND assets.branch = '$branch'
              ORDER BY col_date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Assets Assigned To Employees</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM facility
              WHERE date LIKE '%$date%'
              AND branch = '$branch'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Facilities</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT *, facility_status.date AS fsdate FROM facility_status
              INNER JOIN facility ON facility.facility_id = facility_status.facility_id
              WHERE facility_status.date LIKE '%$date%'
              AND facility.branch = '$branch'
              ORDER BY facility_status.date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Facilities Status</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
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


<?php
//Report on employee sessions
  if(isset($_POST['gensess'])){
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $titledate = new DateTime($date);
    $titledate = $titledate->format('F, Y');

    $query = "SELECT * FROM sessions
              INNER JOIN employee ON employee.employee_id = sessions.employee_id
              WHERE date LIKE '%$date%'
              AND employee.branch = '$branch'
              ORDER BY date ASC";

    $result = mysqli_query($dbcon, $query);
    if(mysqli_affected_rows($dbcon) <= 0){
          echo '<div class="column is-full"><div class="notification is-danger is-light">There are no related reports.</div></div>';
    }else{
          echo '<div class="column is-full"><p class="has-text-centered"><img src="../images/asaase banner.webp" alt="banner logo" width="300" height="120"><p>';
          echo '<h1 class="title is-size-4 has-text-centered pb-3">Report on '.$branch.' Employee Sessions</h1>';
          echo '<h1 class="subtitle is-size-6 has-text-centered pb-3">For the Month of  '.$titledate.'</h1>';
          echo '<div class="table-container py-5"><table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo '<thead>
                  <tr>
                    <th class="is-size-6">Date</th>
                    <th class="is-size-6">Name</th>
                    <th class="is-size-6">Description</th>
                    <th class="is-size-6">Department</th>
                    <th class="is-size-6">Branch</th>
                  </tr>
                </thead>
                <tbody>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td class="is-size-6">'.$row['date'].'</td>
                    <td class="is-size-6">'.$row['firstname'].' '.$row['lastname'].'</td>
                    <td class="is-size-6">'.$row['description'].'</td>
                    <td class="is-size-6">'.$row['department'].'</td>
                    <td class="is-size-6">'.$row['branch'].'</td></tr>';
              }
          echo '</tbody></table></div></div>';
    }
  }
?>
