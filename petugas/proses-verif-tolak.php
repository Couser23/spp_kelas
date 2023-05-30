<?php 
include'../koneksi.php';
$id_petugas = $_SESSION['id_petugas'];
$id_byr = $_GET['id_byr'];
$stst = "Lunas";
$sql1 = mysqli_query($koneksi, "DELETE from pembayaran WHERE id_pembayaran = '$id_byr' ");
echo"<script>alert('SPP Berhasil Dihapus'); window.location.assign('?url=verifikasi');</script>";
 ?>