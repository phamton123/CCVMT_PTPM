<?php
    require_once $path.'../commons/utils.php';
    if(!isset($_SESSION['login'])){
      header("Location:".SITE_URL."login.php");
    }
?>
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo SITE_URL.$_SESSION['login']['avatar'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['login']['fullname'] ?></span>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">
                <img src="<?php echo SITE_URL.$_SESSION['login']['avatar']; ?>" class="img-circle" alt="User Image">

                <p>
                <?php echo $_SESSION['login']['fullname'] ?> - Web Developer
                </p>
              </li>
            
              <li class="user-footer">
                <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="<?= $ADMIN_URL ?>_share/edit_user.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="<?= $ADMIN_URL ?>_share/edit_pass.php" class="btn btn-default btn-flat">Password</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="<?= SITE_URL ?>logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>