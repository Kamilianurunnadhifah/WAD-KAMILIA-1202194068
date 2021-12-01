<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "wad_modul4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];
if ($_POST['password'] == $_POST['repassword']) {
    header("location:register.php");
}
$sql = "INSERT INTO users (nama, email, no_hp,password)
VALUES ('$username', '$email', '$no_hp','$password')";

if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION['register'] = 'berhasil';
    header("location:login.php");
} else {
    header("location:register.php");
}

$conn->close();
?>