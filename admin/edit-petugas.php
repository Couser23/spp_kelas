<?php
$id_petugas = $_GET['id_petugas'];
include'../koneksi.php';
$sql = "SELECT*FROM petugas WHERE id_petugas='$id_petugas'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Tambah Petugas</h5>
<a href="?url=petugas" class="btn btn-primary"> Kembali </a>
<hr>
<form method="post" action="?url=proses-edit-petugas&id_petugas=<?= $id_petugas; ?>" autocomplete="off">
    <div class="form-group mb-2">
        <label>Username</label>
        <input value="<?= $data['username'] ?>" type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input value="<?= $data['password'] ?>" type="text" name="password" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input value="<?= $data['nama_petugas'] ?>" type="text" name="nama_petugas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Level</label>
        <input type="text" value="petugas" name="petugas" class="form-control" disabled >
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> Simpan </button>
        <button type="reset" class="btn btn-warning"> Kosongkan </button>
    </div>
</form>