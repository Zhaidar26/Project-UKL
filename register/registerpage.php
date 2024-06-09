<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="register.css?v=<?php echo time(); ?>">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box from-box">
            <header>Register</header>
            <form action="register.php" method="post">
                <div class="field-input">
                    <i data-feather="user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div><br>
                <div class="field-input">
                    <i data-feather="lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div><br>
                <div class="field">
                    <a href="register.php"><button class="btn">Register</button></a>
                </div>
                <div class="links">
                    Sudah punya akun? <a href="../loginpage.php">Login</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        feather.replace();
      </script>
</body>
</html>