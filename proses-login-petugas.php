<?php

$username = $_POST['username'];
$password = $_POST['password'];

include 'koneksi.php';
$sql = "SELECT*FROM petugas WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query)>0){
    $data = mysqli_fetch_array($query);
    session_start();
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['nama_petugas'] = $data['nama_petugas'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['cari_nisn'] = "";
    if($data['level']=='admin'){
        // header('Location:admin/admin.php');
    echo"<script>
    alert('Yeay!, Login Berhasil'); 
    window.location.assign('admin/admin.php');
    </script>";
    }elseif($data['level']=='petugas'){
        // header('Location:petugas/petugas.php');
    echo"<script>
    alert('Yeay!, Login Berhasil'); 
    window.location.assign('petugas/petugas.php');
    </script>";
    }
}else{
    echo"<script>
    alert('Maaf Login Gagal, Silahkan Cek Password atau Username dengan benar'); 
    window.location.assign('index2.php');
    </script>";
}