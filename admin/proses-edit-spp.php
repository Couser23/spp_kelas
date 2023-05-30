<?php

$id_spp =$_GET['id_spp'];
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];
$total = $_POST['total'];

include'../koneksi.php';
$sql = "UPDATE spp SET tahun='$tahun', nominal='$nominal', total='$total' WHERE id_spp='$id_spp'";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Tersimpan'); window.location.assign('?url=spp');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Belum Tersimpan'); window.location.assign('?url=spp');</script>";
}


