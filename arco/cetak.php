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
        </style>    
    </head>

 


    <div class="panel panel-container"style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <head>
<style>
  .text-center {
    text-align: center;
    margin: 1em 0;
  }
</style>
</head>
<body>
  <h2 class="text-center"><b>NESTLE AGENCY TEAM PEKANBARU</b>
    <br>
    <b>Pemilihan Karyawan Terbaik</b>
  </h2>
  
</body>
    
    <style>
    .sticky-title {
        position: sticky;
        top: 0;
        background-color: #f1f1f1; /* Warna latar belakang judul */
        padding: 10px; /* Atur padding judul sesuai kebutuhan */
    }
    </style>
  <h4 class="text-center" style="color=black"><b>Hasil Analisa Penilaian Menggunakan Metode Weighted Product</b></h4>
    <div class="table-condensed">
        <style>
        .center-table {
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto */
        }
        </style>
        <table class="table table-bordered center-table";>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Ranking</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif order by ranking");
                    $no=1;
                    while ($result = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-left"><?php echo $result['nama_alternatif']; ?></td>
                        <td class="text-center"><?php echo number_format($result['vektor_v'], 4) ?></td>
                        <td class="text-center"><?php echo $result['ranking']; ?></td>
                      
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
    <script>window.print();</script>
</body>
</html>
