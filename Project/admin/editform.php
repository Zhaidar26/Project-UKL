<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $query = "UPDATE users SET username='$username', password='$password', level='$level' WHERE id_user='$id_user'";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header("Location:admin.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }

    $query = "SELECT * FROM users WHERE id_user='$id_user'";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    header("Location:admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    
    <link rel="stylesheet" href="adminproductedit.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title">Update User</h1>
        </header>
        <section class="form">
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" required><br>

                <label for="stock">password:</label>
                <input type="text" id="password" name="password" value="<?php echo $data['password']; ?>" required><br>

                <label for="stock">level:</label>
                <select name="level" id="level">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                                
                <input type="submit" name="submit" value="Update" class="button">
            </form>
        </section>
    </div>

    <script src="main.js"></script>
</body>
</html>