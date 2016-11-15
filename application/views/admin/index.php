<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('admin/common/header'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php $this->load->view('admin/common/topnav'); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <?php $this->load->view('admin/common/sidebar'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php $this->load->view($path_content)?>
    <!-- /.content -->
  </div>
  <?php $this->load->view('admin/common/script'); ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <?php $this->load->view('admin/common/footer'); ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <?php $this->load->view('admin/common/rightsidebar'); ?>
    </aside>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
