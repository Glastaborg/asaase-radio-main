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

      <!--- Do not show if its not HOD    -->
      <?php if ($_SESSION['job_description'] === 'Department Head') { ?>
      <!-- <li>
        <a href="employees.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-users"></i>
          </span>
        Employees
        </a>
      </li> -->
      <?php } ?>
<!--      <li>-->
<!--        <a href="activities.php" class="has-icons-left has-text-white">-->
<!--          <span class="icon is-small is-left">-->
<!--            <i class="fas fa-tasks"></i>-->
<!--          </span>-->
<!--        Activities-->
<!--        </a>-->
<!--      </li>-->
<!--      <li>-->
<!--        <a href="activitybudget.php" class="has-icons-left has-text-white">-->
<!--          <span class="icon is-small is-left">-->
<!--            <i class="fas fa-money-bill-wave"></i>-->
<!--          </span>-->
<!--        Activity Budget-->
<!--        </a>-->
<!--      </li>-->
      <li>
        <a href="assetrequest.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-car"></i>
          </span>
          Vehicle Request
        </a>
      </li>
      <!-- <li>
        <a href="subleaverequests.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-walking"></i>
          </span>
        Employee Leave Request
        </a>
      </li> -->
      <!--- Do not show if its not HOD    -->

      <!-- <li>
        <a href="jobrequest.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="fas fa-user-plus"></i>
          </span>
        Job Request
        </a>
      </li> -->
    
    </ul>
    <p class="menu-label is-size-7 has-text-white">Upload Document</p>
    <ul class="menu-list">     
      <li>
        <!-- <a href="https://drive.google.com/drive/mobile/folders/0ANhW4NtUrL2GUk9PVA?usp=notify_sd_md&huid=DOObkIUtCRbw2-T3VpOBhQ" target="_blank" class="has-icons-left has-text-white"> -->
          <a href="uploaded-docs.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
            <i class="far fa-file-alt"></i>
          </span>
        Upload Document
        </a>
      </li>
      

    </ul>
    <p class="menu-label is-size-7 has-text-white">Settings</p>
    <ul class="menu-list">
      <li>
        <a href="perf-review.php" class="has-icons-left has-text-white">
          <span class="icon is-small is-left">
          <i class="fas fa-file"></i>
          </span>
          Performance Review
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
