<?php
session_start();
require 'koneksi.php';
$jenis_ruangan = $_POST['jenis_ruangan'];
$pelayanan = $_POST['pelayanan'];
$jumlah_kamar = $_POST['jumlah_kamar'];
$banyak_orang = $_POST['banyak_orang'];
$harga = $_POST['harga'];

$query_sql = mysqli_query ($mysqli,"INSERT INTO hotel (jenis_ruangan, pelayanan, jumlah_kamar, banyak_orang, harga)
VALUES ('$jenis_ruangan', '$pelayanan', '$jumlah_kamar', '$banyak_orang', '$harga')");

if($query_sql) {
    header("location:../explore.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($mysqli);
}