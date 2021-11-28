<?php
include('koneksi.php');
session_start();
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id = $_GET['data'];
        var_dump($id);
        $sql = "SELECT * FROM buku_table WHERE id_buku='$id'";
        $query = mysqli_query($kon, $sql);
        $jumlah_f = mysqli_num_rows($query);
        if ($jumlah_f > 0) {
            while ($data_f = mysqli_fetch_row($query)) {
                $foto = $data_f[1];
                //menghapus foto dalam folder foto
                unlink("img/$foto.jpg");
            }
            $sql_dh = "delete from `buku_table` where `id_buku` = '$id'";
            mysqli_query($kon, $sql_dh);
            header("Location:kamilia_home.php?notif=databerhasildihapus");
        }
    }
}
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
    <link rel="stylesheet" href="style.css">

    <title>Kamilia - Detail</title>
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

<section class="container shadow-lg p-4 rounded-3">
    <div class="d-flex flex-column align-items-center mb-3">
        <h2 class="fw-bold py-4">Detail Buku</h2>
        <?php
        $id = $_GET['id'];
        $q = "SELECT * FROM buku_table WHERE id_buku='$id'";
        $data = mysqli_query($kon, $q);
        //echo $qr;
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
        <img src="img/<?php echo $d["gambar"]; ?> " class="col-6 shadow mb-5">
        <div class="line col-11 bg-primary"></div>
    </div>
    <div class="container ps-5">

        <div class="mb-3">
            <p class="fw-bold p-0">Judul :</p>
            <p class="p-0"><?php echo $d["judul_buku"]; ?></p>
        </div>
        <div class="mb-3">
            <p class="fw-bold p-0">Penulis :</p>
            <p class="p-0"><?php echo $d["penulis_buku"]; ?></p>
        </div>
        <div class="mb-3 ">
            <p class="fw-bold p-0">Tahun terbit :</p>
            <p class="p-0"><?php echo $d["tahun_terbit"]; ?></p>
        </div>
        <div class="mb-3">
            <p class="fw-bold p-0">Deskripsi :</p>
            <p class="p-0"><?php echo $d["deskripsi"]; ?></p>
        </div>
        <div class="mb-3">
            <p class="fw-bold p-0">Bahasa :</p>
            <p class="p-0"><?php echo $d["bahasa"]; ?></p>
        </div>
        <div class="mb-3">
            <p class="fw-bold p-0">Tag :</p>
            <p class="p-0"><?php echo $d["tag"]; ?></p>
        </div>
        <div class="row gap-3">
            <button type="button" class="btn btn-primary col" data-bs-toggle="modal"
                    data-bs-target="#exampleModal<?php echo $id; ?>">Sunting
            </button>
            <a href="kamilia_detail.php?aksi=hapus&data=<?php echo $id; ?>" class="btn btn-danger col">Hapus</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="kamilia_edit.php" method="POST" enctype="multipart/form-data">
                            <?php
                            $query = "SELECT * FROM buku_table WHERE id_buku='$id'";
                            $data = mysqli_query($kon, $query);
                            $_SESSION['id_buku'] = $id;
                            while ($d = mysqli_fetch_array($data)) {
                                ?>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Judul Buku</label>
                                    <input name="judul_buku" type="text" class="form-control"
                                           placeholder="Contoh : Pemrograman Web bersama EAD"
                                           value="<?php echo $d["judul_buku"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Penulis</label>
                                    <input name="penulis_buku" type="text" class="form-control"
                                           value="Kamilia_1202194068" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tahun Terbit</label>
                                    <input name="tahun_terbit" type="number" class="form-control"
                                           placeholder="Contoh: 1990" value="<?php echo $d["tahun_terbit"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control"
                                              placeholder="Contoh: Buku ini menjelaskan tentang ..."
                                              required><?php echo $d["deskripsi"]; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold me-3">Bahasa</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bahasa"
                                               value="Indonesia" <?php if ($d["bahasa"] == "Indonesia") {
                                            echo "checked";
                                        } ?>>
                                        <label class="form-check-label">Indonesia</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bahasa"
                                               value="Lainnya" <?php if ($d["bahasa"] == "Lainnya") {
                                            echo "checked";
                                        } ?>>
                                        <label class="form-check-label">Lainnya</label>
                                    </div>
                                </div>
                            <?php  ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button class="btn btn-primary" type="submit" name="submit">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</section>
<footer class="d-flex flex-column align-items-center pt-5 bottom-0 pb-5 mt-5 bg-light">
    <a class="d-flex  align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
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