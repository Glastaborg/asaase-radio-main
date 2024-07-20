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
      <li>
        <a href="employees.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-users"></i>
          </span>
          Employees
        </a>
      </li>
      <li>
        <a href="branches.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-building"></i>
          </span>
          Branches
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
      <li>
        <a href="event.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-walking"></i>
          </span>
          Events
        </a>
      </li>
      <!-- <li>
        <a href="activitybudget.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-money-bill-wave"></i>
          </span>
        Activity Budget
        </a>
      </li> -->
      <li>
        <a href="jobrequest.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user-plus"></i>
          </span>
          Job Request
        </a>
      </li>
      <li>
        <a href="assetrequest.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-car"></i>
          </span>
          Vehicle Request
        </a>
      </li>
      <li>
        <a href="procurement.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-shopping-cart"></i>
          </span>
          Procurement
        </a>
      </li>
      <li>
        <a href="https://drive.google.com/drive/mobile/folders/0ANhW4NtUrL2GUk9PVA?usp=notify_sd_md&huid=DOObkIUtCRbw2-T3VpOBhQ" target="_blank" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="far fa-file-alt"></i>
          </span>
          Uploaded Works
        </a>
      </li>
      <!--<li>
        <a href="assets.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-car-side"></i>
          </span>
        Assets
        </a>
      </li>
      <li>
        <a href="assetstatus.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-car-crash"></i>
          </span>
        Assets Status
        </a>
      </li>
      <li>
        <a href="assetemployee.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user-cog"></i>
          </span>
        Assets Assigned
        </a>
      </li>
      <li>
        <a href="facility.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-building"></i>
          </span>
        Facility
        </a>
      </li>
      <li>
        <a href="facilitystatus.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-house-damage"></i>
          </span>
        Facility Status
        </a>
      </li>-->
    </ul>
    <p class="menu-label is-size-7 has-text-white">Reports</p>
    <ul class="menu-list">
      <!-- <li>
        <a href="employeesreports.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="far fa-file-alt"></i>
          </span>
        Employee Report
        </a>
      </li> -->
      <li>
        <a href="sessions.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user-clock"></i>
          </span>
          Employee Sessions
        </a>
      </li>
      <li>
        <a href="employeeleave.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-walking"></i>
          </span>
          Employee Leave
        </a>
      </li>

      <li>
        <a href="vacancy.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user-plus"></i>
          </span>
          Vacancy
        </a>
      </li>
    </ul>
    <p class="menu-label is-size-7 has-text-white">Forms</p>
    <ul class="menu-list">
      <!-- <li>
        <a href="evaluation.php?view" target="_blank" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="far fa-file-alt"></i>
          </span>
        Evaluation Form
        </a>
      </li> -->
      <?php
      // $today_quater = date('m-d');
      // if (($today_quater >= "01-01" && $today_quater <= "03-31") OR ($today_quater >= "07-01" && $today_quater <= "09-30")) {
      ?>
      <li>
        <a href="perf-hr.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="far fa-file-alt"></i>
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
      <?php //} 
      ?>
      <!-- <li>
        <a href="appraisal.php?view" target="_blank" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="far fa-file-alt"></i>
          </span>
        Appraisal Form
        </a>
      </li> -->
    </ul>
    <p class="menu-label is-size-7 has-text-white">Settings</p>
    <ul class="menu-list">
      <li>
      <li>
        <a href="leave.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          My Leave
        </a>
      </li>
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