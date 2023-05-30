<div class="callout callout-danger">
        <h5>Pemberitahuan!</h5>

        <p>Silahkan download template yang tertera dibawah ini, untuk menambah list nama siswa</p>
</div>
<h5>Halaman Data Siswa</h5>
<a href="?url=tambah-siswa" class="btn btn-primary"> Import Data Siswa </a>
<a href="template2.csv" type="application/vnd.ms-excel" class="btn btn-primary"> Template Excel </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>NIS</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Alamat</td>
        <td>No Telpon</td>
        <td>SPP</td>
        <td>No. Ortu</td>
        <td>Password</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include'../koneksi.php';
    
    $batas = 15;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    $no = $halaman_awal+1;
    $previous = $halaman - 1;
    $next = $halaman + 1;
    
    $data = mysqli_query($koneksi,"select * from siswa");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    $sql = "SELECT*FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER By nama ASC limit $halaman_awal, $batas";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ ?>  
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn'] ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['no_telp'] ?></td>
            <td><?= $data['tahun'] ?> - <?= number_format($data['nominal'],2,',',','); ?></td>
            <td><?= $data['no_ortu'] ?></td>
            <td><?= $data['password'] ?></td>
            <td>
                <a href="?url=edit-siswa&nisn=<?= $data['nisn'] ?>" class='btn btn-warning'>Edit</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="?
                url=hapus-siswa&nisn=<?= $data['nisn'] ?>" class='btn btn-danger'>Hapus</a>
            </td>
        </tr> 
    <?php } ?>

</table><br>
<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?url=siswa&halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?url=siswa&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?url=siswa&halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>