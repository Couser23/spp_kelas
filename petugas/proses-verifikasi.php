<?php
include'../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // ambil nilai dari form
  $nomor_rekening = $_POST['nomor_rekening'];
  $qris = $_FILES['qris']['name'];
  $qris_tmp = $_FILES['qris']['tmp_name'];

  // simpan gambar QRIS ke direktori yang diinginkan
  move_uploaded_file($qris_tmp, "direktori/" . $qris);

  // lakukan proses update nomor rekening dan gambar QRIS di database
  // ...

  // tampilkan pesan sukses
  echo "Data berhasil diupdate!";
}
?>
