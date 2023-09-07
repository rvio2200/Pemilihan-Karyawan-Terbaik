<?php
include '../assets/conn/config.php';

if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'proses-tambah') {
        $id_alternatif = $_POST['id_alternatif'];
        $id_periode = $_POST['id_periode'];

        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while ($a = mysqli_fetch_array($data)) {
            $idK = $a['id_kriteria'];
            $idS = $_POST[$idK];

            $query = "INSERT INTO tbl_nilai(id_alternatif, id_periode, id_kriteria, id_subkriteria) VALUES ('$id_alternatif', '$id_periode', '$idK', '$idS')";
            $result = mysqli_query($conn, $query);
        }

        header("location: penilaian-tambah.php");

    } elseif ($_GET['proses'] == 'proses-ubah') {
        $id_alternatif = $_GET['id_alternatif'];
        $id_periode = $_POST['id_periode'];

        // Hapus semua nilai sebelumnya untuk id_alternatif yang bersangkutan
        $query1 = "DELETE FROM tbl_nilai WHERE  id_periode='$id_periode'";
        $result1 = mysqli_query($conn, $query1);

        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while ($a = mysqli_fetch_array($data)) {
            $idK = $a['id_kriteria'];
            $idS = $_POST[$idK];

            $query = "INSERT INTO tbl_nilai(id_alternatif, id_periode, id_kriteria, id_subkriteria) VALUES ('$id_alternatif', '$id_periode', '$idK', '$idS')";
            $result = mysqli_query($conn, $query);
        }

        header("location: penilaian-tambah.php");

    } elseif ($_GET['proses'] == 'proses-hapus') {
        $id_periode = $_GET['id_periode'];

        // Menghapus nilai dari tbl_nilai
        mysqli_query($conn, "DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif'");

        header("location: penilaian.php");
    }
}
?>

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
        mysqli_query($conn, "UPDATE tbl_hasil SET vektor_s ='$vektor_s' WHERE id_alternatif='$id'");

        //Vektor V
        $query4 = mysqli_query($conn, "SELECT sum(vektor_s) as sum_s FROM tbl_hasil");
        $b = mysqli_fetch_array($query4);
        $vektor_v = $vektor_s/$b['sum_s'];

        //ambil nilai vektor_v simpan ke dalam database
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
