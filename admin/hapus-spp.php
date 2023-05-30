<?php

$id_spp =$_GET['id_spp'];

include'../koneksi.php';
$sql = "DELETE FROM spp WHERE id_spp='$id_spp'";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Terhapus'); window.location.assign('?url=spp');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Belum Terhapus'); window.location.assign('?url=spp');</script>";
}