<?php
session_start();
include '../assets/conn/cek.php';
include '../assets/conn/config.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>PEMILIHAN KARYAWAN TERBAIK</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../assets/desain-login/images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="../assets/desain-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/desain-home/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/desain-home/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../assets/desain-home/css/fontAwesome.css">
        <link rel="stylesheet" href="../assets/desain-home/css/hero-slider.css">
        <link rel="stylesheet" href="../assets/desain-home/css/owl-carousel.css">
        <link rel="stylesheet" href="../assets/desain-home/css/datepicker.css">
        <link rel="stylesheet" href="../assets/desain-home/css/templatemo-style.css">
        <script src="../assets/desain-home/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
        .logo img {
        max-width: 150px;
        }
         /* Gaya untuk tabel */
  table {
    width: 100%; /* Lebar tabel 100% dari container */
    border-collapse: collapse; /* Menggabungkan border sel yang berdekatan */
  }

  th, td {
    border: 1px solid #ddd; /* Border untuk sel */
    padding: 8px; /* Ruang dalam sel */
    text-align: left; /* Teks rata kiri dalam sel */
  }

  /* Mengubah tinggi tabel */
  .custom-table {
    height: 300px; /* Ubah sesuai keinginan Anda */
    overflow: auto; /* Tambahkan overflow jika konten lebih tinggi dari tinggi yang ditentukan */
  }
        .logo img {
        max-width: 150px;
        }
        /* CSS untuk logo */
        .logo {
            display: inline-block;
            vertical-align: middle;
        }

        /* CSS untuk teks */
        .logo-text {
            display: inline-block;
            font-size: 14px;
            vertical-align: middle;
            margin-left: 10px;
        }
        /* CSS untuk mengganti warna teks */
        .logo-text h3 {
            color: #0063ae; /* Ganti kode warna dengan kode warna yang Anda inginkan */
        }

        .dropdown.menu li a {
        color: #0063ae; /* Ubah warna teks menjadi merah */
        }
        </style>    
    </head>

<body>
 
    <div class="wrap">
        <header id="header">
        <div class="panel panel-container"style="padding: 30px; box-shadow: 2px 2px 5px #888888; background-color: 	#D4D4D4;">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.php"><div class="logo">
                            <img src="../assets/desain-home/img/nestle.png" alt="Venue Logo">
                            <div class="logo-text">
                            <h3><b>PEKANBARU AREA</b></h3>
                        </div>
                        </div></a>
                        <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu">
                            <li class="active"><a href="index.php" style="color: #0063ae;"><span class="fa fa-home"></span><b>&emsp;Home</b></a></li>
                            <li><a href="alternatif.php" style="color: #0063ae;"><span class="fa fa-user"></span><b>&emsp;Alternatif</b></a></li>
                            <li><a class="scrollTo" data-scrollTo="blog" href="kriteria.php" style="color: #0063ae;"><span class="fa fa-list"></span><b>&emsp;Kriteria</b></a></li>
                            <li><a class="scrollTo" data-scrollTo="blog" href="penilaian.php" style="color: #0063ae;"><span class="fa fa-pencil"></span><b>&emsp;Penilaian</b></a></li>
                            <li><a class="scrollTo" data-scrollTo="services" href="metode.php" style="color: #0063ae;"><span class="fa fa-refresh"></span><b>&emsp;Metode WP</b></a></li>
                            <li><a class="scrollTo" data-scrollTo="contact" href="logout.php" style="color: #0063ae;"><span class="fa fa-power-off"></span><b>&emsp;Logout</b></a></li>
                        </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>


    <div class="panel panel-container" style="padding: 25px 0px 0px 25px; box-shadow: 5px 5px 5px #888888;">
        <h2><b>PENILAIAN</b></h2>
        <a href="penilaian-aksi.php?aksi=tambah" class="btn btn-success btn-sm">
            <span class="fa fa-plus"></span>&emsp;Tambah Data
        </a>
        <a href="periode.php?aksi=tambah" class="btn btn-success btn-sm">
            <span class="fa fa-plus"></span>&emsp;Tambah Periode
        </a>
    <br><br>
    <form method="POST" action="halaman_penilaian.php">
        <label>Pilih Periode:</label>
        <select name="periode_id">
            <?php
            // Query untuk mengambil daftar periode
            $sql = mysqli_query($conn, "SELECT id_periode, nama_periode FROM tbl_periode");
            $no=1;
            while ($result = mysqli_fetch_array($query)) {

                echo "<option value='" . $row['id_periode'] . "'>" . $row['nama_periode'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Lanjut">
    </form>
</div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="../assets/desain-home/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../assets/desain-home/js/vendor/bootstrap.min.js"></script>
    <script src="../assets/desain-home/js/datepicker.js"></script>
    <script src="../assets/desain-home/js/plugins.js"></script>
    <script src="../assets/desain-home/js/main.js"></script>
</body>
</html>
