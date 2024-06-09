<?php include 'koneksi.php';?>
<head>
    <title>Wisata</title>
    <link rel="stylesheet" href="transaksi.css?v=<?php echo time(); ?>">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="wisata.css">
</head>
<div class="navbar">
             <h2>Haidar </h2>
             <div class="h2">
                 <h2> Travel</h2>
             </div>
             <nav>
             <ul>
                 <li><a href="admin.php">BERANDA</a></li>
                 <li><a href="transaksi.php">TRANSAKSI</a></li>
                 <li><a href="addwisata.php">TAMBAH WISATA</a></li>
                 <li><a href="../../loginpage.php">LOG OUT</a></li>
             </ul>
         </nav>
     </div>
     <div class="container" id="home">
<table border="1" class="table" id="user">
    <tr>
        <th>No</th>
        <th>Nama Wisata</th>
        <th>Lokasi</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Transportasi</th>
        <th>Gambar</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
    <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM wisata";
      $result = mysqli_query($mysqli, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($mysqli).
           " - ".mysqli_error($mysqli));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($data = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $data['nama_wisata']; ?></td>
          <td><?php echo $data['lokasi']; ?></td>
          <td><?php echo $data['deskripsi']; ?></td>
          <td><?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
          <td><?php echo $data['transportasi']; ?></td>
          <td style="text-align: center;"><img src="../<?php echo $data['gambar']; ?>" style="width: 120px; height:120px;"></td>
          <td><a href="editwisata.php?id=<?php echo $data['id_wisata']; ?>">Edit</a></td>
            <td><a href="deletewisata.php?id=<?php echo $data['id_wisata']; ?>">Hapus</a></td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
</table>
<script>
    feather.replace();
</script>