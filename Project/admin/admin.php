<head>
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
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
                 <li><a href="transaksi.php">TRANSAKSI</a></li>
                 <li><a href="addpage.php">TAMBAH AKUN</a></li>
                 <li><a href="../../loginpage.php">LOG OUT</a></li>
             </ul>
         </nav>
     </div>
     <div class="container" id="home">
<table border="1" class="table" id="user">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Tools</th>
    </tr>
    <a href=""></a>
    <?php
    // Menggunakan koneksi mysqli atau PDO yang benar
    include ('koneksi.php');

    // Select data dari tabel user
    $query_mysql = mysqli_query($mysqli, "SELECT * FROM users ") or die(mysqli_error($mysqli));

    // Variabel nomor dimulai dari
    $nomor = 1;

    // Loop untuk menampilkan data dalam tabel
    while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['password']; ?></td>
            <td><?php echo $data['level']; ?></td>
            <td>
                <!-- Isi kolom aksi sesuai dengan kebutuhan -->
                <a href="delete.php?id=<?php echo $data['id_user'];?>">Delete</a>
                <a href="editform.php?id=<?php echo $data['id_user'];?>">Edit</a>
            </td>
        </tr>
    <?php } ?>
</table>