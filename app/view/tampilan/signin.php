<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Log In</title>

    <?php 
        include("../../config/config.php");
    ?>
    <link rel="stylesheet" href="<?=base("dist/css/all.min.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/bootstrapv5223.css")?>">
    <!-- <link rel="stylesheet" href="<?=base("dist/css/bootstrap.min.css")?>"> -->
    <link rel="stylesheet" href="<?=base("dist/css/card.css")?>">
    <!-- <link rel="stylesheet" href="<?=base("dist/css/col-bootstrap.css")?>"> -->
    <link rel="stylesheet" href="<?=base("dist/css/glyphicon.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/fontawesome.min.css")?>">

    <link rel="shortcut icon" href="<?=base("assets/icon/toko aneka.png")?>" type="image/x-icon">
</head>
<body style="background: -webkit-linear-gradient(left, rgb(210, 100, 100), rgb(125, 100, 225), rgb(210, 100, 100));">
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

                                <a href="../index.php" class="text-decoration-none text-large navbar-brand">
                                    <img src="<?=base('assets/icon/toko aneka.png')?>" alt="Logo" style="width: 32px;"
                                        class="nav-pills">
                                    Toko Aneka
                                </a>

                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="navbar-item">
                                            <a href="../index.php" class="nav-link m-2 menu-item nav-active">Beranda</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="signin.php" class="nav-link m-2 menu-item">Login</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="#" onclick="if(confirm('Apakah anda ingin membuat akun baru ?')){ window.location.href ='../tampilan/signup.php'} else { window.location.href ='../tampilan/signin.php'}" class="nav-link m-2 menu-item">Register</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>

                    <main role="alert">
                    <?php 
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "kosong"){
                                ?>
                                <div class="alert alert-warning" role="alert">
                                <strong>Perhatian!</strong> UserEmail dan Password tidak boleh kosong.
                                    <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                     onclick="window.location = 'signin.php'">
					                    <span aria-hidden='true'>&times;</span>
					                </button>
                                </div>
                                <?php
                            }
                            if($_GET['pesan'] == "gagal"){
                                ?>
                                <div class="alert alert-info" role="alert">
                                    <strong>Perhatian!</strong> Mohon Cek Kembali Username dan Password Anda.
                                    <button class="close" type="button" data-bs-dismiss="alert" aria-label="Close"
                                     onclick="window.location='signin.php'">
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <?php
                            }
                            if($_GET['pesan'] == "belummasuk"){
                                ?>
                                <div class="alert alert-warning" role="alert">
                                    <strong>Perhatian!</strong> Mohon maaf anda belum terdaftar di system kami.
                                    <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                     onclick="window.location = 'signin.php'">
					                    <span aria-hidden='true'>&times;</span>
					                </button>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </main>

                    <div class="col-xxl-12 pt-2" style="margin-top:80px; margin-bottom:0; margin-right:0; margin-left:0;">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="panel panel-default pt-5">
                                <div class="col-xl-11 pb-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title navbar-brand">
                                                <img src="<?=base('assets/icon/toko aneka.png')?>" alt="Logo"
                                                    style="width: 32px;" class="nav-pills me-5">
                                                Log In Toko Aneka
                                            </h4>
                                        </div>
                                        <div class="card-body col-xl-11">
                                            <form action="../../action/act-signin.php" method="post">
                                                <fieldset class="form-group row align-items-center pt-1">
                                                    <label class="col-lg-1 ms-3 me-3 text-center align-items-center">
                                                        <i class="fa fa-envelope mt-2" style="font-size: 20px;"></i>
                                                    </label>
                                                    <div class="col-lg-10 col-md-2 align-items-center">
                                                        <input type="email" name="userEmail" class="form-control" placeholder="masukkan email anda" require>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group row align-items-center pt-1">
                                                    <label class="col-lg-1 ms-3 me-3 text-center align-items-center">
                                                        <i class="fa fa-lock mt-2" style="font-size: 20px;"></i>
                                                    </label>
                                                    <div class="col-lg-10 col-md-2 align-items-center">
                                                        <input type="password" name="password" id="pass" class="form-control" placeholder="masukkan password anda" require>
                                                        <input type="checkbox" onclick="shw()"> show password
                                                    </div>
                                                </fieldset>
                                                <div class="card-footer">  
                                                    <div class="text-center pt-2">
                                                        <a href="" class="text-danger" style="text-decoration: none;">forget password</a>
                                                    </div>                                               
                                                    <div class="modal-footer pt-5">
                                                        <button class="btn btn-primary btn-md" name="submit" type="submit"><i class="fas fa-sign-in-alt"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mulai Footer -->
                    <section class="fixed-bottom">
                        <footer class="text-center text-lg-start text-white bg-secondary">
                            <div class="text-start pt-3 ms-2" style="background-color: rgba(0, 0, 0, 0.025);">
                                © 2023 Copyright:
                                <a class="text-reset fw-bold" href="../index.php">By developer</a>
                            </div>
                        </footer>
                    </section>
                    <!-- Akhir Footer -->

                </main>
            </div>
        </div>
    </div>
    <script src="<?=base('dist/modules/all.js')?>" type="text/javascript"></script>
    <script src="<?=base('dist/modules/bootstrap.bundle.js')?>" type="text/javascript"></script>
    <script>
        function shw(){
            var pass = document.getElementById('pass').type;
            if(pass == "password"){
                document.getElementById('pass').type = "text";
            }else{
                document.getElementById('pass').type = "password";
            }
        }
    </script>
</body>
</html>