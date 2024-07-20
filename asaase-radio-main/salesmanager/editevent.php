<?php
  session_start();
  include('../connection.php');
  include('includes/auth.php');
  include('assets/update.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Employees Leave </title>
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
            <li ><a href="event.php" aria-current="page">Event</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Event</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Edit Event</h1>
            </div>

            <div class="column is-full">
              <?php
                $event_id= $_GET['event_id'];
                $dataquery = "SELECT * FROM `event`
                              WHERE event_id ='$event_id'";
                $dataresult = mysqli_query($dbcon, $dataquery);
                if (mysqli_num_rows($dataresult) > 0) {
                  $data = mysqli_fetch_array($dataresult);

              ?>
              <form class="columns is-multiline" action="editevent.php?event_id=<?php echo $event_id; ?>" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <input type="hidden" name="event_id" value="<?php echo $event_id?>">
                  <div  class="field">
                  <label for="" class="label">Event Name<span class="has-text-danger " >*</span></label>
                  <div class="control">
                      <input type="text" name="event_name" class="input" value="<?php echo $data['name']?>" required >
                  </div>
              
                </div>
                <div class="field">
                    <label class="label">Event Date<span class="has-text-danger " >*</span></label>
                    <div class="control">
                      <input class="input" id="event_date" name="event_date" min="<?php echo date("Y-m-d"); ?>"  value="<?php echo $data['date']?>" type="date"  required>
                    </div>
                </div>
               <div class="field">
                  <label for="" class="label">Event Budget (GH₵)<span class="has-text-danger " >*</span></label>
                  <div class="control">
                      <input type="number" class="input" name="event_budget" value="<?php echo $data['budget']?>" required>
                  </div>
               </div>
               <div class="field">
                  <label for="" class="label">Activity Brief<span class="has-text-danger " >*</span></label>
                  <div class="control">
                      <input type="text" class="input" name="activity_brief" value="<?php echo $data['activity_brief']?>" required>
                      <!-- <textarea class="textarea" name="crew_members" id="" value="<?php echo $data['crew_list']?>" cols="30" rows="10" placeholder="Separate Names with ,"  required><?php echo $data['crew_list']?></textarea> -->
                  </div>
               </div>
                <div class="field">
                  <label for="" class="label">Approval Status</label>
                  <div class="control">
                      <select name="status" id="" class="input" required>
                          <option value="" disabled>--select Status--</option>
                          <option value="Pending" <?php if($data['status'] == "Pending"){echo 'selected';}?>>Pending</option>
                          <option value="Granted" <?php if($data['status'] == "Granted"){echo 'selected';}?> >Granted</option>
                          <option value="Rejected" <?php if($data['status'] == "Rejected"){echo 'selected';}?> >Rejected</option>
                      </select>
                  </div>
                </div>
                  
                  
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6">

                    </p>
                    <p class="control">
                      <button class="button is-info" name="updateevent">
                        &nbsp; Update &nbsp;
                      </button>
                    </p>
                  </div>

                </div>


              </form>
              <?php } ?>
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
