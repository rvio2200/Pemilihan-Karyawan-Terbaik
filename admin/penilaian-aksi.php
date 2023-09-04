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

    <?php if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') { ?>
        
        <div class="panel panel-container" style="width: 50%; margin: 0 auto; padding: 20px; box-shadow: 2px 2px 5px #888888;">
            <h2><b>PENILAIAN/Tambah Data</b></h2>
            
            <form action="penilaian-proses.php?proses=proses-tambah" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Alternatif</label>
                    <select class="form-control" name="id_alternatif">
                        <option disabled selected>Pilih</option>
                        <?php 
                        $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
                        while ($a = mysqli_fetch_array($query)) { ?>
                            <option value="<?php echo $a['id_alternatif'] ?>"><?php echo $a['nama_alternatif'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <?php 
                $hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                while ($baris = mysqli_fetch_array($hasil)) {
                    $idK = $baris['id_kriteria'];
                    $labelK = $baris['nama_kriteria'];

                    echo "<div class='form-group'>
                            <label>".$labelK."</label>";
                    echo "<select name='".$idK."' class='form-control'>";

                    $hasil1 = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='".$idK."' ORDER BY nilai_subkriteria DESC");
                    while ($baris1 = mysqli_fetch_array($hasil1)) {
                        echo "<option value='".$baris1['id_subkriteria']."'>".$baris1['nama_subkriteria']." - (".$baris1['nilai_subkriteria'].")
                        </option>";
                    }

                    echo "</select></div>";
                } ?>

                <div class="modal-footer">
                    <a href="penilaian.php" class="btn btn-info">Batal</a>
                    <input type="submit" class="btn btn-danger" value="Simpan">
                </div>

            </form>
        </div>
    
    <?php } elseif ($_GET['aksi'] == 'ubah') { ?>

        <div class="panel panel-container" style="width: 50%; margin: 0 auto; padding: 20px; box-shadow: 2px 2px 5px #888888;">
            <h2><b>PENILAIAN/Ubah Data</b></h2>

            <form action="penilaian-proses.php?proses=proses-ubah" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Alternatif</label>
                    <?php
                    $id_alternatif = $_GET['id_alternatif'];
                    $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'");
                    $a = mysqli_fetch_array($data);
                    ?>

                    <select class="form-control" name="id_alternatif">
                        <option value="<?php echo $a['id_alternatif'] ?>"><?php echo $a['nama_alternatif'] ?></option>

                        <?php 
                        $data1 = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
                        while ($a1 = mysqli_fetch_array($data1)) { ?>
                            <option value="<?php echo $a1['id_alternatif'] ?>"><?php echo $a1['nama_alternatif'] ?></option>
                        <?php } ?>

                    </select>
                </div>

                <?php 
                $hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                while ($baris = mysqli_fetch_array($hasil)) {
                    $idK = $baris['id_kriteria'];
                    $labelK = $baris['nama_kriteria'];
                    $id_alternatif = $_GET['id_alternatif'];

                    $hasil1 = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_kriteria='$idK' AND id_alternatif='$id_alternatif'");
                    $baris1 = mysqli_fetch_array($hasil1);
                    $id_subkriteria = $baris1['id_subkriteria'];

                    echo "<div class='form-group'>
                            <label>".$labelK."</label>";
                    echo "<select name='".$idK."' class='form-control'>";

                    $hasil2 = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='$idK' ORDER BY nilai_subkriteria DESC");
                    while ($baris2 = mysqli_fetch_array($hasil2)) {
                        if ($baris2['id_subkriteria'] == $id_subkriteria) {
                            echo "<option selected value='".$baris2['id_subkriteria']."'>".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].")</option>";
                        } else {
                            echo "<option value='".$baris2['id_subkriteria']."'>".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].")</option>";
                        }
                    }

                    echo "</select></div>";
                } ?>

                <div class="modal-footer">
                    <a href="penilaian.php" class="btn btn-info">Batal</a>
                    <input type="submit" class="btn btn-danger" value="Ubah">
                </div>
            </form>

        </div>
    
    <?php } } ?>  
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