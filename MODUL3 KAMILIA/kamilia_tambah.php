<?php 
include('koneksi.php'); 
session_start();
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Kamilia - Tambah Buku</title>
</head>

<body>
    <header class="p-3 bg-dark text-white mb-5">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
                <a href="kamilia_home.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="https://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" height="32" alt="">
                </a>
                <a class="btn btn-primary" href="tambah.php" role="button">Tambah Buku</a>
            </div>
        </div>
    </header>
    <section class="container shadow-lg p-4 rounded-3">

        <h2 class="text-center fw-bold">Tambah data Buku</h2>
        <div class="col-sm-10">
		   <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
		   <?php if($_GET['notif']=="tambahkosong"){?>
				<div class="alert alert-danger" role="alert">Maaf data 
					<?php echo $_GET['jenis'];?> wajib di isi
				</div>
			<?php }?>
			<?php }?>
		</div>
        <form method="post" enctype="multipart/form-data" action="kamilia_action_tambah.php">
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Buku</label>
                <input name="judul_buku" id="judul_buku" type="text" class="form-control" placeholder="Contoh : Pemrograman Web bersama EAD" value="<?php if(!empty($_SESSION['judul_buku'])){ echo $_SESSION['judul_buku'];} ?>">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Penulis</label>
                <input name="penulis_buku" type="text" class="form-control" placeholder="Kamilia_1202194068" readonly value="Kamilia_1202194068">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tahun Terbit</label>
                <input name="tahun_terbit" type="number" class="form-control" placeholder="Contoh: 1990" value="<?php if(!empty($_SESSION['tahun_terbit'])){ echo $_SESSION['tahun_terbit'];} ?>">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" placeholder="Contoh: Buku ini menjelaskan tentang ..." ><?php if(!empty($_SESSION['deskripsi'])){ echo $_SESSION['deskripsi'];} ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold me-3">Bahasa</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bahasa" value="Indonesia" <?php if (isset($bahasa) && $bahasa=="indonesia"){ echo "checked";}else if(!empty($_SESSION['bahasa'])=="indonesia"){echo "checked";}?>>
                    <label class="form-check-label">Indonesia</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bahasa" value="Lainnya" <?php if (isset($bahasa) && $bahasa=="lainnya") {echo "checked";}else if(!empty($_SESSION['bahasa'])=="lainnya"){echo "checked";}?>>
                    <label class="form-check-label">Lainnya</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold me-3">Tag</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag[]" value="Pemrograman" 
                    <?php 
                        if(!empty($_SESSION['tag'])){
                            $tag  = implode(', ',  $_SESSION['tag']);
                            $checked = explode(', ',$tag); 
                            if (in_array("Pemrograman", $checked)) echo "checked";
                        }
                    ?>
                    >
                    <label class="form-check-label" for="inlineCheckbox1">Pemrograman</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag[]" value="Website" 
                    <?php 
                        if(!empty($_SESSION['tag'])){
                            $tag  = implode(', ',  $_SESSION['tag']);
                            $checked = explode(', ',$tag);
                            if (in_array("Website", $checked)) echo "checked";
                        }
                    ?>
                    >
                    <label class="form-check-label" for="inlineCheckbox1">Website</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag[]" value="Java" 
                        <?php
                            if(!empty($_SESSION['tag'])){
                                $tag  = implode(', ',  $_SESSION['tag']);
                                $checked = explode(', ',$tag); 
                                if (in_array("Java", $checked)) echo "checked";
                            }
                        ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Java</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag[]" value="OOP" 
                    <?php 
                        if(!empty($_SESSION['tag'])){
                            $tag  = implode(', ',  $_SESSION['tag']);
                            $checked = explode(', ',$tag);
                            if (in_array("OOP", $checked)) echo "checked";
                        }
                    ?>>
                    <label class="form-check-label" for="inlineCheckbox1">OOP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag[]" value="MVC" 
                    <?php 
                        if(!empty($_SESSION['tag'])){
                            $tag  = implode(', ',  $_SESSION['tag']);
                            $checked = explode(', ',$tag);
                            if (in_array("MVC", $checked)) echo "checked";
                        }
                    ?>>
                    <label class="form-check-label" for="inlineCheckbox1">MVC</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag[]" value="Kalkulus" 
                    <?php 
                        if(!empty($_SESSION['tag'])){
                            $tag  = implode(', ',  $_SESSION['tag']);
                            $checked = explode(', ',$tag);
                            if (in_array("Kalkulus", $checked)) echo "checked";
                        }
                    ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Kalkulus</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tag[]" value="Lainnya" 
                    <?php 
                        if(!empty($_SESSION['tag'])){
                            $tag  = implode(', ',  $_SESSION['tag']);
                            $checked = explode(', ',$tag);
                            if (in_array("Lainnya", $checked)) echo "checked";
                        }
                    ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Lainnya</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label fw-bold">Gambar</label>
                <input type="file" class="form-control" name="foto" id="customFile">
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary col-6" type="submit" name="submit">Tambah +</button>
            </div>
        </form>

    </section>
    <!-- footer -->
    <footer class="d-flex flex-column align-items-center pt-5 bottom-0 pb-5 mt-5 bg-light">
        <a href="/home.php" class="d-flex  align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="https://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" height="32" alt="">
        </a>
        <h2 class="text-dark"> Perpustakaan EAD</h2>
        <small class="text-muted">&copy; Kamilia_1902194068</small>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>