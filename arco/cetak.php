<?php
session_start();
include '../assets/conn/cek.php';
include '../assets/conn/config.php';

$filter_periode = isset($_POST['periode']) ? $_POST['periode'] : '';

$query = "SELECT * FROM tbl_alternatif";
if (!empty($filter_periode)) {
    $query .= " WHERE DATE_FORMAT(periode, '%m') = '$filter_periode'";
}
$query .= " ORDER BY id_alternatif";

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
    <!-- <h4 class="modal-title sticky-title"><b>Nilai Kriteria</b></h4>
    <br>
    <div class="table-responsive">
        <style>
        .center-table {
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto */
        }
        </style>
        <table class="table table-bordered center-table" style="width: 50%;">
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
                $no = 1;
                while ($result = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-left"><?php echo $result['nama_kriteria'] ?></td>
                    <td class="text-center"><?php echo $result['bobot_kriteria'] ?> / 13</td>
                    <td class="text-center">
                        <?php
                        $bobot = $result['bobot_kriteria'];
                        if ($result['tipe_kriteria'] == 'Cost') { // Jika tipe kriteria adalah "cost"
                            $bobot = -1 * $bobot; // Kalikan bobot dengan -1
                        }
                        echo number_format($bobot / 13, 4, '.', ',');
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>


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
<h4 class="modal-title sticky-title">Nilai Vektor S dan Vektor V</h4>
<br>
<div class="table-responsive">
        <style>
        .center-table {
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto */
        }
        </style>
        <table class="table table-bordered center-table";">
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
    <br> -->

    <!-- end  -->

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
    <script>window.print();</script>
</body>
</html>
