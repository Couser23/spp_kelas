<?php
require '../vendor/autoload.php'; // Mengimpor autoload.php dari PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

$inputFile = 'F:\aaa.xlsx';
$outputFile = 'F:\aaa.csv';

// Membaca file XLSX
$spreadsheet = IOFactory::load($inputFile);

// Mengambil data dari sheet pertama
$worksheet = $spreadsheet->getActiveSheet();
$data = $worksheet->toArray();

// Membuka file CSV untuk ditulis
$file = fopen($outputFile, 'w');

// Menulis data ke file CSV
foreach ($data as $row) {
    fputcsv($file, $row);
}

// Menutup file CSV
fclose($file);

echo 'File XLSX berhasil diubah menjadi CSV.';
?>
