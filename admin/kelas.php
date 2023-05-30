<h5>Halaman Data Kelas</h5>
<a href="?url=tambah-kelas" class="btn btn-primary"> Tambah Kelas </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Kempetensi Keahlian</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include'../koneksi.php';
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    $no = $halaman_awal+1;
    $previous = $halaman - 1;
    $next = $halaman + 1;

    // $no = 1;
    $data1 = mysqli_query($koneksi,"select * from kelas");
    $jumlah_data = mysqli_num_rows($data1);
    $total_halaman = ceil($jumlah_data / $batas);
    $sql = "SELECT*FROM kelas ORDER BY id_kelas DESC limit $halaman_awal, $batas";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ ?>  
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['kompetensi_keahlian'] ?></td>
            <td>
                <a href="?url=edit-kelas&id_kelas=<?= $data['id_kelas'] ?>" class='btn btn-warning'>Edit</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="?
                url=hapus-kelas&id_kelas=<?= $data['id_kelas'] ?>" class='btn btn-danger'>Hapus</a>
            </td>
        </tr> 
    <?php } ?>

</table><br>
<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?url=kelas&halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?url=kelas&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?url=kelas&halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>