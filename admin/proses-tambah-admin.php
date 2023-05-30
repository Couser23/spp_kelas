<?php

$username = $_POST['username'];
$password = $_POST['password'];
$nama_petugas = $_POST['nama_petugas'];
$level = "admin";

include'../koneksi.php';
$sql = "INSERT INTO petugas(username,password,nama_petugas,level) VALUES('$username','$password','$nama_petugas','$level')";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Tersimpan'); window.location.assign('?url=administrator');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Belum Tersimpan'); window.location.assign('?url=administrator');</script>";
}


