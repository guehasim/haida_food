<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Check In Canteen / 入住食堂</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/content2/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/content2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/content2/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/content2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/content2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/content2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/content2/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo base_url() ?>assets/content2/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-th-large"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo base_url() ?>Login/logout" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Sign Out
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>Dashboard" class="brand-link">
      <img src="<?php echo base_url() ?>assets/content2/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> PT. HAIDA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <?php 

          if ($menu == 'dashboard') {
            $dashboard  = "active";
            $master     = "menu-close";
            $sub_master = "";
            $user       = "";
            $karyawan   = "";
            $jabatan    = "";
            $laporan    = "menu-close";
            $sub_laporan= "";
          }elseif ($menu == 'user') {
            $dashboard  = "";
            $master     = "menu-open";
            $sub_master = "active";
            $user       = "active";
            $karyawan   = "";
            $jabatan    = "";
            $laporan    = "menu-close";
            $sub_laporan= "";
          }elseif ($menu == 'karyawan') {
            $dashboard  = "";
            $master     = "menu-open";
            $sub_master = "active";
            $user       = "";
            $karyawan   = "active";
            $jabatan    = "";
            $laporan    = "menu-close";
            $sub_laporan= "";
          }elseif($menu == 'jabatan'){
            $dashboard  = "active";
            $master     = "menu-open";
            $sub_master = "";
            $user       = "";
            $karyawan   = "";
            $jabatan    = "active";
            $laporan    = "menu-close";
            $sub_laporan= "";
          }
          elseif ($menu == 'laporan') {
            $dashboard  = "";
            $master     = "menu-close";
            $sub_master = "";
            $user       = "";
            $karyawan   = "";
            $jabatan    = "";
            $laporan    = "menu-open";
            $sub_laporan= "active";
          }else{

           
          }?>

          <li class="nav-item">
            <a href="<?php echo base_url() ?>Dashboard" class="nav-link <?php echo $dashboard;?>" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item <?php echo $master;?>">
            <a href="#" class="nav-link <?php echo $sub_master;?>" >
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php echo $user;?>">
                <a href="<?php echo base_url() ?>User" class="nav-link <?php echo $user;?>" >
                  <i class="fa fa-user nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item <?php echo $karyawan;?>">
                <a href="<?php echo base_url() ?>Karyawan" class="nav-link <?php echo $karyawan;?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
              <li class="nav-item <?php echo $jabatan;?>">
                <a href="<?php echo base_url() ?>Jabatan" class="nav-link <?php echo $jabatan;?>" >
                  <i class="fa fa-user-tie nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php echo $laporan;?>">
            <a href="#" class="nav-link <?php echo $sub_laporan;?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php echo $sub_laporan;?>">
                <a href="<?php echo base_url() ?>Laporan" class="nav-link <?php echo $sub_laporan;?>">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Check In</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>