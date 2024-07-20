<div class="menu px-4 is-2 pb-6 has-background-brown  active" id="aside">
  <nav class="">
    <div class="navbar-brand">
      <img class="navbar-item" src="../images/banner.png" alt="banner logo" width="200" height="50">
      <a onclick="sideBar()" role="button" class="navbar-burger is-active" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  </nav>
 <aside class="px-2 mt-5">
    <p class="menu-label is-size-7 has-text-white">Menu</p>
    <ul class="menu-list">
      <li>
        <a href="dashboard.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-home"></i>
          </span>
        Dashboard
        </a>
      </li>
      <!-- <li>
        <a href="activities.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-tasks"></i>
          </span>
        Activities
        </a>
      </li> -->
       
      <?php
        if ($_SESSION['department'] === "Brands and Comms") {
      ?>
      <li>
         <a href="https://drive.google.com/drive/mobile/folders/0ANhW4NtUrL2GUk9PVA?usp=notify_sd_md&huid=DOObkIUtCRbw2-T3VpOBhQ" target="_blank" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="far fa-file-alt"></i>
          </span>
        Uploaded Works
        </a>
      </li>
      <?php } ?>
       
         <?php
        if ($_SESSION['department'] === "Event") {
      ?>
      <li>
        <a href="event.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-calendar-alt"></i>
          </span>
        Events
        </a>
      </li>
      <?php } ?>
      <?php if($_SESSION['job_description'] !== "Driver") { ?>
      <li>
        <a href="assetrequest.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-car"></i>
          </span>
          Vehicle Request
        </a>
      </li>
      <?php } ?>
      <?php if($_SESSION['job_description'] === "Driver") {?>
       <li>
        <a href="assetemployee.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user-cog"></i>
          </span>
          Vehicle Assigned
        </a>
      </li>
       <li>
        <a href="assetrequesttrips.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-car"></i>
          </span>
            Vehicle Request
        </a>
      </li>
      <?php } ?>
      <?php
        // $today_quater = date('m-d');
        // if (($today_quater >= "01-01" && $today_quater <= "03-31") OR ($today_quater >= "07-01" && $today_quater <= "09-30") && ($_SESSION['position'] !== "Supervisor")) {
      ?>
      
      <li>
        <a href="perf-review.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-file"></i>
          </span>
          Performace Review
        </a>
      </li>
      <li>
        <a href="probation.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-file"></i>
          </span>
          Probation Report
        </a>
      </li>
      <?php //} ?>
    
      <?php 
      //for employees under the sales department 
      if($_SESSION['job_description'] === "Sales"){ ?>
        <p class="menu-label is-size-7 has-text-white">Reports</p>
      
        <li>
        <a href="agency.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-building"></i>
          </span>
            Agencies
        </a>
      </li>
      
      <li>
        <a href="wsalesreports.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-coins"></i>
          </span>
            Weekly Sales
        </a>
      </li>
      
        <li>
        <a href="ysalesreports.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-hand-holding-usd"></i>
          </span>
        Year-To-Date Sales
        </a>
      </li>
      <?php }?>
    
      <?php
        if ($_SESSION['position'] === "Producer") {
      ?>
      <li>
        <a href="progsched.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-calendar-alt"></i>
          </span>
        Program Lineup
        </a>
      </li>
    
      <?php } ?>
      
      <?php
        if ($_SESSION['job_description'] === "Producer" || $_SESSION['job_description'] === "Presenter") {
      ?>
    
      <li>
        <a href="todayscripts.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-calendar-alt"></i>
          </span>
        Program Scripts
        </a>
      </li>
      <?php } ?>
    </ul>
    <p class="menu-label is-size-7 has-text-white">Settings</p>
    <ul class="menu-list">
      <li>
        <a href="leave.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-walking"></i>
          </span>
        My Leave
        </a>
      </li>
      <li>
        <a href="profile.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        Profile
        </a>
      </li>
      <li>
        <a href="logout.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-sign-out-alt"></i>
          </span>
        Logout
        </a>
      </li>
    </ul>
  </aside>
</div>
