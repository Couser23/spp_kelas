<?php
$id_petugas = $_GET['id_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_petugas = $_POST['nama_petugas'];
$level = "admin";

include'../koneksi.php';
$sql = "UPDATE petugas SET username='$username',password='$password',nama_petugas='$nama_petugas',level='$level' WHERE id_petugas='$id_petugas'";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Tersimpan'); window.location.assign('?url=administrator');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Belum Tersimpan'); window.location.assign('?url=administrator');</script>";
}