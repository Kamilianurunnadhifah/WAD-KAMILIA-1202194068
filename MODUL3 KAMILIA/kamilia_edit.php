<?php
session_start();
include('koneksi.php');
if (isset($_SESSION['id_buku'])) {
    $id = $_SESSION['id_buku'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis_buku'];
    $tahun = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];

    $sql = "update `buku_table` set `judul_buku`='$judul', `penulis_buku`='$penulis',`tahun_terbit`='$tahun',`deskripsi`='$deskripsi',`bahasa`='$bahasa'
		where `id_buku`=1";
    mysqli_query($kon, $sql);
    header("Location:kamilia_home.php?notif=editberhasil");

}
?>