<?php
session_start();
if(empty($_SESSION['id_petugas'])){
	echo"<script>
    alert('Maaf Anda Belum Login'); 
    window.location.assign('../index2.php');
    </script>";
}
if($_SESSION['level']!='petugas'){
	echo"<script>
    alert('Maaf Anda Bukan Petugas'); 
    window.location.assign('../index2.php');
    </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Petugas | Aplikasi Pembayaran SPP</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">

	<h3>Aplikasi Pembayaran SPP</h3>
	<div class="alert alert-info">
		Login Sebagai Petugas <b><?= $_SESSION['nama_petugas'] ?></b> Aplikasi Pembayaran SPP
	</div>
	<a href="petugas.php" class="btn btn-primary"> Petugas</a>
	<a href="petugas.php?url=pembayaran" class="btn btn-primary"> Pembayaran</a>
	<a href="../Logout/logout_admin_petugas.php" class="btn btn-primary" onclick="logoutadmin_petugas()"> Logout</a>

	<div class="card mt-2">
		<div class="card-body">
			<!-- ini isi web kita -->
			<?php
			$file = @$_GET['url'];
			if(empty($file)){
				echo"<h4>Selamat Datang Di Halaman Petugas</h4>";
				echo"Aplikasi Pembayaran SPP digunakan untuk mempermudah dalam mencatat pembayaran siswa / siswi disekolah.";
			}else{
				include $file.'.php';
			}
			?>
		</div>
	</div>

</div>


<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/logout.js"></script>
</body>
</html>