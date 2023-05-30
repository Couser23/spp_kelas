<h5>Update Data</h5>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>QRIS</td>
        <td>Rekening</td>
        <td>Edit</td>
    </tr>
    <?php 
    include'../koneksi.php';
    $no = 1;
    $sql = "SELECT * FROM auth";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['Qris'] ?></td>
            <td><?= $data['Rek'] ?></td>
            <td>
                <a href="?url=update_data&update=<?= $data['ID_Auth'] ?>" class='btn btn-warning'>Edit</a>
            </td>
        </tr>
    <?php } ?>
</table>