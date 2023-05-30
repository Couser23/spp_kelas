<?php
$Stst = "Pending";
?>
<h5>Verifikasi</h5>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Tahun SPP</td>
        <td>Jumlah Dibayar</td>
        <td>Status</td>
        <td>Bulan Bayar</td>
        <td>Tanggal Bayar</td>
        <td>Metode</td>
        <td>Bukti Bayar</td>
        <td>Petugas</td>
        <td>Aksi</td>
    </tr>
    <?php
    include'../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.Status = '$Stst' ORDER BY tgl_bayar DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ 
        // $
        ?>  
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['tahun'] ?></td>
            <td><?= $data['jumlah_bayar'] ?></td>
            <td>
                <?php if($data['Status'] === "Lunas"){
                    $Lu = "bg-success";
                } else if ($data['Status'] === "Pending"){$Lu = "bg-warning";} ?> 
                <span class='badge <?= $Lu ?> px-3 py-3'><?= $data['Status'] ?></span></td>
            <td><?= $data['bulan_dibayar'] ?></td>
            <td><?= $data['tgl_bayar'] ?></td>
            <td><?= $data['metode'] ?></td>
            <td><a target="_blank" href="../gambar/<?php echo $data['upload']; ?>"><img src="../gambar/<?php echo $data['upload']; ?>" width="35" height="40"></a></td>
            <td><?= $data['nama_petugas'] ?></td>
            <td><button onclick="if (window.confirm('Apakah Transaksi Valid ?')) { window.location.assign('?url=proses-verif-berhasil&id_byr=<?= $data['id_pembayaran'] ?>')
            } else { window.location.assign('?url=proses-verif-tolak&id_byr=<?= $data['id_pembayaran'] ?>')}" class="btn btn-primary">Verifikasi</button></td>
        </tr> 
    <?php } ?>
</table>
<script>
    function Pilih() {
        var result = confirm("Pilih opsi: Ya, Tidak, atau Batal");
if (result === true) {
  alert("Anda memilih Ya!");
  // Tambahkan kode untuk tindakan jika memilih "Ya" di sini
} else if (result === false) {
  alert("Anda memilih Tidak!");
  // Tambahkan kode untuk tindakan jika memilih "Tidak" di sini
} else {
  alert("Anda memilih Batal!");
  // Tambahkan kode untuk tindakan jika memilih "Batal" di sini
}

    }
</script>