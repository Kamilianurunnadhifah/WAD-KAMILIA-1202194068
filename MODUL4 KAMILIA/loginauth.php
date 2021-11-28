<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad_modul4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['email'];
$password = ($_POST['password']);
 $email_check="";
 $password_check="";
 
 $uid="";
$sql = "SELECT email,password,nama,id FROM users where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();
  while($row = $result->fetch_assoc()) {
    $email_check =$row["email"];
    $password_check =$row["password"];
    $nama=$row["nama"];
    $uid=$row["id"];
  }
  if($email_check==$email&&$password_check==$password){
    $_SESSION['email'] =$email;
    $_SESSION['nama'] =$nama;
    $_SESSION['uid'] =$uid;
    $_SESSION['login']='berhasil';
    if(isset($_POST['remember'])){
      setcookie('email', $email, time() + (7200), '/');
      setcookie('password', $password, time() + (7200), '/');
    }
    header("location:index.php");
  }else{
    
    $_SESSION['login']='gagal';
    header("location:login.php");}
  

} else {
  
  $_SESSION['login']='gagal';
    header("location:login.php");	
}

$conn->close();
?>