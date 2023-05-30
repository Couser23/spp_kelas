<?php
include'../koneksi.php';
$id_petugas = 2;
$nisn = $_POST['nisn'];
$tgl_bayar = date('Y/m/d');
$bulan_bayar = $_POST['bulan_dibayar'];
$tahun_dibayar = date('Y');
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$metode = $_POST['metode'];
$stst = "Pending";
$upload = $_FILES['upload']['name'];
$file_tmp = $_FILES['upload']['tmp_name'];
$tmp_file_permanent = "../gambar/".$upload;
move_uploaded_file($file_tmp, $tmp_file_permanent);
$sql1 = mysqli_query($koneksi, "SELECT * from pembayaran where nisn='$nisn' and id_spp='$id_spp' and bulan_dibayar='$bulan_bayar'");
$hasil =  mysqli_num_rows($sql1);
if($hasil === 0) {
$sql = "INSERT INTO pembayaran(id_petugas,nisn,tgl_bayar,bulan_dibayar,tahun_dibayar,id_spp,jumlah_bayar,metode,Status,upload) VALUES('$id_petugas','$nisn','$tgl_bayar','$bulan_bayar','$tahun_dibayar','$id_spp','$jumlah_bayar','$metode','$stst','$tmp_file_permanent')";
$query = mysqli_query($koneksi, $sql);
    echo"<script>alert('Pembayaran Tertunda, Mohon Tunggu Konfirmasi Selanjutnya'); window.location.assign('?url=pembayaran');</script>";
} else {
    echo"<script>alert('SPP sudah dibayar'); window.location.assign('?url=tambah-pembayaran&nisn=$nisn');</script>";
}