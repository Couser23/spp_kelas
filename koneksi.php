<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'spp_ta');

if(!$koneksi){
    echo"Koneksi Anda Gagal";
}