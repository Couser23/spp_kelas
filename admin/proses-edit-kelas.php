<?php

$id_kelas =$_GET['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

include'../koneksi.php';
$sql = "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Tersimpan'); window.location.assign('?url=kelas');</script>";
}else{
    echo"<script>alert('Maaf Data Anda Belum Tersimpan'); window.location.assign('?url=kelas');</script>";
}

?>
