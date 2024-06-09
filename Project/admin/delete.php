<?php
include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($mysqli, "DELETE FROM users WHERE id_user = '$id'") or die(mysqli_error($mysqli));

if($hapus) {
    header("location: admin.php");
    exit();
}else{
    echo "Gagal menghapus user";
}
?>