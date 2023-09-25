<!doctype html>
<html lang="en">

<head>
    <title>Penerbangan Rute Pesawat</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    

    <link rel="stylesheet" href="Style.css">

    <script src="https://kit.fontawesome.com/7dc2133c4b.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'Penerbangan.php'; ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg m-0 p-0 color1">
        <div class="container container-fluid d-flex justify-content-left">
            <a href="index.php" class="navbar-brand">
                    <strong class="text-light">Rute Penerbangan Maskapai</strong>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="#daftar">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="#info">Informasi</a>
                    </li>
                </ul>
            </a>
        </div>
    </nav>

<!-- HOME-->
    <div class="container-fluid m-0 p-0 text-light text-center">
        <div class="" id="home">
            <h1>-- Airline Flight Route Information --</h1>
            <h2></h2>
            <a href="#daftar" class="btn btn-outline-light btn-lg mt-5">
  <button class="btn" type="button" style= "color:white;" >Pendaftaran Rute</button>
</a>
        </div>
    </div>

<!-- FORM DAFTAR-->
    <div class="container-fluid py-3 color2 " id="daftar">
        <h3 class="text-center text-light py-3">Pendaftaran Rute Penerbangan</h3>
        <div class="d-flex justify-content-center">
            <div class="card mb-5" style="width: 80%;">
                <div class="card-header color1"></div>
                <div class="card-body color3">
                    <div class="card-title text-center py-2"></div>
                    <form class="row g-1" action="" id="form" method="POST">
                        <input type="hidden" name="tanggal" value="<?php echo date("d-m-Y") ?>">
                        <div>
                            <label for="Maskapai" class="form-label">Maskapai</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-plane"></i></span>
                                <input type="text" name="maskapai" autocomplete="off" class="form-control" id="Maskapai">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="bandara_asal" class="form-label">Bandara Asal</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-plane-departure"></i></span>
                                <select class="form-select" name="bandara_asal" id="bandara_asal" required>
                                    <option selected disabled value="">Pilih...</option>
                                    <?php
                                    foreach ($bandara_asal as $asal => $pajak_asal) {
                                    ?>
                                        <option value="<?= $asal; ?>"><?= $asal; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="bandara_tujuan" class="form-label">Bandara Tujuan</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-plane-arrival"></i></span>
                                <select class="form-select" name="bandara_tujuan" id="bandara_tujuan" required>
                                    <option selected disabled value="">Pilih...</option>
                                    <?php
                                    foreach ($bandara_tujuan as $tujuan => $pajak_tujuan) {
                                    ?>
                                        <option value="<?= $tujuan; ?>"><?= $tujuan; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="harga_tiket" class="form-label">Harga Tiket Pesawat</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp. </span>
                                <input type="number" class="form-control" name="harga_tiket" id="harga_tiket" aria-label="Rupiah">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary color1" onclick="window.location.href='#info'" value="daftar" name="daftar" type="submit">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- INFORMASI -->
    <div class="container-fluid py-3 color1" id="info">
        <h3 class=" text-center text-light py-3">Rute Penerbangan</h3>
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 80%;">
                <?php
                if (isset($_POST['daftar'])) {
                    $tanggal           = $_POST['tanggal'];
                    $maskapai          = $_POST['maskapai'];
                    $asal              = $_POST['bandara_asal'];
                    $tujuan            = $_POST['bandara_tujuan'];
                    $harga             = $_POST['harga_tiket'];
                    $pajak             = pajak_total($bandara_asal, $asal, $bandara_tujuan, $tujuan);
                    $total             = harga_tiket($_POST['harga_tiket'], $pajak);
                }
                ?>
                <div class="card-header color2"></div>
                <div class="card-title text-center py-4"><strong>Informasi : </strong></div>
                <div class="card-body text-left">
                    <div class="row py-3">
                        <div class="col ">
                            <Strong><?php echo "Tanggal" ?></Strong>
                        </div>
                        <div class="col text-center">
                            :
                        </div>
                        <div class="col">
                            <?php echo "$tanggal" ?>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <Strong><?php echo "Maskapai" ?></Strong>
                        </div>
                        <div class="col text-center">
                            :
                        </div>
                        <div class="col">
                            <?php echo "$maskapai" ?>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <Strong><?php echo "Asal Penerbangan" ?></Strong>
                        </div>
                        <div class="col text-center">
                            :
                        </div>
                        <div class="col">
                            <?php echo "$asal" ?>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <Strong><?php echo "Tujuan Penerbangan" ?></Strong>
                        </div>
                        <div class="col text-center">
                            :
                        </div>
                        <div class="col">
                            <?php echo "$tujuan" ?>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <Strong><?php echo "Harga Tiket" ?></Strong>
                        </div>
                        <div class="col text-center">
                            :
                        </div>
                        <div class="col">
                            Rp. <?php echo "$harga" ?>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <Strong><?php echo "Pajak Tiket" ?></Strong>
                        </div>
                        <div class="col text-center">
                            :
                        </div>
                        <div class="col">
                            Rp. <?php echo "$pajak" ?>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <Strong><?php echo "Total Harga Tiket" ?></Strong>
                        </div>
                        <div class="col text-center">
                            :
                        </div>
                        <div class="col">
                            Rp. <?php echo "$total" ?>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary m-2 color2" href="#daftar" onclick="resetBtn()" role="button">Register Again</a>
            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>