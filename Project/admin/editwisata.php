<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header('location: index.php');
}
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM wisata WHERE id_wisata=$id");
$data = mysqli_fetch_assoc ($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Wisata</title>
    
    <link rel="stylesheet" href="editwisata.css">
</head>
<body>
<div class="container">
        <div class="box from-box">
            <header>Tambah Wisata</header>
            <form action="editproseswisata.php" method="post" enctype="multipart/form-data">
                <div class="field-input">
                    <label for="nama_wisata">Nama Wisata</label>
                    <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo $data['nama_wisata']; ?>" ><br>
                </div><br>
                <div class="field-input">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" value="<?php echo $data['lokasi']; ?>" ><br>
                </div><br>
                <div class="field-input">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" ><br>
                </div><br>
                <div class="field-input">
                    <label for="harga">Harga:</label>
                    <input type="text" id="harga" name="harga" value="<?php echo $data['harga']; ?>" ><br>
                </div><br>
                <div class="field-input">
                    <label for="transportasi">Transportasi:</label>
                    <select name="transportasi" id="transportasi">
                        <option value="pesawat">Pesawat</option>
                        <option value="kapal">Kapal</option>
                        <option value="bus">Bus</option>
                    </select>
                </div>
                <div class="gambar">
                  <label for="gambar">Gambar:</label>
                  <input type="file" name="gambar" class="file-input">
                  <input type="hidden" name="gambar_produk_existing" value="<?php echo $data['gambar']; ?>"><br>
                </div>
                <div class="field">
                  <button class="btn" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>