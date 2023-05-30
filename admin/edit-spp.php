<?php
$id_spp = $_GET['id_spp'];
include'../koneksi.php';
$sql = "SELECT*FROM spp WHERE id_spp='$id_spp'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data SPP</h5>
<a href="?url=spp" class="btn btn-primary"> Kembali </a>
<hr>
<form method="post" action="?url=proses-edit-spp&id_spp=<?= $id_spp; ?>" autocomplete="off">
    <div class="form-group mb-2">
        <label>Tahun</label>
        <input readonly value="<?= $data['tahun'] ?>" type="text" name="tahun" maxlength="10" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input value="<?= $data['nominal'] ?>" type="number" name="nominal" maxlength="13" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Total</label>
        <input value="<?= $data['total'] ?>" type="number" name="total" maxlength="13" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> Simpan </button>
        <button type="reset" class="btn btn-warning"> Kosongkan </button>
    </div>
</form>