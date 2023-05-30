<?php

$nisn = $_POST['nisn'];
$password = $_POST['password'];

include'koneksi.php';
$sql = "SELECT*FROM siswa WHERE nisn='$nisn' AND password='$password'";
$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
    session_start();
    $data = mysqli_fetch_array($query);
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['nisn'] = $data['nisn'];
    $_SESSION['cari_nisn'] = "";
    echo"<script>
    alert('Yeay!, Login berhasil!'); 
    window.location.assign('siswa/siswa.php');
    </script>";
    // header('Location:siswa/siswa.php');
}else{
    echo"<script>
    alert('Maaf Anda Gagal Login, Silahkan Periksa Kembali NISN / Password');
    window.location.assign('index.php');
    </script>";
}
?>