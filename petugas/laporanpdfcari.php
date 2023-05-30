<?php
session_start();
?>
<html>
<head>
  <title>Laporan Pembayaran SPP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<style>
    table, th, td{
        font-size: 16px;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>
<img src="..\images\prov.jpg" style="float:Left; height: 60px;">
<img src="..\images\Logo.png" style="float:Right; height: 60px;">
<div style="margin-left: 20px;">
    <center>
    <div style="font-size: 18px;"> Laporan Pembayaran </div>
    <div style="font-size: 28px;"> SMK Negeri 02 Singosari </div>
</div>
<div class="container">
			<h2>Laporan Pembayaran SPP</h2>
				<div class="data-tables datatable-dark">
					
<table border="1" align="center" id="mauexport" class="table table-striped table-bordered">
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
    $STST = "Lunas";
    $sql = $_SESSION['noretri'];
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

					
</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
<script>
  window.print();
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>