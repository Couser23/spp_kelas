<?php
header("Content-type: application/vnd-ms-word");
header("Content-Disposition: attachment; filename=Laporan-Pembayaran-SPP.doc");
$nisn = $_GET['nisn'];
?>
<style>
    table, th, td{
        font-size: 16px;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>
<img src="C:\xampp\htdocs\SPP_UKK\images\prov.jpg" style="float:Left; height: 60px;">
<img src="C:\xampp\htdocs\SPP_UKK\images\Logo.png" align="right">
<div style="margin-left: 20px;">
    <center>
    <div style="font-size: 18px;"> Laporan Pembayaran </div>
    <div style="font-size: 28px;"> SMK Negeri 02 Singosari </div>
</div>
<h5>Laporan Pembayaran SPP</h5>
<hr>
<table border="5" class="table table-striped table-bordered">
    <tr>
        <th width="50">No</th>
        <th width="100">NISN</th>
        <th width="200">Nama</th>
        <th width="100">Kelas</th>
        <th width="100">Tahun SPP</th>
        <th width="100">Nominal Dibayar</th>
        <th width="100">Sudah Dibayar</th>
        <th width="100">Tanggal Bayar</th>
        <th width="100">Petugas</th>
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
            <td><?= $data['tgl_bayar'] ?></td>
            <td><?= $data['nama_petugas'] ?></td>
        </tr> 
    <?php } ?>

</table>