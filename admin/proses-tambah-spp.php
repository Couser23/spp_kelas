<?php

$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];
$total = $_POST['total'];

include'../koneksi.php';
$sql = "INSERT INTO spp(tahun,nominal,total) VALUES('$tahun','$nominal','$total')";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Tersimpan'); window.location.assign('?url=spp');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Belum Tersimpan'); window.location.assign('?url=spp');</script>";
}


