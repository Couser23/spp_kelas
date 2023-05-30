<?php

$nisn = $_GET['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$no_ortu = $_POST['no_ortu'];
$password = $_POST['password'];
$id_spp = $_POST['id_spp'];

include'../koneksi.php';
$sql = "UPDATE siswa SET nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp',no_ortu='$no_ortu',password='$password',id_spp='$id_spp' WHERE nisn='$nisn'";
$query = mysqli_query($koneksi, $sql);
if($query){
    echo"<script>alert('Data Berhasil Tersimpan'); window.location.assign('?url=siswa');</script>";    
}else{
    echo"<script>alert('Maaf Data Anda Belum Tersimpan'); window.location.assign('?url=siswa');</script>";
}


