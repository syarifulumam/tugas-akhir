<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>GIS Rumah Sakit</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
  <!-- Rute Leaflet CSS-->
  <!-- <script src="<?= base_url('assets/leaflet-routing-machine/dist/') ?>leaflet-routing-machine.css"></script> -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
   <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  <!-- Rute Leaflet JS-->
  <script src="<?= base_url('assets/leaflet-routing-machine/dist/') ?>leaflet-routing-machine.js"></script>
  <script src="<?= base_url('assets/leaflet-routing-machine/examples/') ?>Control.Geocoder.js"></script>
  <!-- Leaflet JS Marker -->
   <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>   
  <!-- GeoJSON kota tangerang -->
  <script src="<?= base_url('assets/geojson/') ?>tangerang.js"></script>
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url('assets/adminlte/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/adminlte/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('rumahsakit') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Rumah Sakit</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Pengaturan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content pt-2">
      <div class="container-fluid">
          <?= $contents ?>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<!-- SweetAlert2 -->
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) {
      Toast.fire({
        type: 'success',
        title: flashdata
      });
    }

  });
</script>
</body>
</html>
