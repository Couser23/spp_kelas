<h5>Halaman Tambah Data Kelas</h5>
<a href="?url=kelas" class="btn btn-primary"> Kembali </a>
<hr>
<form method="post" action="?url=proses-tambah-kelas" autocomplete="off">
    <div class="form-group mb-2">
        <label>Nama Kelas</label>
        <input type="text" name="nama_kelas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kompetensi Keahlihan</label>
        <select name="kompetensi_keahlian" class="form-control" required>
            <option value=""> Silahkan Pilih Kelas </option>
            <option value="Rekayasa Perangkat Lunak"> Rekayasa Perangkat Lunak </option>
            <option value="Desain Komunikasi Visual"> Desain Komunikasi Visual </option>
            <option value="Teknik Komputer Dan Jaringan"> Teknik Komputer Dan Jaringan </option>
            <option value="Elektronika Industri"> Elektronika Industri </option>
            <option value="Mekatronika"> Mekatronika </option>
            <option value="Audio Video"> Audio Video </option>
            <option value="Animasi"> Animasi </option>
            <option value="Broadcasting"> Broadcasting </option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> Simpan </button>
        <button type="reset" class="btn btn-warning"> Kosongkan </button>
    </div>
</form>