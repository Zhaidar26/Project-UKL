<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="transaksi.css?v=<?php echo time(); ?>">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="transaksi.css">
</head>
<div class="navbar">
             <h2>Haidar </h2>
             <div class="h2">
                 <h2> Travel</h2>
             </div>
             <nav>
             <ul>
                 <li><a href="admin.php">BERANDA</a></li>
                 <li><a href="wisata.php">WISATA</a></li>
                 <li><a href="../../loginpage.php">LOG OUT</a></li>
             </ul>
         </nav>
     </div>
     <div class="container" id="home">
<center><h2 style="font-family: arial; margin: 20px;">Transaksi yang telah dilakukan</h2></center>
<table border="1" class="table" id="user">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama Wisata</th>
        <th>Tanggal Wisata</th>
        <th>Metode Pembayaran</th>
        <th>Status</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
    <?php
    // Menggunakan koneksi mysqli atau PDO yang benar
    include ('koneksi.php');

    // Select data dari tabel user
    $query_mysql = mysqli_query($mysqli, "SELECT *
    FROM transaksi 
    JOIN wisata ON transaksi.id_wisata = wisata.id_wisata
    JOIN users ON transaksi.id_user = users.id_user") or die(mysqli_error($mysqli));

    // Variabel nomor dimulai dari
    $nomor = 1;

    // Loop untuk menampilkan data dalam tabel
    while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['nama_wisata']; ?></td>
            <td><?php echo $data['tanggal_wisata']; ?></td>
            <td><?php echo $data['metode_pembayaran']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td>
                <a href="deletetransaksi.php?id=<?php echo $data['id_transaksi'];?>">Delete</a>
            </td>
            <td>
                <a href="edittransaksi.php?id=<?php echo $data['id_transaksi'];?>">Edit</a>
            </td>
        </tr>
    <?php } ?>
</table>
<script>
    feather.replace();
</script>