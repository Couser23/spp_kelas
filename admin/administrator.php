<div class="callout callout-danger">
        <h5>Pemberitahuan!</h5>

        <p>Admin adalah petugas yang memiliki hak akses penuh pada aplikasi ini , 
        mengakses data Admin sama dengan mengakses data petugas yang bersangkutan!</p>
</div>
<h5>Halaman Data Petugas</h5>
<a href="?url=tambah-admin" class="btn btn-primary"> Tambah Admin </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Username</td>
        <td>Password</td>
        <td>Nama Petugas</td>
        <td>Level</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include'../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM petugas WHERE level = 'admin' ORDER BY id_petugas DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ ?>  
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['password'] ?></td>
            <td><?= $data['nama_petugas'] ?></td>
            <td><?= $data['level'] ?></td>
            <td>
                <a href="?url=edit-admin&id_petugas=<?= $data['id_petugas'] ?>" class='btn btn-warning'>Edit</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="?
                url=hapus-admin&id_petugas=<?= $data['id_petugas'] ?>" class='btn btn-danger'>Hapus</a>
            </td>
        </tr> 
    <?php } ?>

</table>