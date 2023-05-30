<?php
include '../koneksi.php';

$nisn = $_GET['nisn'];
$sql = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$data_pembayaran = mysqli_query($koneksi, "SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]'");
$data_pembayaran2 = mysqli_fetch_array($data_pembayaran);
$sudah_bayar = intval($data['total']);
$ssd = intval($data['nominal']);
$kekurangan = intval($data['total']) - intval($data_pembayaran2['jumlah_bayar']);

$months = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$sql1 = "SELECT * FROM `pembayaran` WHERE nisn = $nisn";
$query1 = mysqli_query($koneksi, $sql1);
$data1 = mysqli_fetch_array($query1);

$sql_qris = "SELECT * FROM `auth` WHERE 1";
$query_qris = mysqli_query($koneksi, $sql_qris);
$data_qris = mysqli_fetch_array($query_qris);

?>
<h5>Halaman Pembayaran SPP</h5>
<a href="?url=pembayaran" class="btn btn-primary"> Kembali </a>
<hr>
<form method="post" action="?url=proses-tambah-pembayaran&nisn=<?= $nisn; ?>" autocomplete="off">
    <input name="id_spp" value="<?= $data['id_spp'] ?>" type="hidden" class="form-control" required>
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input value="<?= $_SESSION['nama_petugas'] ?>" disabled name="nama_kelas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NISN</label>
        <input readonly name="nisn" value="<?= $data['nisn'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kelas</label>
        <input readonly name="kelas" value="<?= $data['nama_kelas'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Siswa</label>
        <input disabled value="<?= $data['nama'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tanggal Bayar</label>
        <input disabled type="text" value="Otomatis terisi Hari ini" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Bulan Bayar</label>
        <select name="bulan_dibayar" class="form-control" required>
            <option value=""> Pilih Bulan Dibayar </option>
            <option value="Januari"> Januari </option>
            <option value="Februari"> Februari </option>
            <option value="Maret"> Maret </option>
            <option value="April"> April </option>
            <option value="Mei"> Mei </option>
            <option value="Juni"> Juni </option>
            <option value="Juli"> Juli </option>
            <option value="Agustus"> Agustus </option>
            <option value="September"> September </option>
            <option value="Oktober"> Oktober </option>
            <option value="November"> November </option>
            <option value="Desember"> Desember </option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Tahun Angkatan</label>
        <input readonly name="Tahunn" type="text" value="<?= $data['tahun'] ?>" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Jumlah Bayar (Jumlah yang harus dibayar adalah <b><?= number_format($kekurangan, 2, ',', '.') ?></b>)</label>
        <input readonly type="number" name="jumlah_bayar" value="<?= $ssd ?>" class="form-control" min="0" required>
    </div>
    <label>Metode</label>
    <div class="radio-buttons">
        <label class="custom-radio">
            <input type="radio" name="metode" value="QRIS" onclick="qq()" required/>
            <span class="radio-btn"><i class="las la-check"></i>
                <div class="hobbies-icon">
                    <i class="las la-qrcode"></i>
                    <h3>QRCode</h3>
                </div>
            </span>
        </label>
        <label class="custom-radio">
            <input type="radio" name="metode" value="Transfer Bank" onclick="bank()" required/>
            <span class="radio-btn"><i class="las la-check"></i>
                <div class="hobbies-icon">
                    <i class="fas fa-wallet"></i>
                    <h3>Transfer Bank</h3>
                </div>
            </span>
        </label>
        <label class="custom-radio">
            <input type="radio" name="metode" value="Cash" required/>
            <span class="radio-btn"><i class="las la-check"></i>
                <div class="hobbies-icon">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h3>Cash</h3>
                </div>
            </span>
        </label>
    </div>
    <!-- Pop-up QRIS -->
    <div class="modal fade" id="qris" role="dialog">
        <div class="modal-dialog">
            <!-- Konten QRIS -->
            <div class="modal-content">
                <!-- Header QRIS -->
                <div class="modal-header">
                    <h4 class="modal-title">Silahkan Scane QRIS Dibawah ini</h4>
                </div>
                <!-- Body QRIS -->
                <div class="modal-body">
                    <img src="../qris/<?php echo $data_qris['Qris']; ?>" alt="gambar" width="465" height="450">
                </div>
                <div class="modal-body">
                    <h4 align="center">Silahkan Scane Disini ya</h4>
                </div>
                <!-- Footer QRIS -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop-up Bank -->
    <div class="modal fade" id="bank" role="dialog">
        <div class="modal-dialog">
            <!-- Konten Bank -->
            <div class="modal-content">
                <!-- Header Bank -->
                <div class="modal-header">
                    <h4 class="modal-title">Berikut Bank Kami</h4>
                </div>
                <!-- Body Bank -->
                <div class="modal-body">
                    <p><?= $data_qris['Rek'] ?></p>
                </div>
                <!-- Footer Bank -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> Proses </button>
        <button type="reset" class="btn btn-warning"> Kosongkan </button>
    </div>
</form>