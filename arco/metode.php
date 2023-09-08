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

<div class="panel panel-container" style="width: 50%; margin: 0 auto; padding: 20px; box-shadow: 2px 2px 5px #888888;">
    <h2 class="text-center"><b>HASIL ANALISA PERHITUNGAN METODE WEIGHTED PRODUCT</b></h2>

    <br>
    <br>
    <style>
    .sticky-title {
        position: sticky;
        top: 0;
        background-color: #f1f1f1; /* Warna latar belakang judul */
        padding: 10px; /* Atur padding judul sesuai kebutuhan */
    }
    </style>
    <h4 class="modal-title sticky-title"><b>Nilai Kriteria</b></h4>
    <br>
    
    <div class="table-condensed">
        <style>
        .center-table {
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto */
        }
        </style>
        <table class="table table-bordered table-hover center-table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-center"style="vertical-align: middle;">No</th>
                    <th class="text-center"style="vertical-align: middle;"style="white-space: nowrap;">Kriteria</th>
                    <th class="text-center"style="vertical-align: middle;">Bobot</th>
                    <th class="text-center"style="vertical-align: middle;">Normalisasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tbl_kriteria order by id_kriteria");
                    $no=1;
                    while ($result = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $no++?></td>
                        <td class="text-left"><?php echo $result['nama_kriteria']?></td>
                        <td class="text-center"><?php echo $result['bobot_kriteria']?> / 13</td>
                        <td class="text-center"><?php echo number_format($result['bobot_kriteria']/13, 4, '.', ','); ?></td>    
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <br>

    <!-- <style>
    .sticky-title {
        position: sticky;
        top: 0;
        background-color: #f1f1f1; /* Warna latar belakang judul */
        padding: 10px; /* Atur padding judul sesuai kebutuhan */
    }
    </style>
    <h4 class="modal-title sticky-title"><b>Nilai Konversi Keputusan</b></h4>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center"style="vertical-align: middle;">No</th>
                    <th class="text-center"style="vertical-align: middle;"style="white-space: nowrap;">Nama Alternatif</th>
                    <?php
                    $data = mysqli_query($conn,"SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                    while ($a=mysqli_fetch_array($data)) {
                        echo "<th class='text-center'style='vertical-align: middle;'>$a[nama_kriteria]</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif order by id_alternatif");
                    $no=1;
                    while ($result = mysqli_fetch_array($query)) {
                        $nomor = $no++;
                        $kode = $result['id_alternatif'];
                        $nama = $result['nama_alternatif'];

                        echo "<tr>
                        <td class='text-center'style='vertical-align: middle';>$nomor</td>
                        <td class='text-left'style='vertical-align: middle';>$nama</td>
                        ";

                        $query1 = mysqli_query($conn, "SELECT a.nilai_subkriteria as nama_sub FROM tbl_subkriteria a, tbl_nilai b WHERE b.id_alternatif='".$kode."' AND a.id_subkriteria=b.id_subkriteria ORDER BY b.id_kriteria");
                        while ($b=mysqli_fetch_array($query1)) {
                            echo "<td class='text-center'style='vertical-align: middle;'>$b[nama_sub]</td>";
                        }
                        
                ?>

                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
<br> -->

<?php
//Set Vektor S dan Vektor V

$query=mysqli_query($conn, "SELECT * FROM tbl_alternatif");
$jumlah=0;
while ($result=mysqli_fetch_array($query)) {
    $nomor=$no++;
    $vektor_s=1;
    $id=$result['id_alternatif'];
    $nama=$result['nama_alternatif'];

    //Panggil nilai matriks keputusan
    $query2=mysqli_query($conn, "SELECT s.nilai_subkriteria as sub,n.id_kriteria as id_kriteria FROM tbl_subkriteria s, tbl_nilai n, tbl_kriteria k WHERE n.id_alternatif='$id' AND s.id_subkriteria=n.id_subkriteria AND k.id_kriteria=n.id_kriteria ORDER BY n.id_kriteria");
    while ($result2=mysqli_fetch_array($query2)) {
        $val = $result2['sub'];

        //Panggil nilai bobot
        $query3=mysqli_query($conn, "SELECT bobot_kriteria FROM tbl_kriteria WHERE id_kriteria='$result2[id_kriteria]'");
        $result3=mysqli_fetch_assoc($query3);
        //Normalisasikan nilai bobot kriteria
        $bobot_k=$result3['bobot_kriteria']/13;

        //Vektor S
        $val_s = $val ** $bobot_k;
        $vektor_s *= $val_s;

    }

        //ambil nilai vektor_s simpan ke dalam database
        mysqli_query($conn, "UPDATE tbl_alternatif SET vektor_s ='$vektor_s' WHERE id_alternatif='$id'");

        //Vektor V
        $query4 = mysqli_query($conn, "SELECT sum(vektor_s) as sum_s FROM tbl_alternatif");
        $b = mysqli_fetch_array($query4);
        $vektor_v = $vektor_s/$b['sum_s'];

        //ambil nilai vektor_v simpan ke dalam database
        mysqli_query($conn, "UPDATE tbl_alternatif SET vektor_v ='$vektor_v' WHERE id_alternatif='$id'");
        $jumlah++;
}

        // Set Ranking
        $query5 = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY vektor_v DESC");
        $rank = 1;
        while ($result5 = mysqli_fetch_array($query5)) {
            $id_alternatif = $result5['id_alternatif'];
            mysqli_query($conn, "UPDATE tbl_alternatif SET ranking='$rank' WHERE id_alternatif='$id_alternatif'");
            $rank++;
}

?>
<style>
    .sticky-title {
        position: sticky;
        top: 0;
        background-color: #f1f1f1; /* Warna latar belakang judul */
        padding: 10px; /* Atur padding judul sesuai kebutuhan */
    }
    </style>
<h4 class="modal-title sticky-title"><b>Nilai Vektor S dan Vektor V</b></h4>
<br>
<div class="table-condensed">
        <style>
        .center-table {
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto */
        }
        </style>
        <table class="table table-bordered table-hover center-table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">Vektor S</th>
                    <th class="text-center">Vektor V</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif order by id_alternatif");
                    $no=1;
                    while ($result = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-left"><?php echo $result['nama_alternatif']; ?></td>
                        <td class="text-center"><?php echo number_format($result['vektor_s'], 4) ?></td>
                        <td class="text-center"><?php echo number_format($result['vektor_v'], 4) ?></td>
                        
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <br>

    <style>
    .sticky-title {
        position: sticky;
        top: 0;
        background-color: #f1f1f1; /* Warna latar belakang judul */
        padding: 10px; /* Atur padding judul sesuai kebutuhan */
    }
    </style>
    
    <h4 class="modal-title sticky-title"><b>Hasil Perankingan</b></h4>
<head>
<style>
  .btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
  }

  .btn-primary {
    background-color: #3498db;
    color: white;
  }

  .btn-primary:hover {
    background-color: #2980b9;
  }
  .modal-footer .btn {
  padding: 5px 10px; /* Sesuaikan sesuai kebutuhan Anda */
  font-size: inherit; /* Mempertahankan ukuran font yang ada */
}

</style>
</head>
<body>
    <div class="modal-footer">
        <h4 class="btn btn-primary"><a href="cetak.php" target="_blank" style="color: white;">Cetak</a></h4>
    </div>
</body>

    <div class="table-condensed">
        <style>
        .center-table {
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto */
        }
        </style>
        <table class="table table-bordered table-hover center-table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">Nilai WP</th>
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
</body>
</html>
