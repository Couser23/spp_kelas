<?php
session_start();
require_once '../koneksi.php';

if (isset($_POST['validasi_report'])) {
    //inisialisasi
    $id = $_POST['id_pembayaran'];
    $status_verifikasi = 'proses';

    //update status
    $query = "UPDATE verifikasi_spp SET status = '$status_verifikasi' WHERE id_pembayaran = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pembayaran berhasil divalidasi')
                setTimeout(function() {
                    window.location = '../pembayaran';
                }, 0);
                </script>";
    }else{
        echo "<script>
        alert('Pembayaran Gagal diValidasi, Silahkan coba kembali')
        setTimeout(function() {
            window.location = '../pembayaran';
        }, 0);
        </script>";
    }
}elseif (isset($_POST['pembayaran_ditolak'])) {
    //inisialisasi
    $id = $_POST['id_pembayaran'];
    $status_verifikasi = '0';

    //update status
    $query = "UPDATE verifikasi_spp SET status = '$status_verifikasi' WHERE id_pembayaran = '$id'";

    if  (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pembayaran berhasil ditolak')
                setTimeout(function() {
                    window.location = '../pembayaran';
                }, 0);
                </script>";
    }else{
        echo "<script>
                alert('Pembayaran berhasil ditolak')
                setTimeout(function() {
                    window.location = '../pembayaran';
                }, 0);
                </script>";
    }
}else {
    echo "<script>
                alert('Pembayaran berhasil ditolak')
                setTimeout(function() {
                    window.location = '../pembayaran';
                }, 0);
        </script>";
}

?>