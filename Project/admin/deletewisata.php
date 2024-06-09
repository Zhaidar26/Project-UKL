<?php
include 'koneksi.php';

$id_wisata = $_GET['id'];

$hapus = mysqli_query($mysqli, "DELETE FROM wisata WHERE id_wisata = '$id_wisata'") or die(mysqli_error($mysqli));

if($hapus) {
    header("location: wisata.php");
    exit();
}else{
    echo "Gagal menghapus user";
}
?>