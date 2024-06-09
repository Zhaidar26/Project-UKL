<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    if (isset($_POST['submit'])) {
        $tanggal_wisata = $_POST['tanggal_wisata'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $status = $_POST['status'];

        $query = "UPDATE transaksi SET tanggal_wisata='$tanggal_wisata', metode_pembayaran='$metode_pembayaran', status='$status' WHERE id_transaksi='$id_transaksi'";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header("Location:transaksi.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }

    $query = "SELECT *
    FROM transaksi 
    JOIN wisata ON transaksi.id_wisata = wisata.id_wisata
    JOIN users ON transaksi.id_user = users.id_user";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    header("Location:editransaksi.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaksi</title>
    
    <link rel="stylesheet" href="edittransaksi.css">
</head>
<body>
<div class="container">
        <div class="box from-box">
            <header>Edit Transaksi</header>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field-input">
                    <label for="nama_wisata">Nama Wisata</label>
                    <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo $data['nama_wisata']; ?>" ><br>
                </div><br>
                <div class="field-input">
                    <label for="tanggal_wisata">Tanggal Wisata</label>
                    <input type="text" id="tanggal_wisata" name="tanggal_wisata" value="<?php echo $data['tanggal_wisata']; ?>" ><br>
                </div><br>
                <div class="field-input">
                    <label for="metode_pembayaran">Mtode Pembayaran:</label>
                    <input type="text" id="metode_pembayaran" name="metode_pembayaran" value="<?php echo $data['metode_pembayaran']; ?>" ><br>
                </div><br>
                <div class="field-input">
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="pending">Pending</option>
                        <option value="on going">On Going</option>
                    </select>
                </div>
                <div class="field">
                  <button class="btn" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>