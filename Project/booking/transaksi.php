<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../loginpage.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$id_wisata = $_GET['id'];

$query = "SELECT * FROM wisata WHERE id_wisata = '$id_wisata'";
$result = mysqli_query($mysqli, $query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_wisata = $_POST['tanggal_wisata'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Periksa apakah id_wisata materi ada dalam tabel kelas
    $query_kelas = mysqli_query($mysqli, "SELECT * FROM wisata WHERE id_wisata='$id_wisata'");
    $data_kelas = mysqli_fetch_assoc($query_kelas);
    
    // Periksa apakah id_kelas yang ditemukan
    $query = "INSERT INTO transaksi (id_user, id_wisata, tanggal_wisata, metode_pembayaran, status) VALUES ('$id_user', '$id_wisata', '$tanggal_wisata', '$metode_pembayaran', 'pending')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: struktransaksi.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
$lihat = mysqli_query($mysqli, "SELECT * FROM wisata WHERE id_wisata='$id_wisata'");
$data = mysqli_fetch_assoc($lihat);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="booking.css?v=<?php echo time(); ?>">
    <title>Booking</title>
</head>
<body>
    <div class="container">
        <div class="box from-box">
            <header>Booking</header>
            <form action="" method="post">
                <div class="field-input">
                    <input type="text" <?php echo $id_user; ?> hidden>
                </div><br>
                <div class="field-input">
                    <i data-feather="briefcase"></i>
                    <label id="nama_pembeli">Nama Wisata</label>
                    <input type="text" name="nama_wisata" placeholder="Nama Wisata" value="<?php echo $data['nama_wisata']; ?>" readonly>
                </div><br>
                <div class="field-input">
                    <i data-feather="dollar-sign"></i>
                    <label id="nama_pembeli">Harga</label>
                    <input type="text" name="harga" placeholder="Harga" value="<?php echo " Rp " . number_format($data['harga'], 0, ',', '.'); ?>" readonly>
                </div><br>
                <div class="field-input">
                    <i data-feather="truck"></i>
                    <label id="nama_pembeli">Transportasi</label>
                    <input type="text" name="transportasi" placeholder="Transportasi" value="<?php echo $data['transportasi']; ?>" readonly>
                </div><br>
                <div class="field-input">
                    <i data-feather="calendar"></i>
                    <label id="tanggal_wisata">Tanggal Wisata</label>
                    <input type="date" name="tanggal_wisata" placeholder="Tanggal Wisata" required>
                </div><br>
                <div class="field-input">
                    <i data-feather="tag"></i>
                    <label id="metode_pembayaran">Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran">
                        <option value="debit">Debit</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div><br>
                <div class="field">
                    <button class="btn" type="submit">Booking</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        feather.replace();
      </script>
</body>
</html>