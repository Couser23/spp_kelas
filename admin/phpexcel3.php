<?php
include'../koneksi.php';

$csvFile = 'excel/xlstocsv.csv';

$file = fopen($csvFile, 'r');
if (!$file) {
    die("Gagal membuka file CSV");
}

$isFirstRow = true;

while (($data = fgetcsv($file)) !== false) {
    if ($isFirstRow) {
        $isFirstRow = false;
        continue; // Lewati baris pertama (header)
    }

    // Proses data dalam setiap baris
    $column0 = $data[0];
    $column1 = $data[1];
    $column2 = $data[2];
    $column3 = $data[3];
    $column4 = $data[4];
    $column5 = $data[5];
    $column6 = $data[6];
    $k = "13";
$q = "7";
    // ... dan seterusnya

    // Eksekusi query INSERT ke database SQL
    $query = "INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, no_ortu, password, id_spp) VALUES ('$column0', '$column1', '$column2', '$q', '$column3', '$column4', '$column5', '$column6', '$k')";

    // Eksekusi query menggunakan mysqli_query()
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if (!$result) {
        echo "Gagal mengeksekusi query: " . mysqli_error($koneksi);
    }
}
fclose($file);
// mysqli_close($connection);

?>