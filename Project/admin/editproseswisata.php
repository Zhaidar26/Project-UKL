<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $id_wisata = $_POST['id_wisata'];
    $nama_wisata = $_POST['nama_wisata'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $transportasi = $_POST['transportasi'];

    $target_dir = "uploads/images/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $gambar_path = "";
    if (!empty($_FILES["gambar"]["name"])) {
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $gambarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getgambarsize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an gambar.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar_path = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    include_once 'koneksi.php';
    $query = "UPDATE wisata SET nama_wisata='$nama_wisata', lokasi='$lokasi', deskripsi='$deskripsi', harga='$harga' transportasi='$transportasi'";
    if (!empty($gambar_path)) {
        $query .= ", gambar='$gambar_path'";
    }
    $query .= " WHERE id_wisata='$id_wisata'";
    if (mysqli_query($mysqli, $query)) {
        echo "Record updated successfully";
        header('Location: class.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    die("Akses Dilarang..");
}
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
            <form action="" method="post" enctype="multipart/form-data">
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