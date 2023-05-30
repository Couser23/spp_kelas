<?php
include'../koneksi.php';
$nama_file = "excel/xlstocsv.csv";
$delimiter = ","; // Pemisah kolom dalam file CSV

$servername = "localhost";
$username = "root";
$pasd = "";
$dbname = "spp_db3";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pasd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil";
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

if (($handle = fopen($nama_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
        // Lakukan sesuatu dengan data, seperti memasukkan ke database
        // Contoh: $data[0] mengakses kolom pertama, $data[1] mengakses kolom kedua, dan seterusnya
    }
    fclose($handle);
}  
$k = "13";
$q = "7";
// Di dalam loop while fgetcsv()
$stmt = $conn->prepare("INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, no_ortu, password, id_spp) VALUES (:nilai1, :nilai2, :nilai3, :nilai4, :nilai5, :nilai6, :nilai7, :nilai8, :nilai9)");
$stmt->bindParam(':nilai1', $data[1]);
$stmt->bindParam(':nilai2', $data[2]);
$stmt->bindParam(':nilai3', $data[3]);
$stmt->bindParam(':nilai4', $q);
$stmt->bindParam(':nilai5', $data[4]);
$stmt->bindParam(':nilai6', $data[5]);
$stmt->bindParam(':nilai3', $data[6]);
$stmt->bindParam(':nilai8', $data[7]);
$stmt->bindParam(':nilai9', $k);
$stmt->execute();

?>