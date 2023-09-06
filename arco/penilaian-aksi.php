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
            <div class="panel panel-container" style="padding: 30px; box-shadow: 2px 2px 5px #BC8F8F; background-color: #D8BFD8;">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.php">
                            <div class="logo">
                                <img src="../assets/desain-home/img/nestle.png" alt="Venue Logo">
                                <div class="logo-text">
                                    <h3><b>PEKANBARU AREA</b></h3>
                                </div>
                            </div>
                        </a>
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

    <?php
    if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'tambah') {
            ?>
            <div class="panel panel-container" style="width: 50%; margin: 0 auto; padding: 20px; box-shadow: 2px 2px 5px #888888;">
                <?php
                $query1 = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$_GET[id_alternatif]'");
                $result1 = mysqli_fetch_array($query1);
                ?>
                <h2><b>PENILAIAN/<a href="penilaian-tambah.php?id_alternatif=<?php echo $result1['id_alternatif']; ?>"><?php echo $result1['nama_alternatif']; ?></a></b></h2>

                <form action="penilaian-proses.php?proses=proses-tambah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_alternatif" value="<?php echo $_GET['id_alternatif']; ?>">
                    <div class="form-group">
                        <label>Periode</label>
                        <select class="form-control" name="id_periode">
                            <option disabled selected>Pilih Periode</option>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tbl_periode ORDER BY id_periode");
                            while ($p = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?php echo $p['id_periode'] ?>"><?php echo $p['nama_periode'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <?php
                    $hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                    while ($baris = mysqli_fetch_array($hasil)) {
                        $idK = $baris['id_kriteria'];
                        $labelK = $baris['nama_kriteria'];

                        echo "<div class='form-group'>";
                        echo "<label>".$labelK."</label>";

                        $hasil1 = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='".$idK."' ORDER BY nilai_subkriteria DESC");
                        while ($baris1 = mysqli_fetch_array($hasil1)) {
                            $idSubkriteria = $baris1['id_subkriteria'];
                            $namaSubkriteria = $baris1['nama_subkriteria'];
                            $nilaiSubkriteria = $baris1['nilai_subkriteria'];

                            // Ubah <select> menjadi radio button
                            echo "<div class='form-check'>";
                            echo "<input type='radio' class='form-check-input' name='".$idK."' value='".$idSubkriteria."' id='".$idSubkriteria."'>";
                            echo "<label class='form-check-label' for='".$idSubkriteria."'style='margin-left: 10px; font-weight: normal;'>".$namaSubkriteria." - (".$nilaiSubkriteria.")</label>";
                            echo "</div>";
                        }

                        echo "</div>";
                    }
                    ?>

                    <div class="modal-footer">
                        <a href="penilaian-tambah.php?id_alternatif=<?php echo $result1['id_alternatif']; ?>" class="btn btn-info">Batal</a>
                        <input type="submit" class="btn btn-danger" value="Simpan">
                    </div>

                </form>
            </div>
        <?php } elseif ($_GET['aksi'] == 'ubah') { ?>

            <div class="panel panel-container" style="width: 50%; margin: 0 auto; padding: 20px; box-shadow: 2px 2px 5px #888888;">
                <?php
                $query1 = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$_GET[id_alternatif]'");
                $result1 = mysqli_fetch_array($query1);
                ?>
                <h2><b>PENILAIAN/<a href="penilaian-tambah.php?id_alternatif=<?php echo $result1['id_alternatif']; ?>"><?php echo $result1['nama_alternatif']; ?></a></b></h2>

                <form action="penilaian-proses.php?proses=proses-ubah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_alternatif" value="<?php echo $_GET['id_alternatif']; ?>">
                    <div class="form-group">
                        <label>Periode</label>
                        <?php
                        $id_periode = $_GET['id_periode'];
                        $data = mysqli_query($conn, "SELECT * FROM tbl_periode WHERE id_periode='$id_periode'");
                        $p = mysqli_fetch_array($data);
                        ?>

                        <select class="form-control" name="id_periode">
                            <option value="<?php echo $p['id_periode'] ?>"><?php echo $p['nama_periode'] ?></option>

                            <?php
                            $data1 = mysqli_query($conn, "SELECT * FROM tbl_periode ORDER BY id_periode");
                            while ($p1 = mysqli_fetch_array($data1)) { ?>
                                <option value="<?php echo $p1['id_periode'] ?>"><?php echo $p1['nama_periode'] ?></option>
                            <?php } ?>

                        </select>
                    </div>

                    <?php
                    $hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                    while ($baris = mysqli_fetch_array($hasil)) {
                        $idK = $baris['id_kriteria'];
                        $labelK = $baris['nama_kriteria'];

                        echo "<div class='form-group'>";
                        echo "<label>".$labelK."</label>";

                        $id_alternatif = $_GET['id_alternatif'];
                        $hasil1 = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_kriteria='$idK' AND id_alternatif='$id_alternatif'");
                        $baris1 = mysqli_fetch_array($hasil1);
                        $id_subkriteria = $baris1['id_subkriteria'];

                        $hasil2 = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='$idK' ORDER BY nilai_subkriteria DESC");
                        while ($baris2 = mysqli_fetch_array($hasil2)) {
                            $idSubkriteria = $baris2['id_subkriteria'];
                            $namaSubkriteria = $baris2['nama_subkriteria'];
                            $nilaiSubkriteria = $baris2['nilai_subkriteria'];

                            // Ubah <select> menjadi radio button
                            echo "<div class='form-check'>";
                            if ($idSubkriteria == $id_subkriteria) {
                                echo "<input type='radio' class='form-check-input' name='".$idK."' value='".$idSubkriteria."' id='".$idSubkriteria."' checked>";
                            } else {
                                echo "<input type='radio' class='form-check-input' name='".$idK."' value='".$idSubkriteria."' id='".$idSubkriteria."'>";
                            }
                            echo "<label class='form-check-label' for='".$idSubkriteria."' style='margin-left: 10px; font-weight: normal;'>".$namaSubkriteria." - (".$nilaiSubkriteria.")</label>";
                            echo "</div>";
                        }

                        echo "</div>";
                    }
                    ?>

                    <div class="modal-footer">
                        <a href="penilaian-tambah.php?id_alternatif=<?php echo $result1['id_alternatif']; ?>" class="btn btn-info">Batal</a>
                        <input type="submit" class="btn btn-danger" value="Ubah">
                    </div>
                </form>
            </div>
        <?php }
    }
    ?>  
</div>
</div>

<?php
$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria order by id_kriteria");
$no = 1;
while ($result = mysqli_fetch_array($query)) { ?>
    <?php
    $bobot = $result['bobot_kriteria'];
    if ($result['tipe_kriteria'] == 'Cost') { // Jika tipe kriteria adalah "cost"
        $bobot = -1 * $bobot; // Kalikan bobot dengan -1
    }
    echo number_format($bobot / 13, 4, '.', ',');
    ?>
<?php } ?>

<?php
// Set Vektor S dan Vektor V

$query=mysqli_query($conn, "SELECT * FROM tbl_alternatif");
$jumlah=0;
while ($result=mysqli_fetch_array($query)) {
    $nomor=$no++;
    $vektor_s=1;
    $id=$result['id_alternatif'];
    $nama=$result['nama_alternatif'];

    // Panggil nilai matriks keputusan
    $query2=mysqli_query($conn, "SELECT s.nilai_subkriteria as sub,n.id_kriteria as id_kriteria FROM tbl_subkriteria s, tbl_nilai n, tbl_kriteria k WHERE n.id_alternatif='$id' AND s.id_subkriteria=n.id_subkriteria AND k.id_kriteria=n.id_kriteria ORDER BY n.id_kriteria");
    while ($result2=mysqli_fetch_array($query2)) {
        $val = $result2['sub'];

        // Panggil nilai bobot
        $query3=mysqli_query($conn, "SELECT bobot_kriteria FROM tbl_kriteria WHERE id_kriteria='$result2[id_kriteria]'");
        $result3=mysqli_fetch_assoc($query3);
        // Normalisasikan nilai bobot kriteria
        $bobot_k=$result3['bobot_kriteria']/13;

        // Vektor S
        $val_s = $val ** $bobot_k;
        $vektor_s *= $val_s;
    }

    // Ambil nilai vektor_s simpan ke dalam database
    mysqli_query($conn, "UPDATE tbl_hasil SET vektor_s ='$vektor_s' WHERE id_alternatif='$id'");

    // Vektor V
    $query4 = mysqli_query($conn, "SELECT sum(vektor_s) as sum_s FROM tbl_hasil");
    $b = mysqli_fetch_array($query4);
    $vektor_v = $vektor_s/$b['sum_s'];

    // Ambil nilai vektor_v simpan ke dalam database
    mysqli_query($conn, "UPDATE tbl_hasil SET vektor_v ='$vektor_v' WHERE id_alternatif='$id'");
    $jumlah++;
}

// Set Ranking
$query5 = mysqli_query($conn, "SELECT * FROM tbl_hasil ORDER BY vektor_v DESC");
$rank = 1;
while ($result5 = mysqli_fetch_array($query5)) {
    $id_alternatif = $result5['id_alternatif'];
    mysqli_query($conn, "UPDATE tbl_hasil SET ranking='$rank' WHERE id_alternatif='$id_alternatif'");
    $rank++;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="../assets/desain-home/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="../assets/desain-home/js/vendor/bootstrap.min.js"></script>
<script src="../assets/desain-home/js/datepicker.js"></script>
<script src="../assets/desain-home/js/plugins.js"></script>
<script src="../assets/desain-home/js/main.js"></script>
</body>
</html>
