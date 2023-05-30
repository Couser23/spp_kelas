<?php
$nisn = $_GET['nisn'];
include'../koneksi.php';
?>
<h5>History Pembayaran</h5>
<a href="?url=pembayaran" class="btn btn-primary"> Kembali </a>
<hr>
<div style="width : 1200px; overflow-x: auto;">
<table class="table table-striped table-bordered" style="width: 100%;">
<?php
// contoh query untuk mendapatkan data terpanjang dari kolom "nama" dan "alamat"
$queryleng = "SELECT MAX(LENGTH(nama)) as max_nama FROM siswa";
$resultleng = mysqli_query($koneksi, $queryleng);
$dataleng = mysqli_fetch_assoc($resultleng);
$max_nama = intval($dataleng['max_nama']) * 9;

?>
<thead>
    <tr class="fw-bold">
        <th>No</th>
        <th>NISN</th>
        <th style="width: <?php echo $max_nama; ?>px;">Nama</th>
        <th>Kelas</th>
        <th>Tahun SPP</th>
        <th>SPP Selama Setahun</th>
        <th>Sudah Dibayar</th>
        <th>Bulan Dibayar</th>
        <th>Tanggal Bayar</th>
        <th>Metode</th>
        <th>Bukti Bayar</th>
        <th>Petugas</th>
        <th>Status</th>
    </tr>
</thead>
    <?php
    include'../koneksi.php';
    $no = 1;
    $STST = "Lunas";
    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' AND pembayaran.stat='$STST' ORDER BY tgl_bayar DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ 
        ?>  
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['tahun'] ?></td>
            <td><?= number_format($data['nominal'],2,',',','); ?></td>
            <td><?= number_format($data['jumlah_bayar'],2,',',','); ?></td>
            <td><?= $data['bulan_dibayar'] ?></td>
            <td><?= $data['tgl_bayar'] ?></td>
            <td><?= $data['metode'] ?></td>
            <td> <?php if($data['upload'] === "null") { echo "Lewat Petugas"; ?><?php } else { ?> <a href="../gambar/<?php echo $data['upload']; ?>"><img src="../gambar/<?php echo $data['upload']; ?>" width="35" height="40"></a><?php } ?></td> 
            <td><?= $data['nama_petugas'] ?></td>
            <td>
                <?php if($data['stat'] === "Lunas"){
                    $Lu = "bg-success";
                } else if ($data['stat'] === "Pending"){$Lu = "bg-warning";} ?> 
                <span class='badge <?= $Lu ?> px-3 py-3'><?= $data['stat'] ?></span></td> 
        </tr> 
    <?php } ?>
</table>
</div>