<?php
$nisn = $_GET['nisn'];
?>
<h5>History Pembayaran</h5>
<a href="?url=pembayaran" class="btn btn-primary"> Kembali </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Tahun SPP</td>
        <td>SPP Selama Setahun</td>
        <td>Sudah Dibayar</td>
        <td>Bulan Dibayar</td>
        <td>Tanggal Bayar</td>
        <td>Metode</td>
        <td>Bukti Bayar</td>
        <td>Petugas</td>
    </tr>
    <?php
    include'../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER BY tgl_bayar DESC";
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
            <td><a href="../gambar/<?php echo $data['upload']; ?>"><img src="../gambar/<?php echo $data['upload']; ?>" width="35" height="40"></a></td>
            <td><?= $data['nama_petugas'] ?></td>
        </tr> 
    <?php } ?>

</table>