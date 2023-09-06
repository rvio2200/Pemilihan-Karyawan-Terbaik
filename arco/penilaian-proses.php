<?php
include '../assets/conn/config.php';

if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'proses-tambah') {
        $id_alternatif = $_GET['id_alternatif'];
        $id_periode = $_POST['id_periode'];

        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while ($a = mysqli_fetch_array($data)) {
            $idK = $a['id_kriteria'];
            $idS = $_POST[$idK];

            $query = "INSERT INTO tbl_nilai(id_alternatif, id_periode, id_kriteria, id_subkriteria) VALUES ('$id_alternatif', '$id_periode', '$idK', '$idS')";
            $result = mysqli_query($conn, $query);
        }

        header("location: penilaian.php");

    } elseif ($_GET['proses'] == 'proses-ubah') {
        $id_alternatif = $_GET('id_alternatif');
        $id_periode = $_POST['id_periode'];

        // Hapus semua nilai sebelumnya untuk id_alternatif yang bersangkutan
        $query1 = "DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif' AND id_periode='$id_periode'";
        $result1 = mysqli_query($conn, $query1);

        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while ($a = mysqli_fetch_array($data)) {
            $idK = $a['id_kriteria'];
            $idS = $_POST[$idK];

            $query = "INSERT INTO tbl_nilai(id_alternatif, id_periode, id_kriteria, id_subkriteria) VALUES ('$id_alternatif', '$id_periode', '$idK', '$idS')";
            $result = mysqli_query($conn, $query);
        }

        header("location: penilaian.php");

    } elseif ($_GET['proses'] == 'proses-hapus') {
        $id_periode = $_GET['id_periode'];

        // Menghapus nilai dari tbl_nilai
        mysqli_query($conn, "DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif'");

        header("location: penilaian.php");
    }
}
?>
