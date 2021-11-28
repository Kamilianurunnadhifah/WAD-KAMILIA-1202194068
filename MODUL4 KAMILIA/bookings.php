<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad_modul4";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$uid = $_SESSION['uid'];
$sql = "SELECT * FROM bookings where user_id='$uid'";
$result = $conn->query($sql);
$total = 0;

if (!isset($_SESSION['email'])) {
  header("location:login.php");
}

function rupiah($angka)
{
  return "Rp " . number_format($angka, 0, '.', '.');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.js" integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    #top-message {
      z-index: 10;
      position: fixed;
      width: 30%;
      height: 50px;
      left: 50%;
      transform: translateX(-50%);
      top: 40px;
      visibility: hidden;
    }

    #coverz {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      opacity: 0.80;
      background: black;
      z-index: 10;
      visibility: hidden;
    }
  </style>
  <script>
    $(document).ready(function() {
      $("#te").click(function() {
        $("#top-message").css("visibility", "hidden");
        $("#coverz").css("visibility", "hidden");
      });
      $(".logo").click(function() {
        $("#top-message").css("visibility", "visible");
        $("#coverz").css("visibility", "visible");
      });

    });
  </script>
</head>
<style>
  p {
    font-size: 12px;
  }
</style>
<?php if ((isset($_COOKIE['warna']) && $_COOKIE['warna'] == 'blueocean') || !isset($_COOKIE['warna'])) { ?>
  <nav class="navbar navbar-light " style="background-color: #8db7f4;">
    <a class="navbar-brand ms-4" href="index.php">
      <b>EAD Travel</b>
    </a>
    <div class="navbar-brand ms-auto me-4 navbar-expand-lg">
    <?php

    if (!isset($_SESSION['email'])) {


    ?>
      <a class="navbar-brand " href="register.php" style="color: white;">
        Register
      </a>
      <a class="navbar-brand" style="color:grey" href="login.php">
        Login
      </a>
    <?php
    } else {
    ?>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li><a href="bookings.php"><img src="img/cart-white.png" style="margin-top: 10px;width:30px;height:auto" alt=""></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" style="color: white;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['nama']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="profile.php">Profil</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>

      </div><?php } ?>
    </div>

  </nav>
<?php
} else {
?>
  <nav class="navbar navbar-light " style="background-color: #2a2d31;">
    <a class="navbar-brand ms-4" href="index.php">
      <b style="color: white;">EAD Travel</b>
    </a>
    <div class="navbar-brand ms-auto me-4 navbar-expand-lg">
      <?php

      if (!isset($_SESSION['email'])) {


      ?>
        <a class="navbar-brand " href="register.php" style="color: white;">
          Register
        </a>
        <a class="navbar-brand" style="color:grey" href="login.php">
          Login
        </a>
      <?php
      } else {
      ?>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li><a href="bookings.php"><img src="img/cart-white.png" style="margin-top: 10px;width:30px;height:auto" alt=""></a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" style="color: white;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['nama']; ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="profile.php">Profil</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      <?php } ?>
    </div>

  </nav>
<?php } ?>

<body style="background-color: #fef8e6;">
  <div id="coverz"></div>
  <div id="wrap">
    <div id="top-message">
      <div class="alert alert-light alert-dismissible fade show" role="alert">
        <strong style="text-align: start;">Created By</strong>
        <button type="button" id="te" class="btn-close"></button>
        <br>
        <hr style="width: 116%;margin-left:-4%">
        <table>
          <tr>
            <td style="width: 100px;">Nama</td>
            <td>: Kamilia</td>
          </tr>
          <tr>
            <td>Nim</td>
            <td>: 1202194068</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'berhasil') {
    $_SESSION['delete'] = 'selesai';
  ?>
    <div class="alert alert-success m-0 p-2 alert-dismissible " role="alert">
      Berhasil dihapus!
      <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
  <?php
  } ?>
  <div class="d-flex justify-content-center" style="margin-top: 15px;">
    <div class="card p-3">
      <table class=" table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Tempat</th>
            <th>Lokasi</th>
            <th>Tanggal Perjalanan</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <form method="post" action="delete.php">
            <?php
            if ($result->num_rows > 0) {
              $index = 1;
              while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<th scope="row">' . ($index) . '</th>';
                echo '<td>' . $row["nama_tempat"] . '</td>';
                echo '<td>' . $row["lokasi"] . '</td>';
                echo '<td>' . $row["tanggal"] . '</td>';
                echo '<td class="money">' . rupiah($row["harga"]) . '</td>';
                echo '<td><button type="submit" name="delete" value="' . $row["id"] . '" class="btn btn-danger">Hapus</button></td>';
                echo '</tr>';
                $index += 1;
                $total += $row["harga"];
              }
            } else {
            }
            ?>
          </form>
          <tr>
            <th scope="row">Total</th>
            <td></td>
            <td></td>
            <td></td>
            <td><b><?php echo rupiah($total); ?></b></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php if ((isset($_COOKIE['warna']) && $_COOKIE['warna'] == 'blueocean') || !isset($_COOKIE['warna'])) { ?>
      <div class="footer">
        <h6 style="text-align: center;" class="m-2">©2021 Copyright: <a href="#" class="logo">Kamilia_1202194068</a></h6>
      </div>
      <style>
        .footer {
          width: 100%;
          height: 48px;
          background: #8db7f4;
          position: fixed;
          bottom: 0px;
          left: 0;
        }
      </style>

    <?php } else { ?>
      <div class="footer">
        <h6 style="text-align: center;color:white" class="m-2">©2021 Copyright: <a href="#" class="logo">Kamilia_1202194068</a></h6>
      </div>
      <style>
        .footer {
          width: 100%;
          height: 48px;
          background: #2a2d31;
          position: fixed;
          bottom: 0px;
          left: 0;
        }
      </style>
    <?php } ?>
</body>

</html>
<?php
