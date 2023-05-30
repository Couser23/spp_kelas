<?php 
include'../koneksi.php';
require '../vendor/autoload.php';
$id_petugas = $_SESSION['id_petugas'];
$id_byr = $_GET['id_byr'];
$stst = "Lunas";
$ssql = mysqli_query($koneksi, "SELECT siswa.*, pembayaran.* FROM siswa INNER JOIN pembayaran ON siswa.nisn = pembayaran.nisn where id_pembayaran = '$id_byr'"); 
while ($row = mysqli_fetch_array($ssql)) {
    // Mengakses kolom menggunakan indeks numerik
    $nma = $row['nama'];
    $nominal = $row['jumlah_bayar'];
    $bulsn = $row['bulan_dibayar'];
    $nortu = $row['no_ortu'];
}
//MPDF
$mpdf = new \Mpdf\Mpdf();

// Membaca konten HTML dari file atau variabel
$html = ' <html>      
<body>
<table width="600" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid #000;">  
<tr>  
  <td rowspan="6" width="100" style="border:1px solid #000;"> <img src="..\AdminLTE\dist\img\Logo_SMKN_2_Singosari-removebg.png" align="center" width="100px" ></td>  
  <td width="150" valign="top" ><b>  No Transaksi</td>  
  <td valign="top" ><b>  : '.$id_byr.'</td>  
</tr>  
<tr>  
  <td valign="top" ><b> Telah Diterima</b></td>  
  <td valign="top" ><b> : '.$nma.' </b> </td>  
</tr>  
<tr>  
  <td valign="top" > <b> Uang Sejumlah </b>  </td>  
  <td valign="top" ><b>  : '.$nominal.' </b> </td>  
</tr>  
<tr>  
 <td valign="top" ><b>  Untuk Pembayaran </b>  </td>  
  <td valign="top" ><b>  : SPP  Bulan '.$bulsn.'</b> </td>  
</tr>  
<tr>  
  <td valign="bottom"> <h3><b> Rp '.$nominal.' </b> </h3> </td>    
</tr>  
</table>  
</body>   
</html>';

// Menambahkan konten HTML ke mPDF
$mpdf->WriteHTML($html);

// Simpan file PDF ke server atau keluarkan ke browser
$mpdf->Output('../admin/excel/kwitansi.pdf');



$instance='instance48569';
$token='3ym15m9j7jw83pkl';
$to= $nortu;
/////////// 
$path="../admin/excel/kwitansi.pdf";
$data = file_get_contents($path);
// you can convert File to Base64  using ultramsg UI
// https://user.ultramsg.com/app/base64/base64.php 

//Encodes data base64
$img_base64 =  base64_encode($data);  
//urlencode — URL-encodes string  
$img_base64 =urlencode($img_base64 );
////////////
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/$instance/messages/document",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYHOST =>0,
  CURLOPT_SSL_VERIFYPEER =>0,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "token=$token&to=$to&document=$img_base64&filename=ultramsg.pdf",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo"<script>alert('SPP Gagal Terbayar! Coba cek API atau Ulangi Lagi!'); window.location.assign('?url=verifikasi');</script>";
} else {
    $sql1 = mysqli_query($koneksi, "UPDATE pembayaran SET id_petugas = '$id_petugas', Status = '$stst' WHERE id_pembayaran = '$id_byr' ");
    echo"<script>alert('SPP Berhasil Terbayar'); window.location.assign('?url=verifikasi');</script>";
}
 ?>