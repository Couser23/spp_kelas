<h5>Halaman Tambah Data Siswa</h5>
<a href="?url=siswa" class="btn btn-primary"> Kembali </a>
<br>
<form method="post" action="?url=proses-excel" enctype="multipart/form-data" autocomplete="off">
    <input type="file" name="filedata" accept=".xlsx" class="pull-left mt-3">
<hr>
    <div class="form-group mb-2">
        <label>Kelas</label>
        <select name="id_kelas" class="form-control" required>
            <option value=""> Pilih Kelas </option>
            <?php
            include '../koneksi.php';
            $kelas = mysqli_query($koneksi, "SELECT*FROM kelas ORDER BY nama_kelas ASC");
            foreach ($kelas as $data_kelas) {
            ?>
                <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-control" required>
            <option value=""> Pilih SPP </option>
            <?php
            include '../koneksi.php';
            $spp = mysqli_query($koneksi, "SELECT*FROM spp ORDER BY id_spp ASC");
            foreach ($spp as $data_spp) {
            ?>
                <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> | <?= number_format($data_spp['nominal'], 2, ',', ','); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <button type="submit" name="preview" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Upload</button>
        <!-- <button type="reset" class="btn btn-warning"> Kosongkan </button> -->
    </div>
</form>