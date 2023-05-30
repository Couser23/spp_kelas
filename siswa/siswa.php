<?php
ob_start();
session_start();
if(empty($_SESSION['nisn'])){
	echo"<script>
    alert('Maaf Anda Belum Login'); 
    window.location.assign('../index.php');
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link
    href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap"
    rel="stylesheet"/>
    <!-- Line Awesome CDN Link -->
  <link
    rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"/>
    <link rel="stylesheet" href="stylee.css">
  <link rel="icon" href="../images/Logo_SMKN_2_Singosari-removebg.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
  <title>Siswa | Aplikasi Pembayaran SPP</title>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <button type="button" class="dropdown-item" onclick="logoutSiswa()">
            <i class="fas fa-fw fa-sign-out-alt mr-2"></i> Logout
            </a>
            <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://smkn2-singosari.sch.id/" class="brand-link">
      <img src="../AdminLTE/dist/img/Logo_SMKN_2_Singosari-removebg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMKN 02 Singosari</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images/ayaka.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['nama'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
          <li class="nav-item">
            <a href="siswa.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">PEMBAYARAN</li>
            <li class="nav-item">
              <a href="siswa.php?url=pembayaran" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>
                  Pembayaran Dan History
                </p>
              </a>
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pembayaran SPP</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <h3>Aplikasi Pembayaran SPP</h3>
        <div class="alert alert-info">
          Login Sebagai <b>Siswa</b>
        </div>
		<div class="card mt-2">
		<div class="card-body">
			<!-- ini isi web kita -->
			<?php
			$file = @$_GET['url'];
			if(empty($file)){
				echo"<h4>Selamat Datang Di Halaman Siswa, " . $_SESSION['nama'] . "</h1>";
				echo"Aplikasi Pembayaran SPP digunakan untuk mempermudah dalam mencatat pembayaran siswa / siswi disekolah.";
			}else{
				include $file.'.php';
			}
			?>
		</div>
	</div>
      </div>
  </div>
  </section>


  <footer class="main-footer">
    <strong>Copyright &copy; By <a href="https://www.tiktok.com/@youtube.mikasamlbb">Pradipta</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Couser</b>
    </div>
  </footer>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../AdminLTE/dist/js/adminlte.js"></script>
  <script src="../js/logout.js"></script>
  <script>
  function qq() {
    $('#qris').modal('show'); 
  }
  function bank() {
    $('#bank').modal('show'); 
  }
  </script>
</body>

</html>