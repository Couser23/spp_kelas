<?php 
    include'../koneksi.php';
// $nama_kelas = "12 RPL 3";
?>
<h5>Laporan Tiap Kelas</h5>
<hr>
<?php
$queryCombo = "SELECT id_kelas, nama_kelas FROM kelas";
$resultCombo = mysqli_query($koneksi, $queryCombo);
?>
<form method="POST" action="">
<select class="form-select form-select-lg mb-3" name="Kelas" id="Kelas" onChange="ambilData()">
  <?php
  while ($rowCombo = mysqli_fetch_assoc($resultCombo)) {
    echo "<option value='" . $rowCombo['nama_kelas'] . "'>" . $rowCombo['nama_kelas'] . "</option>";
  }
  ?>
</select>
<button type="submit" class="btn btn-secondary">cari</button><br><br>
</form>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Tahun SPP</td>
        <td>Nominal Dibayar</td>
        <td>Sudah Dibayar</td>
        <td>Kekurangan</td>
        <td>Status</td>
        <td>Lihat & Cetak</td>
    </tr>
    <?php

    $batas = 15;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    $no = $halaman_awal+1;
    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data1 = mysqli_query($koneksi,"select * from kelas");
    $jumlah_data = mysqli_num_rows($data1);
    $total_halaman = ceil($jumlah_data / $batas);
    error_reporting(0);
    // $no = 1;
    $Stst = "Lunas";
    $_SESSION['cari_nisn'] = $_POST['cari'];
    $cariNISN = $_SESSION['cari_nisn'];

    if(isset($_POST['Kelas'])){
        $nama_kelas = $_POST['Kelas'];
        $query = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nama_kelas = '$nama_kelas' ORDER By nama ASC limit $halaman_awal, $batas";
    }else {
        $query = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER By nama ASC limit $halaman_awal, $batas";
    }
    // $sql = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER By nama ASC";
    $result = mysqli_query($koneksi, $query);
    foreach($result as $data){ 
        $data_pembayaran =  mysqli_query($koneksi,"SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]' AND Status = '$Stst'");
        $data_pembayaran = mysqli_fetch_array($data_pembayaran);
        $sudah_bayar = $data_pembayaran['jumlah_bayar'];
        $kekurangan = $data['nominal']-$data_pembayaran['jumlah_bayar'];
        ?>  
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['tahun'] ?></td>
            <td><?= number_format($data['nominal'],2,',',','); ?></td>
            <td><?= number_format($sudah_bayar,2,',',','); ?></td>
            <td><?= number_format($kekurangan,2,',',','); ?></td>
            <td>
                <?php
                if($kekurangan==0){
                    echo"<span class='badge bg-success px-3 py-3'> Sudah Lunas </span>";
                }else{
                    echo"<span class='badge bg-danger px-3 py-3'> Belum Lunas </span>";
                ?>
                <?php } ?>
            </td>
            <td>
                <a href="?url=laporan_hasil&nisn=<?= $data['nisn'] ?>" class='btn btn-info'>Lihat & Cetak</a>
            </td>
        </tr> 
    <?php } ?>

</table>
<br>
<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?url=laporan&halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?url=laporan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?url=laporan&halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>

