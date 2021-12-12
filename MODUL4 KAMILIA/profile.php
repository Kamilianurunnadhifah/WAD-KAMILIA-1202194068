<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad_modul4";

$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uid = $_SESSION['uid'];
$sql = "SELECT * FROM users where id='$uid'";
$result = $conn->query($sql);
$email = 'kamilianadhifah8@gmail.com';
$nama = '';
$no_hp = '';

if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        $email = $row["email"];
        $nama = $row["nama"];
        $no_hp = $row["no_hp"];
    }
} else {
}
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.js"
            integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            position: absolute;
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
        $(document).ready(function () {
            $("#te").click(function () {
                $("#top-message").css("visibility", "hidden");
                $("#coverz").css("visibility", "hidden");
            });
            $(".logo").click(function () {
                $("#top-message").css("visibility", "visible");
                $("#coverz").css("visibility", "visible");
            });
        });
    </script>
</head>
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
                    <li><a href="bookings.php"><img src="img/cart-white.png"
                                                    style="margin-top: 10px;width:30px;height:auto" alt=""></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" style="color: white;" id="navbarDropdownMenuLink"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <li><a href="bookings.php"><img src="img/cart-white.png"
                                                        style="margin-top: 10px;width:30px;height:auto" alt=""></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" style="color: white;"
                               id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
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
<?php
if (isset($_SESSION['update']) && $_SESSION['update'] == 'berhasil') {
    $_SESSION['update'] = '';
    ?>
    <div class="alert alert-success m-0 p-2 alert-dismissible " role="alert">
        Berhasil update profile
        <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
    <?php
} ?>


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


<div class="d-flex justify-content-center align-items-center" style="margin-top: 50px;">
    <div class="col-md-5">
        <div class="card">
            <form method="post" action="edit.php">
                <div class="card-body">
                    <h5 class="card-title " style="text-align: center;">Profile</h5><br>
                    <table>
                        <tr>
                            <td class="col-md-4">
                                <h6 class="m-2">Email</h6>
                            </td>
                            <td>
                                <div class="m-2"><?php echo $email; ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="m-2">Nama</h6>
                            </td>
                            <td><input class="m-2 col-md-7" style="width:100%" type="text" name="nama"
                                       value="<?php echo $nama; ?>" id="nama" placeholder="Masukkan Nama Lengkap">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="m-2">Nomor Handphone</h6>
                            </td>
                            <td><input class="m-2" style="width:100%" type="number" name="no_hp" id="no_hp"
                                       value="<?php echo $no_hp; ?>" placeholder="Masukkan Nomor Handphone">
                            </td>
                        </tr>
                    </table>
                    <hr class="ms-4 me-4">
                    <table>
                        <tr>
                            <td class="col-md-4 ms-2">
                                <h6 class="m-2">Kata Sandi</h6>
                            </td>
                            <td><input class="m-2" style="width:95%" type="text" name="password" id="password"
                                       onkeyup='check();' placeholder="Kata Sandi Anda">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="m-2">Konfirmasi Kata Sandi</h6>
                            </td>
                            <td><input class="m-2" style="width:95%" type="text" name="repassword" id="repassword"
                                       onkeyup='check();' placeholder="Konfirmasi Kata Sandi Anda">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="m-2">Warna Navbar</h6>
                            </td>
                            <td><input class="m-2" style="width:95%" type="text" name="warnanavbar" id="warnanavbar"
                                       value="Blue Ocean">
                            </td>
                        </tr>
                    </table>
                    <br>


                    <div class="row mt-0 mb-2">
                        <div class="col-sm-4 col-md-4"></div>
                        <div class="col-sm-2 col-md-2">
                            <button type="submit" class="ps-2 pe-2 btn btn-primary" style="text-align: center;">
                                Simpan
                            </button>

                        </div>
                        <div class="col-sm-2 col-md-2">
                            <a href="javascript:history.go(-1)" class="ps-2 pe-2 btn btn-warning"
                               style="text-align: center;"> Cancel </a>

                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


<?php if ((isset($_COOKIE['warna']) && $_COOKIE['warna'] == 'blueocean') || !isset($_COOKIE['warna'])) { ?>
    <div class="footer">
        <h6 style="text-align: center;" class="m-2">©2021 Copyright: <a href="#" class="logo">Kamilia_1202194068</a>
        </h6>
    </div>
    <style>
        .footer {
            width: 100%;
            height: 48px;
            background: #8db7f4;
            position: sticky;
            bottom: 0px;
            left: 0;
        }
    </style>

<?php } else { ?>
    <div class="footer">
        <h6 style="text-align: center;color:white" class="m-2">©2021 Copyright: <a href="#" class="logo">Kamilia_1202194068</a>
        </h6>
    </div>
    <style>
        .footer {
            width: 100%;
            height: 48px;
            background: #2a2d31;
            position: sticky;
            bottom: 0px;
            left: 0;
        }
    </style>
<?php } ?>
</body>


</html>
