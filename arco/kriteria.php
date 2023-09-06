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
            color: #3B71CA; /* Ganti kode warna dengan kode warna yang Anda inginkan */
        }


        </style>    
    </head>

<body>
 
    <div class="wrap">
        <header id="header">
        <div class="panel panel-container"style="padding: 30px; box-shadow: 2px 2px 5px #BC8F8F; background-color: 	#D8BFD8;">
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
                                <li class="active"><a href="index.php"><span class="fa fa-home"></span><b>&emsp;Home</b></a></li>
                                <li><a href="alternatif.php"><span class="fa fa-user"></span><b>&emsp;Alternatif</b></a></li>
                                <li><a class="scrollTo" data-scrollTo="blog" href="kriteria.php"><span class="fa fa-list"></span><b>&emsp;Kriteria</b></a></li>
                                <li><a class="scrollTo" data-scrollTo="blog" href="penilaian.php"><span class="fa fa-pencil"></span><b>&emsp;Penilaian</b></a></li>
                                <li><a class="scrollTo" data-scrollTo="services" href="metode.php"><span class="fa fa-refresh"></span><b>&emsp;Metode WP</b></a></li>
                                <li><a class="scrollTo" data-scrollTo="contact" href="logout.php"><span class="fa fa-power-off"></span><b>&emsp;Logout</b></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div class="panel panel-container" style="width: 50%; margin: 0 auto; padding: 20px; box-shadow: 2px 2px 5px #888888;">
        <h2><b>DATA KRITERIA</b></h2>
        <a href="kriteria-aksi.php?aksi=tambah" class="btn btn-success btn-sm">
            <span class="fa fa-plus"></span>&emsp;Tambah Data
        </a>
        <br><br>
        <div class="table-condensed" style="max-width: 100%; margin: 0 auto;">
        <style>
        .center-table {
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto */
        }
        </style>
        <table class="table table-bordered table-hover center-table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kriteria</th>
                    <th class="text-center">Bobot Kriteria</th>
                    <th class="text-center">Tipe Kriteria</th>
                    <th class="text-center">Subkriteria</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tbl_kriteria order by id_kriteria");
                    $no=1;
                    while ($result = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-left"><?php echo $result['nama_kriteria']; ?></td>
                        <td class="text-center"><?php echo $result['bobot_kriteria']; ?></td>
                        <td class="text-center"><?php echo $result['tipe_kriteria']; ?></td>

                        <td class="text-center">
                            <a href="subkriteria.php?id_kriteria=<?php echo $result['id_kriteria'] ?>" class="btn btn-success btn-sm" style="padding: 0.2rem 0.5rem;"><span class="fa fa-plus"></span></a>
                        </td>
                       
                        <td class="text-center">
                            <a href="kriteria-aksi.php?id_kriteria=<?php echo $result['id_kriteria'] ?>&aksi=ubah" class="btn btn-info btn-sm" style="padding: 0.2rem 0.5rem;"><span class="fa fa-pencil fa-sm"></span></a>
                            <a href="kriteria-proses.php?id_kriteria=<?php echo $result['id_kriteria'] ?>&proses=proses-hapus" class="btn btn-danger btn-sm" style="padding: 0.2rem 0.5rem;"><span class="fa fa-trash fa-sm"></span></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
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