<?php
session_start();
include 'koneksi.php';

$username = $_POST ['username'];
$password = $_POST ['password'];

$login = mysqli_query ($mysqli, "SELECT * FROM user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    if($data['level']=="user"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";

        header("location:../Project/explore.php");

    } else {
        header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php?pesan=gagal");
}