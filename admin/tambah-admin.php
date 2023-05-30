<h5>Halaman Tambah Petugas</h5>
<a href="?url=administrator" class="btn btn-primary"> Kembali </a>
<hr>
<form method="post" action="?url=proses-tambah-admin" autocomplete="off">
    <div class="form-group mb-2">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="text" name="password" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input type="text" name="nama_petugas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Level</label>
        <input type="text" value="admin" name="admin" class="form-control" disabled >
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> Simpan </button>
        <button type="reset" class="btn btn-warning"> Kosongkan </button>
    </div>
</form>