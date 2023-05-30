<?php 
$file = "data2.csv";
$excel_path = 'C:\Program Files\Microsoft Office\root\Office16\EXCEL.EXE';
$command = '"' . $excel_path . '" "' . $file . '"'; 
$output = shell_exec($command);

echo $output;
?>