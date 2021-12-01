<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "wad_modul4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nama = $_POST['nama'];
$uid = $_SESSION['uid'];
$no_hp = $_POST['no_hp'];
if (isset($_POST['warnanavbar']) && $_POST['warnanavbar'] == 'Blue Ocean') {
    setcookie('warna', 'blueocean', time() + (7200), '/');
} else if (isset($_POST['warnanavbar']) && $_POST['warnanavbar'] == 'Dark Boba') {
    setcookie('warna', 'darkboba', time() + (7200), '/');
}
if (!isset($_POST['repassword']) || !isset($_POST['password']) || $_POST['password'] != $_POST['repassword']) {

    header("location:profile.php");
}
$sql = "UPDATE users SET nama='$nama',no_hp='$no_hp' WHERE id='$uid'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['update'] = 'berhasil';
    $_SESSION['nama'] = $nama;
    header("location:profile.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
