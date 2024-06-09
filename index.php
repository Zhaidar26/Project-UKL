<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
</head>
<body>
     <!-- Navbar Start -->
     <div class="navbar">
             <h2>Haidar </h2>
             <div class="h2">
                 <h2> Travel</h2>
             </div>
         <?php include 'navbar.php';?>
     </div>
     <div class="container" id="home">
         <!-- Navbar End -->
         <!-- Section Home -->
         <?php
    include 'koneksi.php';

    $query = "SELECT * FROM wisata";
    $result = mysqli_query($mysqli, $query);
    if(!$result){
        die ("Query Error: ".mysqli_errno($mysqli). " - ".mysqli_error($mysqli));
    }
    $data = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row" id="home">
        <div class="col welcome-section">
            <h1>Selamat Datang</h1>
            <p>Mari bersama-sama berjelajah di berbagai penjuru dunia, menjelajahi keajaiban alam, merasakan keanekaragaman budaya, dan mengumpulkan cerita-cerita tak terlupakan yang hanya bisa ditemukan di luar sana. Ayo, mari kita jadikan dunia ini sebagai arena petualangan kita!</p>
        </div>
    </div>
</div>

<style>
    .welcome-section {
        background: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url('project/<?php echo $data['gambar']; ?>') no-repeat center center ;
        background-size: cover;
        padding: 50px;
        color: white;
        width: 100%;
        height: 75vh;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
    .row{
        height: 88%;
        align-items: center;
        display: flex;
    }
    .col{
        text-align: center;
    }
    h1{
        margin-top: 29vh;
    }
</style>

        <!-- Section Region -->
    <section class="regions" id="region">
        <h2>WISATA</h2>
        <?php
    session_start();
    include 'koneksi.php';

    $query = "SELECT * FROM wisata";
    $result = mysqli_query($mysqli, $query);
    //mengecek apakah ada error ketika menjalankan query
    if(!$result){
      die ("Query Error: ".mysqli_errno($mysqli).
         " - ".mysqli_error($mysqli));
    }
    while($data = mysqli_fetch_assoc($result))
      {?>
        <div class="property-card">
        <img src="project/<?php echo $data['gambar']; ?>" alt="<?php echo $data['gambar']; ?>" class="property-image">
        <div class="property-content" data-value="">
            <h2 class="property-title"><?php echo $data['nama_wisata']; ?></h2>
            <p class="property-location"><?php  echo $data['lokasi']; ?></p>
            <p class="property-description"><?php echo $data['deskripsi']; ?></p>
            <p class="property-price"><?php echo " Rp " . number_format($data['harga'], 0, ',', '.'); ?></p><br>
        </div>
            <a href="loginpage.php?id=<?php echo $data['id_wisata'];?>" class="property-book-button">Book Now</a><br>
        </div>
    </div>
    <?php }
      ?>
    <!-- Footer start -->
    <footer>
        <div class="socials" id="about">
            <a href="https://instagram.com/z.haidar_i"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="https://facebook.com/zhafif.haidarilmi"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">HOME</a>
            <a href="#region">WISATA</a>
            <a href="#about">ABOUT</a>
        </div>

        <div class="credit">
            <p>Created by <span>Zhafif</span>. | &copy; 2023.</p>
        </div>
    </footer>
<!-- Footer end -->
</body>
</php>