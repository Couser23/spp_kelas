<?php
$id_petugas = $_GET['id_petugas'];

include'../koneksi.php';
$sql = "DELETE FROM petugas WHERE id_petugas='$id_petugas'";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Terhapus'); window.location.assign('?url=administrator');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Tidak Terhapus'); window.location.assign('?url=administrator');</script>";
}


