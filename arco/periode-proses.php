<?php
include '../assets/conn/config.php';
// Proses penambahan periode penilaian
if (isset($_GET['proses'])) {
    if ($_GET['proses']=='proses-tambah') {
    $nama_Periode = $_POST['nama_periode'];
    $tanggal_Mulai = $_POST['tanggal_mulai'];
    $tanggal_Selesai = $_POST['tanggal_selesai'];

        $mysqli_query = "INSERT INTO tbl_periode (nama_periode, tanggal_mulai, tanggal_selesai) 
        VALUES ('$nama_Periode', '$tanggal_Mulai', '$tanggal_Selesai')";
        $result = mysqli_query($conn, $mysqli_query);

    header("location: periode.php");

}elseif ($_GET['proses']=='proses-ubah') {
    $id_periode = $_POST['id_periode'];
    $nama_periode = $_POST['nama_periode'];

    mysqli_query($conn,"UPDATE tbl_periode set nama_periode='$nama_periode' WHERE id_periode='$id_periode'");
    header("location:periode.php");

}elseif ($_GET['proses']=='proses-hapus') {
    $id_periode = $_GET['id_periode'];
    mysqli_query($conn,"DELETE FROM tbl_periode WHERE id_periode='$id_periode'");
    header("location:periode.php");

}
}
?>