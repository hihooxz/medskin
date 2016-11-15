<!-- Logo -->
<a href="<?php echo base_url('')?>" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>A</b>PN</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Admin</b>Panel</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <!-- Notifications: style can be found in dropdown.less -->

      <!-- Tasks: style can be found in dropdown.less -->

      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Profile">
          <?php
          $profil = $this->mod->getdatawhere('user','id_user',$this->session->userdata('idAdmin'));
          ?>
          <img src="<?php echo base_url($profil['avatar'])?>" class="img-circle" alt="User Image" width="20px" height="20px">
          <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
          <i class="fa fa-user" aria-hidden="true"></i>
            <p>
              <?php echo $this->session->userdata('username');?>
              <small> since . 2016</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="<?php echo base_url('adminpanel/dashboard/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      <li class="user user-menu">
        <a href="<?php echo base_url('adminpanel/dashboard/logout') ?>" title="Sign Out">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
          <!-- <span class="hidden-xs">Sign Out</span> -->
        </a>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <!-- <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li> -->
    </ul>
  </div>
</nav>
