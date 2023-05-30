<?php
$ID_Auth = $_GET['update'];
include'../koneksi.php';
$sql = "SELECT * FROM auth WHERE ID_Auth='$ID_Auth'";
  $query = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);
?>
<h5>Update Data</h5>
<a href="?url=update" class="btn btn-primary"> Kembali </a>
<hr>
<form method="post" action="?url=proses-update-data&id_update=<?= $ID_Auth ?>" enctype="multipart/form-data">
<label for="qris">Gambar QRIS:</label>
  <input type="file" name="Qris" value="<?= $data['Qris']; ?>" id="qris" class="mt-3">
  <br>
  <label for="nomor_rekening">Nomor Rekening:</label>
  <input type="text" name="Rek" value="<?= $data['Rek']; ?>" id="nomor_rekening">
  <br>
  <div class="form-group">
    <button type="submit" class="btn btn-success">Update</button>
  </div>
</form>