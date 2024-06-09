<?php
session_start();
require 'koneksi.php';
$username = $_POST['username'];
$tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$tujuan = $_POST['tujuan'];
$transportasi = $_POST['transportasi'];

$query_sql = mysqli_query ($mysqli,"INSERT INTO booking (username, tanggal_keberangkatan, tanggal_kembali, tujuan, transportasi)
VALUES ('$username', '$tanggal_keberangkatan', '$tanggal_kembali', '$tujuan', '$transportasi')");

if($query_sql) {
    header("location:hotelpage.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($mysqli);
}