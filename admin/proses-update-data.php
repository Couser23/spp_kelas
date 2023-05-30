<?php

$ID_Auth = $_GET['id_update'];
$Rek = $_POST['Rek'];
$Qris = $_FILES['Qris']['name'];
$file_tmp = $_FILES['Qris']['tmp_name'];
$tmp_file_permanent = "../qris/".$Qris;
move_uploaded_file($file_tmp, $tmp_file_permanent);

include'../koneksi.php';

if ($_FILES['Qris']['name'] == "") {
    $sql = "UPDATE auth SET Rek='$Rek' WHERE ID_Auth='$ID_Auth'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        // echo"<script>alert('Update Data Berhasil'); window.location.assign('?url=update');</script>";
    } else {
        echo"<script>alert('Update Data Gagal, Silahkan Coba Kembali'); window.location.assign('?url=update_data');</script>";
    }
} else {
    $sql = "UPDATE auth SET Rek='$Rek',Qris='$Qris' WHERE ID_Auth='$ID_Auth'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        // echo"<script>alert('Update Data Berhasil'); window.location.assign('?url=update');</script>";
    } else {
        echo"<script>alert('Update Data Gagal, Silahkan Coba Kembali'); window.location.assign('?url=update_data');</script>";
    }
}
?>