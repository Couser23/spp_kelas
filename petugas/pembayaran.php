<h5>Halaman Pilih Data Siswa Untuk Pembayaran</h5>
<hr>
<form method="POST" action="" style="text-align: right;" autocomplete="off">
    <label>Pencarian : </label>
    <input type="int" name="cari" value="<?= $_SESSION['cari_nisn'] ?>">
</form>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>SPP</td>
        <td>Total</td>
        <td>Sudah Dibayar</td>
        <td>Kekurangan</td>
        <td>Status</td>
        <td>History</td>
    </tr>
    <?php
    include'../koneksi.php';

    $batas = 15;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    $no = $halaman_awal+1;
    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data1 = mysqli_query($koneksi,"select * from pembayaran");
    $jumlah_data = mysqli_num_rows($data1);
    $total_halaman = ceil($jumlah_data / $batas);
    error_reporting(0);
    // $no = 1;
    $_SESSION['cari_nisn'] = $_POST['cari'];
    $cariNISN = $_SESSION['cari_nisn'];

    if(!empty($_POST['cari'])){
        $query = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND siswa.nisn = '$cariNISN' ORDER By nama ASC limit $halaman_awal, $batas";
    }else {
        $query = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER By nama ASC limit $halaman_awal, $batas";
    }
    // $sql = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER By nama ASC";
    $result = mysqli_query($koneksi, $query);
    $STST = "Lunas";
    foreach($result as $data){ 
        $data_pembayaran = mysqli_query($koneksi,"SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]' AND stat='$STST'");
        $data_pembayaran = mysqli_fetch_array($data_pembayaran);
        $sudah_bayar = $data_pembayaran['jumlah_bayar'];
        $kekurangan = $data['total']-$data_pembayaran['jumlah_bayar'];
        ?>  
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['tahun'] ?></td>
            <td><?= number_format($data['total'],2,',',','); ?></td>
            <td><?= number_format($sudah_bayar,2,',',','); ?></td>
            <td><?= number_format($kekurangan,2,',',','); ?></td>
            <td>
                <?php
                if($kekurangan==0){
                    echo"<span class='badge bg-success px-3 py-3'> Sudah Lunas </span>";
                }else{ ?>
                    <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>" class="btn btn-danger"> Pilih & Bayar
                <?php } ?>
            </td>
            <td>
                <a href="?url=history-pembayaran&nisn=<?= $data['nisn'] ?>" class='btn btn-info'>History</a>
            </td>
        </tr> 
    <?php } ?>

</table>
<br>
<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?url=pembayaran&halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?url=pembayaran&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?url=pembayaran&halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>