<?php

include'../koneksi.php';
$id_petugas = $_SESSION['id_petugas'];
$nisn = $_POST['nisn'];
$kelas = $_POST['kelas'];
$tahun = $_POST['Tahunn'];
$tgl_bayar = date('Y/m/d');
$bulan_bayar = $_POST['bulan_dibayar'];
$tahun_dibayar = date('Y');
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$metode = $_POST['metode'];
$stst = "Lunas";
$upload = "null";
$sql1 = mysqli_query($koneksi, "SELECT * from pembayaran where nisn='$nisn' and id_spp='$id_spp' and bulan_dibayar='$bulan_bayar' and kelas='$kelas'");
$hasil =  mysqli_num_rows($sql1);
if($hasil === 0) {
$sql = "INSERT INTO pembayaran(id_petugas,nisn,kelas,tgl_bayar,bulan_dibayar,tahun_dibayar,id_spp,jumlah_bayar,metode) VALUES('$id_petugas','$nisn','$kelas','$tgl_bayar','$bulan_bayar','$tahun','$id_spp','$jumlah_bayar','$metode','$stst','$upload')";
$query = mysqli_query($koneksi, $sql);
    // echo"<script>alert('SPP Berhasil Terbayar'); window.location.assign('?url=pembayaran');</script>";
    echo "$kelas";
} else {
    echo"<script>alert('SPP sudah dibayar'); window.location.assign('?url=tambah-pembayaran&nisn=$nisn');</script>";
}