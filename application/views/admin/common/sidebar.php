<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active treeview">
      <a href="<?php echo base_url('adminpanel/dashboard')?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>

    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Users</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/user/add_user') ?>"><i class="fa fa-circle-o"></i> add user</a></li>
        <li><a href="<?php echo base_url('adminpanel/user/manage_user') ?>"><i class="fa fa-circle-o"></i> manage user</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-book" aria-hidden="true"></i>
        <span>Medical Record</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/medicalrecord/manage_medicalrecord') ?>"><i class="fa fa-sitemap"></i> Manage Medical Record</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
        <span>News</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/news/add_news') ?>"><i class="fa fa-plus"></i> Add News</a></li>
        <li><a href="<?php echo base_url('adminpanel/news/manage_news') ?>"><i class="fa fa-file-o"></i> Manage News</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-weixin" aria-hidden="true"></i>
        <span>Chat</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">

        <li><a href="<?php echo base_url('adminpanel/chat/manage_chat') ?>"><i class="fa fa-book"></i>Manage Chat</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-usd" aria-hidden="true"></i>
        <span>Payment</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
          <li><a href="<?php echo base_url('adminpanel/payment/add_payment') ?>"><i class="fa fa-plus"></i>add payment</a></li>
          <li><a href="<?php echo base_url('adminpanel/payment/manage_payment') ?>"><i class="fa fa-usd"></i>manage payment</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-exchange" aria-hidden="true"></i>
        <span>Transaction</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">

        <li><a href="<?php echo base_url('adminpanel/transaction/manage_transaction') ?>"><i class="fa fa-book"></i>Manage Transaction</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-commenting" aria-hidden="true"></i>
        <span>Comment</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">

        <li><a href="<?php echo base_url('adminpanel/comment/manage_comment') ?>"><i class="fa fa-book"></i>Manage Comment</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-gear" aria-hidden="true"></i>
        <span>Setting</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">

        <li><a href="<?php echo base_url('adminpanel/dashboard/edit-setting') ?>"><i class="fa fa-gears"></i>Manage Setting</a></li>
      </ul>
    </li>



</section>
<!-- /.sidebar -->
