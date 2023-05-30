<?php

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$no_ortu = $_POST['no_ortu'];
$password = $_POST['password'];
$id_spp = $_POST['id_spp'];

include'../koneksi.php';
$sql = "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,no_ortu,password,id_spp) VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$no_ortu','$password','$id_spp')";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Tersimpan'); window.location.assign('?url=siswa');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Belum Tersimpan'); window.location.assign('?url=siswa');</script>";
}

