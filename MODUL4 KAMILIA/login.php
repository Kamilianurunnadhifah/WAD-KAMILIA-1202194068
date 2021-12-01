<?php session_start();
if (isset($_SESSION['email'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
if (isset($_SESSION['logout']) && $_SESSION['logout'] == 'berhasil') {
    $_SESSION['logout'] = 'selesai';
    ?>
    <div class="alert alert-success m-0 p-2 alert-dismissible " role="alert">
        Berhasil logout
        <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
} ?>
<?php
if (isset($_SESSION['register']) && $_SESSION['register'] == 'berhasil') {
    $_SESSION['register'] = '';
    ?>
    <div class="alert alert-success m-0 p-2 alert-dismissible " role="alert">
        Berhasil registrasi
        <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
    <?php
}
if (isset($_SESSION['login']) && $_SESSION['login'] == 'gagal') {

    $_SESSION['login'] = 'selesai'; ?>
    <div class="alert alert-danger m-0 p-2 alert-dismissible " role="alert">
        Gagal Login
        <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
} ?>
<div class="d-flex justify-content-center align-items-center" style="margin-top: 50px;">
    <div class="col-md-3">
        <div class="card">
            <form action="loginauth.php" method="post">
                <div class="card-body">
                    <h5 class="card-title " style="text-align: center;">Login</h5>
                    <hr>
                    <h6>Email</h6>
                    <input class="mb-1" style="width:100%" type="email" name="email" id="email"
                           placeholder="Masukkan Alamat E-Mail" value="<?php if (isset($COOKIE['email'])) {
                        echo $COOKIE['email'];
                    } ?>" required>
                    <h6>Kata Sandi</h6>
                    <input class="mb-1" style="width:100%" type="password" name="password" id="password"
                           placeholder="Kata Sandi Anda" value="<?php if (isset($COOKIE['password'])) {
                        echo $COOKIE['password'];
                    } ?>" required>
                    <br>
                    <div class="mt-1">
                        <input type="checkbox" id="remember" name="remember" value="Remember">

                        <label for="remember"> Remember Me</label>
                    </div>


                    <div class="row mt-3 mb-2">
                        <div class="col-sm-3 col-md-3"></div>
                        <div class="col-sm-3 col-md-4">
                            <input class="ps-5 pe-5 btn btn-primary" type="submit" value="Login">

                        </div>
                        <div class="col-sm-3 col-md-3"></div>
                    </div>
            </form>
        </div>
        <h6 class="mb-4" style="text-align: center;">Anda belum punya akun? <a href="register.php">Register</a></h6>
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
            position: fixed;
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
            position: fixed;
            bottom: 0px;
            left: 0;
        }
    </style>
<?php } ?>

</body>

</html>
