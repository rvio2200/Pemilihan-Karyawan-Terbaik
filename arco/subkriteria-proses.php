<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'proses-tambah') {
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];

        mysqli_query($conn, "INSERT INTO tbl_subkriteria (id_kriteria, nama_subkriteria, nilai_subkriteria) VALUES ('$id_kriteria', '$nama_subkriteria', '$nilai_subkriteria')");
        header("location:subkriteria.php?id_kriteria=$id_kriteria");

    } elseif ($_GET['proses'] == 'proses-ubah') {
        $id_subkriteria = $_POST['id_subkriteria'];
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];

        mysqli_query($conn, "UPDATE tbl_subkriteria SET id_kriteria='$id_kriteria', nama_subkriteria='$nama_subkriteria', nilai_subkriteria='$nilai_subkriteria' WHERE id_subkriteria='$id_subkriteria'");
        header("location:subkriteria.php?id_kriteria=$id_kriteria");

    } elseif ($_GET['proses'] == 'proses-hapus') {
        $id_subkriteria = $_GET['id_subkriteria'];
        mysqli_query($conn, "DELETE FROM tbl_subkriteria WHERE id_subkriteria='$id_subkriteria'");
        header("location:subkriteria.php?id_kriteria=$_GET[id_kriteria]");

    }
}
?>
