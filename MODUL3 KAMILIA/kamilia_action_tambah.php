<?php
include('koneksi.php');
session_start();

$judul=$_POST['judul_buku'];
$penulis=$_POST['penulis_buku'];
$tahun=$_POST['tahun_terbit'];
$deskripsi=$_POST['deskripsi'];
$bahasa=$_POST['bahasa'];
$tag=$_POST['tag'];

$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file = $judul.".jpg";
$direktori = 'img/'.$nama_file;

$_SESSION['judul_buku']=$judul;
$_SESSION['penulis_buku']=$penulis;
$_SESSION['tahun_terbit']=$tahun;
$_SESSION['deskripsi']=$deskripsi;
$_SESSION['bahasa']=$bahasa;
$_SESSION['tag']=$tag;
$_SESSION['foto']=$nama_file;
if(empty($judul)){
    header("Location:kamilia_tambah.php?notif=tambahkosong&jenis=judul buku");
}else if(empty($tahun)){
    header("Location:kamilia_tambah.php?notif=tambahkosong&jenis=tahun terbit");
}else if(empty($deskripsi)){
    header("Location:kamilia_tambah.php?notif=tambahkosong&jenis=deskripsi");
}else if(empty($bahasa)){
    header("Location:kamilia_tambah.php?notif=tambahkosong&jenis=bahasa");
}else if(empty($tag)){
    header("Location:kamilia_tambah.php?notif=tambahkosong&jenis=tag");
}else{
    if(move_uploaded_file($lokasi_file,$direktori)){
        $taag = implode(",", $tag);
        $sql = "insert into `buku_table` (`judul_buku`, `penulis_buku`, `tahun_terbit`, `deskripsi`,`gambar`,`tag`,`bahasa`)values ('$judul', '$penulis', '$tahun', '$deskripsi','$nama_file','$taag','$bahasa')";
        mysqli_query($kon,$sql);
    }else{
        $sql = "insert into `buku_table` (`judul_buku`, `penulis_buku`, `tahun_terbit`, `deskripsi`,`tag`,`bahasa`)values ('$judul', '$penulis', '$tahun', '$deskripsi','$tag','$bahasa')";
        mysqli_query($kon,$sql);
    }
    unset($_SESSION['judul_buku']);
    unset($_SESSION['tahun_terbit']);
    unset($_SESSION['deskripsi']);
    unset($_SESSION['bahasa']);
    unset($_SESSION['tag']);
    header("Location:kamilia_home.php?notif=tambahberhasil"); 
}

?>