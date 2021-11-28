<?php session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
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
                position:  absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                opacity: 0.80;
                background: black;
                z-index: 10;
                visibility: hidden;
            }

            #order {
                z-index: 10;
                position: fixed;
                width: 30%;
                height: 50px;
                left: 50%;
                transform: translateX(-50%);
                top: 40px;
                visibility: hidden;
            }

            #cover {
                position:  absolute;
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
    </head>
    <style>
        p {
            font-size: 12px;
        }

        table {
            border-collapse: separate !important;
            border-spacing: 0 !important;
        }

        table tr th,
        table tr td {
            border-right: 1px solid #dee2e6 !important;
            border-bottom: 1px solid #dee2e6 !important;

        }

        table tr th:first-child,
        table tr td:first-child {
            border-left: 1px solid #dee2e6 !important;
        }

        table tr td {
            border-top: 1px solid #dee2e6 !important;
        }

        table tr:first-child td:first-child {
            border-top-left-radius: 0.25rem !important;
        }

        table tr:first-child td:last-child {
            border-top-right-radius: 0.25rem !important;
        }

        table tr:last-child td:first-child {
            border-bottom-left-radius: 0.25rem !important;
        }

        table tr:last-child td:last-child {
            border-bottom-right-radius: 0.25rem !important;
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
            $("#cancel").click(function() {
                $("#order").css("visibility", "hidden");
                $("#cover").css("visibility", "hidden");
            });
            $("#rajaampat").click(function() {
                $("#order").css("visibility", "visible");
                $("#cover").css("visibility", "visible");
                $("#selected").val('rajaampat');
            });

            $("#bromo").click(function() {
                $("#order").css("visibility", "visible");
                $("#cover").css("visibility", "visible");
                $("#selected").val('bromo');
            });

            $("#tanahlot").click(function() {
                $("#order").css("visibility", "visible");
                $("#cover").css("visibility", "visible");
                $("#selected").val('tanahlot');
            });
        });
    </script>
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
                    <table style="border-collapse: collapse; border:0px !important;">
                        <tr style="border-collapse: collapse; border:0px !important;">
                            <td style="border-collapse: collapse; width: 100px;border:0px !important">Nama</td>
                            <td style="border-collapse: collapse; border:0px !important;">: Kamilia</td>
                        </tr>

                        <tr style="border-collapse: collapse; border:0px !important;">
                            <td style="border-collapse: collapse; border:0px !important;">Nim</td>
                            <td style="border-collapse: collapse; border:0px !important;">: 1202194068</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="cover"></div>
        <div id="wrap">
            <div id="order">
                <div class="alert alert-light alert-dismissible fade show" role="alert">
                    <span style="text-align: start;">Tanggal Perjalanan</span>

                    <form action="order.php" method="post">
                        <input type="text" id="selected" name="selected" value="" style="visibility: hidden;" />
                        <input class="mt-1 mb-2" style="width:110%" type="date" name="date" id="date" required>
                        <hr style="width: 116%;margin-left:-4%">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="width: 109%;">

                            <button type="button" id="cancel" class="btn btn-secondary  ">Cancel</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>

                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'berhasil') {

        $_SESSION['login'] = 'selesai';
?>
            <div class="alert alert-success m-0 p-2 alert-dismissible " role="alert">
                Berhasil Login
                <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        <?php
    }
    else if (isset($_SESSION['login']) && $_SESSION['login'] == 'gagal') {

        $_SESSION['login'] = 'selesai'; ?>
            <div class="alert alert-danger m-0 p-2 alert-dismissible " role="alert">
                Gagal Login
                <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
    }?>
        <?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'berhasil') {

        $_SESSION['order'] = 'selesai';
?>
            <div class="alert alert-success m-0 p-2 alert-dismissible " role="alert">
                Berhasil memesan tiket
                <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        <?php
    }?>
        <div class="d-flex justify-content-center align-items-center" style="margin-top: 15px;">
            <div class="row">
                <div>

                    <div class="card-body rounded col-md-12 m-0" style="height:72px;width:auto;background-color: #97c5a7;">
                        <h2 class="d-flex justify-content-center" style="margin-top: 6px;font-size: 26px;">EAD Travel</h2>
                    </div>
                    <div class="m-0 p-0" style="height:6px;width:auto;background-color: #fef8e6;"></div>
                    <div style="background-color: white;margin-left:10%;margin-right:auto;width:999px">

                        <table>
                            <tr>
                                <td>
                                    <img class="m-0" style="height:auto;width:333px;" src="img/rajaampat.jpg" alt="Raja Ampat">

                                    <div class="m-3" style="width:300px">


                                        <h6>Raja Ampat, Papua</h6>
                                        <p>
                                            Kepulauan Raja Ampat adalah kepulauan Indonesia di ujung barat laut Semenanjung Kepala Burung di Papua Barat. Terdiri dari ratusan pulau yang tertutup hutan, Raja Ampat dikenal dengan pantai dan terumbu karangnya yang kaya dengan kehidupan laut. Lukisan batu dan gua kuno berada di Pulau Misool, sedangkan cendrawasih merah hidup di Pulau Waigeo. Batanta dan Salawati adalah pulau-pulau utama lainnya di nusantara.
                                        </p>
                                        <hr>
                                        <p><b>Rp 7.000.000</b></p>

                                    </div>
                                </td>
                                <td>
                                    <img class="m-0" style="height:auto;width:333px;" src="img/bromo.jpeg" alt="Gunung Bromo">

                                    <div class="m-3" style="width:300px">


                                        <h6>Gunung Bromo, Malang</h6>
                                        <p>
                                            Gunung Bromo adalah gunung berapi somma aktif dan bagian dari pegunungan Tengger, di Jawa Timur, Indonesia. Pada 2.329 meter itu bukan puncak tertinggi dari massif, tetapi yang paling terkenal. Kawasan ini merupakan salah satu destinasi wisata yang paling banyak dikunjungi di Jawa Timur, dan gunung berapi ini termasuk dalam Taman Nasional Bromo Tengger Semeru.
                                        </p>
                                        <hr>
                                        <p><b>Rp 2.000.000</b></p>

                                    </div>
                                </td>
                                <td>
                                    <img class="m-0" style="height:auto;width:333px;" src="img/tanahlot.jpg" alt="Tanah Lot">

                                    <div class="m-3" style="width:300px">


                                        <h6>Tanah Lot, Bali</h6>
                                        <p>
                                            Tanah Lot adalah formasi batuan di lepas pantai pulau Bali, Indonesia. Ini adalah rumah bagi kuil ziarah Hindu kuno Pura Tanah Lot, ikon wisata dan budaya yang populer untuk fotografi. Di sini ada dua pura yang terletak di atas batu besar. Satu terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu. Pura Tanah Lot ini merupakan bagian dari pura Dang Kahyangan.</p>
                                        <hr>
                                        <p><b>Rp 5.000.000</b></p>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="m-1 d-flex justify-content-center btn btn-primary" id="rajaampat" style="text-align: center;<?php if (!isset($_SESSION['email'])) {
        echo 'pointer-events: none;';
    }?>" > Pesan Tiket </a>
                                </td>
                                <td>
                                    <a href="#" class="m-1 d-flex justify-content-center btn btn-primary" id="bromo" style="text-align: center;<?php if (!isset($_SESSION['email'])) {
        echo 'pointer-events: none;';
    }?>"> Pesan Tiket </a>
                                </td>
                                <td>
                                    <a href="#" class="m-1 d-flex justify-content-center btn btn-primary" id="tanahlot" style="text-align: center;<?php if (!isset($_SESSION['email'])) {
        echo 'pointer-events: none;';
    }?>"> Pesan Tiket </a>
                                </td>
                            </tr>
                        </table>
                    </div>



                    </form>
                </div>
                <?php if((isset($_COOKIE['warna']) && $_COOKIE['warna'] == 'blueocean') || !isset($_COOKIE['warna'])) { ?>
<div class="footer">
      <h6 style="text-align: center;" class="m-2">©2021 Copyright: <a href="#" class="logo">Kamilia_1202194068</a></h6>
    </div>
    <style>
    .footer {
      width: 100%;
      height: 48px;
      background: #8db7f4;
      position:  sticky;
      bottom: 0px;
      left: 0;
    }
  </style>

  <?php }else{ ?>
    <div class="footer">
      <h6 style="text-align: center;color:white" class="m-2">©2021 Copyright: <a href="#" class="logo">Kamilia_1202194068</a></h6>
    </div>
    <style>
    .footer {
      width: 100%;
      height: 48px;
      background: #2a2d31;
      position:  sticky;
      bottom: 0px;
      left: 0;
    }
  </style>
    <?php }?>
    </body>
    

    </html>

