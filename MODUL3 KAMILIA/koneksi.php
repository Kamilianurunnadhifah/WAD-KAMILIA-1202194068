<?php
	// $con = mysqli_connect("localhost","root","","modul3");
$kon = mysqli_connect("localhost", "root", "", "modul3");

//mengecek koneksi
if (mysqli_connect_errno()) {
    echo "koneksi gagal : " . mysqli_connect_errno();
}
?>