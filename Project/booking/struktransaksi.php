<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../loginpage.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$query = "SELECT *
          FROM transaksi 
        --   JOIN materi ON transaksi.id_kelas = materi.id_kelas
          JOIN wisata ON transaksi.id_wisata = wisata.id_wisata
          JOIN users ON transaksi.id_user = users.id_user
          WHERE transaksi.id_user = '$id_user'";

$result = mysqli_query($mysqli, $query);
?>

<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="transaksi.css?v=<?php echo time(); ?>">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="struktransaksi.css?v=<?php echo time(); ?>">
</head>
<div class="navbar">
             <h2>Haidar </h2>
             <div class="h2">
                 <h2> Travel</h2>
             </div>
             <nav>
             <ul>
                 <li><a href="../explore.php">BERANDA</a></li>
                 <li><a href="#">RIWAYAT TRANSAKSI</a></li>
                 <li><a href="../../loginpage.php">LOG OUT</a></li>
             </ul>
         </nav>
     </div>
     <div class="container" id="home">
<center><h2 style="font-family: arial;">Riwayat Transaksi Ku</h2></center>
<table border="1" class="table" id="user">
    <tr>
        <th>No</th>
        <th>Nama Akun</th>
        <th>Nama Wisata</th>
        <th>Lokasi</th>
        <th>Transportasi</th>
        <th>Tanggal Wisata</th>
        <th>Metode Pembayaran</th>
        <th>Status</th>
    </tr>
        <?php 
        $nomor = 1;
        while($data = mysqli_fetch_assoc
        ($result)){
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td style="text-align: center;"><?php echo $data['username']; ?></td>
            <td style="text-align: center;"><?php echo $data['nama_wisata']; ?></td>
            <td style="text-align: center;"><?php echo $data['lokasi']; ?></td>
            <td style="text-align: center;"><?php echo $data['transportasi']; ?></td>
            <td style="text-align: center;"><?php echo $data['tanggal_wisata']; ?></td>
            <td style="text-align: center;"><?php echo $data['metode_pembayaran']; ?></td>
            <td style="text-align: center;"><?php echo $data['status']; ?></td>
        </tr>
        <?php } ?>
</table>
<script>
    feather.replace();
</script>