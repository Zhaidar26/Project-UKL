<?php
require 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "INSERT INTO users (username, password, level)
VALUES ('$username', '$password', 'user')";


if(mysqli_query($mysqli, $query_sql)) {
    header("location:../loginpage.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($mysqli);
}
