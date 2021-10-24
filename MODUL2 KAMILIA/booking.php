<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<!-- merubah sedikit disuruh bang ardan -->
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Booking</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h4 class="text-center py-3">WELCOME TO ESD VENUE RESERVATION</h4>
    <div class="container mb-5">
        <div class="bg-dark">
            <p class="text-center py-2 text-white">Reserve your venue now!</p>
        </div>
        <div class="card ">
            <div class="row">

                <div class="col-6  d-flex align-items-center justify-content-center">
                    <?php

                    if (isset($_GET["type"])) {
                        $img = $_GET['type'];
                    } else {
                        $img = "Nusantara Hall";
                    }
                    ?>
                    <img src="img/<?php echo "$img" ?>.png" class="w-75" alt="">

                </div>
                <div class="col-6 ">
                    <form action="my-booking.php" method="POST" class="pe-3 my-3 needs-validation">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control " id="name " placeholder="name" value="Kamilia_1202194068" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Event Date</label>
                            <input type="date" name="date" class="form-control " id="date" aria-describedby="inputGroupPrepend2" required>
                            <div class="invalid-feedback">
                                Please choose a Event Date.
                            </div>

                        </div>

                        <label for="validationTooltip03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationTooltip03" required>
                        <div class="invalid-tooltip">
                            Please provide a valid city.
                        </div>


                        <div class="mb-3">
                            <label for="time" class="form-label">Start Time</label>
                            <input type="time" name="time" class="form-control " id="time" required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration (Hours)</label>
                            <input type="number" name="duration" class="form-control " id="duration" required>
                        </div>
                        <div class="mb-3">

                            <label for="type" class="form-label">Building Type</label>
                            <select class="form-select" name="type" id="type" required>
                                <option selected disabled>Choose...</option>
                                <?php

                                if (isset($_GET["type"])) {
                                    echo "<option selected>" . $_GET["type"];
                                    ".</option>";
                                } else {
                                    echo '
                                    <option value="Nusantara Hall">Nusantara Hall</option>
                                <option value="Garuda Hall">Garuda Hall</option>
                                <option value="Gedung Serba Guna">Gedung Serba Guna</option>
                                ';
                                }
                                ?>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control " id="phone" required>
                        </div>
                        <div class="mb-3">
                            <p for="" class="mb-0">Add Service(s)</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check1" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Catering / $700
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check2" value="2" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Decoration / $450
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check3" value="3" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Sound System / $250
                                </label>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Book</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Created by Kamilia_1202194068</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>