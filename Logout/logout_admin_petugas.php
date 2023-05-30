<?php
ob_start();
session_start();
session_destroy();

echo"<script>window.alert('Logout telah Berhasil!')
    window.location='../index2.php'</script>";
// header("Location:../index2.php");
?>