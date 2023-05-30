<?php
$nisn = $_GET['nisn'];
?>
<style>
    #judul{
        text-align:center;
        font-size:16px;
        font-weight:bold;
        margin-bottom:20px;
    }
    table{
        border-collapse:collapse;
    }
    th{
        padding:5px;
        text-align:center;
    }
    td{
        padding-left:5px;
        padding-right:5px;
    }
</style>
<div id="judul">Laporan Pembayaran SPP</div>
<p align="left">
    <a href="?url=laporan" class="btn btn-primary"> Kembali </a>
</p>

<p align="right">
    <a href="laporan-cetak.php?nisn=<?= $nisn ?>" value="Export" class="btn btn-primary"> PDF </a>
    <a href="cetak-laporan-word.php?nisn=<?= $nisn ?>" value="Export" class="btn btn-primary"> Word </a>
</p>

<table border="1" align="center" id="mauexport" class="table table-striped table-bordered">
    <tr>
        <th width="50">No</th>
        <th width="100">NISN</th>
        <th width="200">Nama</th>
        <th width="100">Kelas</th>
        <th width="100">Tahun SPP</th>
        <th width="100">Nominal Dibayar</th>
        <th width="100">Sudah Dibayar</th>
        <th width="100">Bulan Dibayar</th>
        <th width="100">Tanggal Bayar</th>
        <th width="100">Petugas</th>
        <th width="100">Cetak</th>
</tr>
<?php
    include'../koneksi.php';
    $no = 1;
    $STST = "Lunas";
    $sql = "SELECT*FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' AND pembayaran.Status='$STST' ORDER BY tgl_bayar DESC";
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
            <td><?= $data['nama_petugas'] ?></td>
            <td><a href="laporan-cetaksatu.php?idtrans=<?= $data['id_pembayaran'] ?>" target="_blank" class="btn btn-success">pdf</a></td>
        </tr> 
    <?php } ?>
</table>
