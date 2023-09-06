<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
    if ($_GET['proses']=='proses-tambah') {
       $nama_kriteria = $_POST['nama_kriteria'];
       $bobot_kriteria = $_POST['bobot_kriteria'];
       $tipe_kriteria = $_POST['tipe_kriteria'];

       mysqli_query($conn,"INSERT into tbl_kriteria (nama_kriteria,bobot_kriteria, tipe_kriteria) values('$nama_kriteria','$bobot_kriteria','$tipe_kriteria')");
       header("location:kriteria.php");

    }elseif ($_GET['proses']=='proses-ubah') {
        $id_kriteria = $_POST['id_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $tipe_kriteria = $_POST['tipe_kriteria'];

        mysqli_query($conn,"UPDATE tbl_kriteria set nama_kriteria='$nama_kriteria', bobot_kriteria='$bobot_kriteria', tipe_kriteria='$tipe_kriteria' WHERE id_kriteria='$id_kriteria'");
        header("location:kriteria.php");

    }elseif ($_GET['proses']=='proses-hapus') {
        $id_kriteria = $_GET['id_kriteria'];
        mysqli_query($conn,"DELETE FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
        header("location:kriteria.php");

    }
}
?>