<?php
include('koneksi.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Kamilia EAD Library</title>
</head>

<body>
<header class="p-3 bg-dark text-white mb-5">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
            <a href="kamilia_home.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="https://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" height="32" alt="">
            </a>
            <a class="btn btn-primary" href="kamilia_tambah.php" role="button">Tambah Buku</a>
        </div>
    </div>
</header>

<section class="container">
    <!-- notif -->
    <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "tambahberhasil") { ?>
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        <?php } else if ($_GET['notif'] == "editberhasil") { ?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Diubah
            </div>
        <?php } else if ($_GET['notif'] == "databerhasildihapus") { ?>
            <div class="alert alert-danger" role="alert">
                Data Berhasil DiHapus
            </div>
        <?php } ?>
    <?php } ?>
    <div class="row ">
        <?php
        $sql = "SELECT * FROM `buku_table` order by `judul_buku`";
        $query = mysqli_query($kon, $sql);
        $count = mysqli_num_rows($query);
        if ($count == 0) {
            ?>
            <div class="empty text-center">
                <h2 class="">Belum Ada Buku</h2>
                <div class="bg-primary line"></div>
                <hr class="my-2" style="height: 5px;color:#94DAFF; border-radius:20px;">
                <p>Silahkan Menambahkan Buku</p>
            </div>
            <?php
        } else {
            while ($hasil = mysqli_fetch_assoc($query)) {
                ?>
                <div class="col-4 ">
                    <div class="card px-3 mb-3 h-100">
                        <img src="img/<?php echo $hasil["gambar"]; ?>" class="card-img-top" style="object-fit:cover;"
                             alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $hasil["judul_buku"]; ?></h5>
                            <p class="card-text"><?php echo $hasil["deskripsi"]; ?></p>
                        </div>
                        <a href="kamilia_detail.php?id=<?php echo $hasil["id_buku"];; ?>" class="btn btn-primary">Tampilkan
                            Lebih Lanjut</a>
                    </div>
                </div>
            <?php }
        }
        ?>
    </div>
</section>

<footer class="d-flex flex-column align-items-center pt-5 bottom-0 pb-5 mt-5 bg-light">
    <a href="home.php" class="d-flex  align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <img src="https://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" height="32" alt="">
    </a>
    <h2 class="text-dark"> Perpustakaan EAD</h2>
    <small class="text-muted">&copy; Kamilia_1202194068</small>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>