<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="add.css?v=<?php echo time(); ?>">
    <title>Tambah Akun</title>
</head>
<body>
    <div class="container">
        <div class="box from-box">
            <header>Tambah Akun</header>
            <form action="add.php" method="post">
                <div class="field-input">
                    <i data-feather="user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div><br>
                <div class="field-input">
                    <i data-feather="lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div><br>
                <div class="field-input">
                    <i data-feather="award"></i><br>
                    <select name="level" id="level">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div><br>
                <div class="field">
                    <a href="add.php"><button class="btn">Tambah Akun</button></a>
                </div>
            </form>
        </div>
    </div>
    <script>
        feather.replace();
      </script>
</body>
</html>