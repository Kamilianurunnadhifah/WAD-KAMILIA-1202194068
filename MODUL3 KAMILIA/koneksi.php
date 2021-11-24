<?php
//	$con = mysqli_connect("localhost","root","","modul3");
$con = mysqli_connect("localhost:3307", "root", "", "modul3");

//mengecek koneksi
if (mysqli_connect_errno()) {
    echo "koneksi gagal : " . mysqli_connect_errno();
}
?>