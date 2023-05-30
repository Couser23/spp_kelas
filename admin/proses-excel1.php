<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_spp2";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendefinisikan nama dan lokasi file CSV
$csvFile = "data2.csv";

// Membuka file CSV
$file = fopen($csvFile, "r");

// Membaca baris pertama sebagai header kolom
$headers = fgetcsv($file);

// Membaca dan menyisipkan data dari setiap baris dalam file CSV
while (($data = fgetcsv($file)) !== FALSE) {
    // Membangun query SQL untuk menyisipkan data ke dalam tabel
    $sql = "INSERT INTO siswa (" . implode(',', $headers) . ") VALUES ('" . implode("','", $data) . "')";

    // Menjalankan query SQL
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diunggah ke database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup file CSV
fclose($file);

// Menutup koneksi database
$conn->close();
?>
