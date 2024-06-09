<?php
include_once("koneksi.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="addwisata.css?v=<?php echo time(); ?>">
  <title>Tambah Wisata baru</title>
</head>

<body>
<div class="container">
        <div class="box from-box">
            <header>Tambah Wisata</header>
            <form action="addwisata.php" method="post" enctype="multipart/form-data">
                <div class="field-input">
                    <label for="nama_wisata">Nama Wisata</label>
                    <input type="text" name="nama_wisata" placeholder="Masukkan nama Wisata" required>
                </div><br>
                <div class="field-input">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Masukkan Lokasi" required>
                </div><br>
                <div class="field-input">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="textarea" name="deskripsi" placeholder="Deskripsi">
                </div><br>
                <div class="field-input">
                    <label for="harga">Harga:</label>
                    <input type="text" name="harga" placeholder="Masukkan Harga" required>
                </div><br>
                <div class="image">
                  <label for="gambar">Gambar:</label>
                  <input type="file" name="gambar" class="file-input" required>
                </div>
                <div class="field">
                  <button class="btn" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
      <?php
      'article' table
          $result = mysqli_query($mysqli, "INSERT INTO wisata (nama_wisata, lokasi, deskripsi, harga, gambar) VALUES ('$negara', '$lokasi', '$deskripsi', '$harga', '$gambar')");

          if ($result) {if (isset($_POST['submit'])) {
        $negara = $_POST['nama_wisata'];
        $lokasi = $_POST['lokasi'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $id_negara = $_SESSION["id_wisata"];

        $target_dir = "../uploads/images/";
        if (!is_dir($target_dir)) {
          mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        if (!empty($_FILES["gambar"]["tmp_name"], $target_file)) {
          // File uploaded successfully, save the file path to the database
          $gambar = 'uploads/images/' . basename($_FILES["gambar"]["name"]);

          // Insert data into the 
            header("location: wisata.php");
          } else {
            echo "Error: " . mysqli_error($mysqli);
          }
        } else {
          echo "Error uploading file.";
        }
      }
      ?>
</body>

</html>
