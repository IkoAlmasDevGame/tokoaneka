<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Toko Aneka By Iko Almas</title>
    <?php 
        include("../config/config.php");
    ?>
    <link rel="stylesheet" href="<?=base("dist/css/all.min.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/bootstrapv5223.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/glyphicon.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/fontawesome.min.css")?>">

    <link rel="shortcut icon" href="<?=base("assets/icon/toko aneka.png")?>" type="image/x-icon">
</head>
<body>
    <div class="app">
        <div class="layoutApp">
            <div class="layoutAuthenticationApp">
                <main role="main">
                    <header>
                        <nav class="navbar navbar-default navbar-expand-lg sticky-top">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-bs-toggle="collapse"
                                        data-bs-target="#bs-example-navbar-collapse">
                                        <span class="sr-only">navigation</span> Menu <i class="fa fa-bars"></i>
                                    </button>
                                </div>

                                <a href="index.php" class="text-decoration-none text-large navbar-brand">
                                    <img src="<?=base('assets/icon/toko aneka.png')?>" alt="Logo" style="width: 32px;"
                                        class="nav-pills">
                                    Toko Aneka
                                </a>

                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="navbar-item">
                                            <a href="index.php" class="nav-link m-2 menu-item nav-active">Beranda</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="tampilan/signin.php" class="nav-link m-2 menu-item">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>

                    <!-- Mulai -->
                    <div class="jumbotron">
                        <img src="<?=base('assets/icon/toko aneka.png')?>" alt="Logo" style="width: 180px; margin-bottom:-25rem;" class="nav-pills">          
                        <div class="container me-1">
                            <div class="col-md-8">
                                <h2 class="display-1">Selamat Datang Di, Toko Aneka</h2>
                                <p>
                                    Selamat datang di toko aneka, disini toko aneka menjual banyak produk
                                    seperti produk makanan, minuman, peralatan sekolah, peralatan dapur,
                                    dan masih banyak yang lainnya.
                                </p>
                                <p>
                                    <a href="index.php" class="btn btn-primary btn-lg" role="button">
                                        Toko Aneka
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir -->

                    <!-- Mulai -->
                    <div class="jumbotron" style="margin-top: 10vh; margin-bottom:15vh;">
                        <div class="container d-flex justify-content-between align-items-center">
                            <div class="col-md-12 me-5 pe-5">
                                <h3 class="display-2 me-1 pb-1 ms-2 text-center">About Toko Aneka</h3>
                                <p class="text-black pb-2">Information Toko Aneka :</p>
                                <p class="jumbotron bg-dark col-md-12 mb-5 text-white" style="font-size:15px;">
                                    Toko Aneka Indonesia, Menjual produk produk yang sangat berkulitas untuk para
                                    pembeli di toko kami. toko kami menjual banyak barang yang tersedia untuk para pembeli
                                    seperti : <br>
                                    1. Makanan, <br>
                                    2. Minuman, <br>
                                    3. Peralatan Sekolah, <br>
                                    4. Peralatan Dapur, <br>
                                    5. dan lain lain.
                                </p>
                            </div>

                            <div class="col-md-12 me-5 pe-5" style="margin-top: -15rem;">
                                <h3 class="display-2 me-1 ms-1 pb-1 text-center">Social Media Toko Aneka</h3>
                                <p class="text-black pb-2">social media :</p>
                                <p class="jumbotron bg-dark col-md-12 mb-5">
                                    <a href="" class="">
                                        <i class="fab fa-whatsapp text-white col-md-offset-1" style="font-size:26px;"></i>
                                    </a>
                                    <a href="" class="">
                                        <i class="fa fa-envelope text-white col-md-offset-1" style="font-size:26px;"></i>
                                    </a>
                                    <a href="" class="">
                                        <i class="fab fa-facebook text-white col-md-offset-1" style="font-size:26px;"></i>
                                    </a>
                                    <a href="" class="">
                                        <i class="fab fa-linkedin text-white col-md-offset-1" style="font-size:26px;"></i>
                                    </a>
                                    <a href="" class="">
                                        <i class="fab fa-instagram text-white col-md-offset-1" style="font-size:26px;"></i>
                                    </a>
                                    <a href="" class="">
                                        <i class="fab fa-youtube text-white col-md-offset-1" style="font-size:26px;"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir -->

                    <!-- Mulai Footer -->
                    <section class="">
                        <footer class="text-center text-lg-start text-white bg-secondary">
                            <div class="text-start pt-3 ms-2" style="background-color: rgba(0, 0, 0, 0.025);">
                                © 2023 Copyright:
                                <a class="text-reset fw-bold" href="index.php">By developer</a>
                            </div>
                        </footer>
                    </section>
                    <!-- Akhir Footer -->
                </main>
                <!-- main akhir -->
            </div>
        </div>
    </div>
    <script src="<?=base("dist/modules/all.js")?>" lang="javascript"></script>
    <script src="<?=base("dist/modules/bootstrap.bundle.js")?>" lang="javascript"></script>
    <script src="<?=base("dist/modules/fontawesome.js")?>" lang="javascript"></script>
</body>
</html>