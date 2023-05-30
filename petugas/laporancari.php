<?php 
include'../koneksi.php';
?>
<p>Kelas </p><br>
<form method="POST" action="petugas.php?url=proses-laporan-kelas">
<select name="klz"><?php
$query = "SELECT * FROM kelas";
$result = mysqli_query($koneksi, $query);

// Mengisi array dengan data dari database
$data_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data_array[] = $row;
}
	     foreach ($data_array as $data) { ?>
            <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['nama_kelas']; ?></option>
        <?php } ?>
</select><br>

<p>Tahun</p>
<select name="tahun">
<?php
$query = "SELECT * FROM spp";
$result = mysqli_query($koneksi, $query);

// Mengisi array dengan data dari database
$data_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data_array[] = $row;
}
	     foreach ($data_array as $data) { ?>
            <option value="<?php echo $data['id_spp']; ?>"><?php echo $data['tahun'] ." - ". $data['nominal'] ?></option>
        <?php } ?>
</select>
<button type="submit">Kirim</button>
</form>