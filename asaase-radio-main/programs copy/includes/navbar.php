<nav class="navbar has-background-white">
  <div class="navbar-brand" >
    <img class="navbar-item" src="../images/banner.png" alt="banner logo" width="112" height="48" id="nav-banner">
      <a onclick="sideBar()" role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div class="navbar-end">
    <div class="navbar-item" id="profileicon">
      <a href="profile.php" class="is-size-6 py-1 has-text-black" title="Profile">
        <?php echo $sessfirstname.' '.$sesslastname; ?> <i class="fa fa-user-circle"></i>
      </a>
    </div>
  </div>
</nav>
