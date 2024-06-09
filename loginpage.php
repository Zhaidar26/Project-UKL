<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kredensial pengguna
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id_user'] = $user['id_user']; // Pastikan ini sesuai dengan kolom id di tabel users
        echo "Session ID berhasil diset: " . $_SESSION['id_user'];
        header("Location: project/explore.php");
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="login/login.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="box from-box">
        <header>Login</header>
        <form action="" method="post">
          <div class="field-input">
            <i data-feather="user"></i>
            <input type="text" name="username" placeholder="Username" required
            />
          </div>
          <br/>
          <div class="field-input">
            <i data-feather="lock"></i>
            <input type="password" name="password" placeholder="Password" required/>
          </div>
          <br/>
          <div class="field">
            <a href="login/login.php"><button class="btn">Login</button></a>
          </div>
          <div class="links">
            Belum punya akun? <a href="register/registerpage.php">Register</a>
          </div>
        </form>
      </div>
    </div>
    <script>
      feather.replace();
    </script>
  </body>
</html>
