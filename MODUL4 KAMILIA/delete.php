<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad_modul4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id=$_POST['delete'];
$sql = "DELETE FROM bookings WHERE id='$id'";
session_start();
if ($conn->query($sql) === TRUE) {
  $_SESSION['delete']='berhasil';
  header('location:bookings.php');
} else {
    header('location:bookings.php');
}

$conn->close();
?>