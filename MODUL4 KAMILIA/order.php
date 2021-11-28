<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad_modul4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$date = $_POST['date'];
$nama_tempat='';
$lokasi='';
$harga=0;
session_start();
$uid=$_SESSION['uid'];

    if($_POST['selected']=='rajaampat'){
        $nama_tempat='Raja Ampat';
$lokasi='Papua';
$harga=7000000;
    }

    if($_POST['selected']=='bromo'){
        $nama_tempat='Gunung Bromo';
$lokasi='Malang';
$harga=2000000;
    }
    if($_POST['selected']=='tanahlot'){
        $nama_tempat='Tanah Lot';
$lokasi='Bali';
$harga=5000000;
    }
$sql = "INSERT INTO bookings (user_id, nama_tempat, lokasi,harga, tanggal)
VALUES ('$uid', '$nama_tempat', '$lokasi','$harga','$date')";

if (mysqli_query($conn, $sql)) {
  session_start();
  $_SESSION['order'] ='berhasil';
  header("location:index.php");
} else {
  header("location:index.php");
}

$conn->close();
?>