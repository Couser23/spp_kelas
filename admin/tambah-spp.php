<h5>Halaman Tambah Data SPP</h5>
<a href="?url=spp" class="btn btn-primary"> Kembali </a>
<hr>
<form method="post" action="?url=proses-tambah-spp" autocomplete="off">
    <div class="form-group mb-2">
        <label>Angkatan</label>
        <input type="text" placeholder="YYYY - YYYY" name="tahun" maxlength="12" pattern="\d{4}\s-\s\d{4}" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input type="number" name="nominal" maxlength="13" class="form-control" required>
    </div>
    
    <div class="form-group mb-2">
        <label>Total</label>
        <input type="number" name="total" maxlength="13" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> Simpan </button>
        <button type="reset" class="btn btn-warning"> Kosongkan </button>
    </div>
</form>