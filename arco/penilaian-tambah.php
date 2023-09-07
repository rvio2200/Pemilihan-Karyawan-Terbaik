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
    <?php
        $query1 = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$_GET[id_alternatif]'");
        $result1 = mysqli_fetch_array($query1); ?>
        <h2><b>PENILAIAN/<a href="penilaian.php"><?php echo $result1['nama_alternatif']; ?></a></b></h2>
    <div>
    <a href='penilaian-aksi.php?id_alternatif=<?php echo $_GET['id_alternatif'] ?>&aksi=tambah' class='btn btn-info btn-sm'>Nilai</a>
    <a href='penilaian-aksi.php?id_alternatif=<?php echo $_GET['id_alternatif'] ?>&aksi=ubah&id_alternatif ?>' class='btn btn-danger btn-sm'>Ubah</a></div>
    <br>
    <div class="table-condensed" style="max-width: 100%; margin: 0 auto;">
        <table class="table table-bordered table-hover">
            <thead style="border=1px;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Periode</th>
                    </tr>   
            </thead>
            <tbody>
            <?php
$id_alternatif = $_GET['id_alternatif'];
$query_kriteria = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
$no = 1;

while ($result_kriteria = mysqli_fetch_array($query_kriteria)) {
    $nomor = $no++;
    $kode = $result_kriteria['id_kriteria'];
    $nama = $result_kriteria['nama_kriteria'];

    // Query untuk mendapatkan nilai subkriteria
    $query_nilai = mysqli_query($conn, "SELECT n.id_subkriteria, s.nama_subkriteria, s.nilai_subkriteria
                    FROM tbl_nilai n
                    JOIN tbl_subkriteria s ON n.id_subkriteria = s.id_subkriteria
                    WHERE n.id_alternatif = $id_alternatif AND n.id_kriteria = $kode");

    $row_nilai = mysqli_fetch_array($query_nilai);

    if ($row_nilai) {
        $nilai = $row_nilai['nama_subkriteria'] . ' (' . $row_nilai['nilai_subkriteria'] . ')';
    } else {
        $nilai = 'Belum dinilai';
    }

    // Query untuk mendapatkan periode
    $query_periode = mysqli_query($conn, "SELECT n.id_periode, p.nama_periode
                    FROM tbl_nilai n
                    JOIN tbl_periode p ON n.id_periode = p.id_periode
                    WHERE n.id_alternatif = $id_alternatif AND n.id_kriteria = $kode");

    $row_periode = mysqli_fetch_array($query_periode);

    if ($row_periode) {
        $periode = $row_periode['nama_periode'];
    } else {
        $periode = 'Belum dinilai';
    }

    // Output baris tabel
    echo "<tr>
            <td class='text-center' style='vertical-align: middle;'>$nomor</td>
            <td class='text-left' style='vertical-align: middle;'>$nama</td>
            <td class='text-center' style='vertical-align: middle;'>$nilai</td>
            <td class='text-center' style='vertical-align: middle;'>$periode</td>
          </tr>";
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
