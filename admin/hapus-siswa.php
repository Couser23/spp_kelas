<?php

$nisn = $_GET['nisn'];

include'../koneksi.php';
$sql = "SELECT FROM siswa WHERE nisn='$nisn'";
$sql1 = "DELETE FROM siswa WHERE nisn='$nisn'";
$query = mysqli_query($koneksi, $sql1);
if($query){
    echo"<script>alert('Data Berhasil Terhapus'); window.location.assign('?url=siswa');</script>";
}else{
    echo"<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('?url=siswa');</script>";
}


