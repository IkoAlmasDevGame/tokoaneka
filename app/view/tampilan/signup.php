<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Register</title>

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
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>

                    <div class="col-xl-12 pt-5" style="margin-top:0px; margin-bottom:0; margin-right:0; margin-left:0;">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="panel panel-default pt-5">
                                <div class="col-xl-11 pb-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title navbar-brand">
                                                <img src="<?=base('assets/icon/toko aneka.png')?>" alt="Logo"
                                                    style="width: 32px;" class="nav-pills me-5">
                                                Sign Up Toko Aneka
                                            </h4>
                                        </div>
                                        <div class="card-body col-xl-10">
                                            <form action="../../action/act-signup.php" method="post" name="validasi_form" onsubmit="return validasi_input(this)">
                                                <fieldset class="form-group row align-items-center pt-2">
                                                    <label class="col-lg-1 ms-3 me-3 text-center align-items-center">
                                                        <i class="fa fa-envelope mt-2" style="font-size: 20px;"></i>
                                                    </label>
                                                    <div class="col-lg-10 col-md-4 align-items-center">
                                                        <input type="email" name="userEmail" id="userEmail" class="form-control" placeholder="masukkan email anda" require>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group row align-items-center pt-2">
                                                    <label class="col-lg-1 ms-3 me-3 text-center align-items-center">
                                                        <i class="fas fa-user-alt mt-2" style="font-size: 20px;"></i>
                                                    </label>
                                                    <div class="col-lg-10 col-md-4 align-items-center">
                                                        <input type="text" name="username" id="username" class="form-control" placeholder="masukkan nama anda" require>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group row align-items-center pt-1">
                                                    <label class="col-lg-1 ms-3 me-3 text-center align-items-center">
                                                        <i class="fa fa-lock mt-2" style="font-size: 20px;"></i>
                                                    </label>
                                                    <div class="col-lg-10 col-md-4 align-items-center">
                                                        <input type="password" name="password" onchange="checkpass()" id="pass" class="form-control" placeholder="masukkan password anda" require>
                                                        <input type="checkbox" onclick="shw()"> show password
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group row align-items-center pt-1">
                                                    <label class="col-lg-1 ms-3 me-3 text-center align-items-center">
                                                        <i class="fa fa-lock mt-2" style="font-size: 20px;"></i>
                                                    </label>
                                                    <div class="col-lg-10 col-md-4 align-items-center">
                                                        <input type="password" name="repassword" onchange="checkpass()" id="repass" class="form-control" placeholder="masukkan repassword anda" require>
                                                        <input type="checkbox" onclick="shwpass()"> show password
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group row align-items-center pt-1">
                                                    <label class="col-lg-1 ms-3 me-3 text-center align-items-center">
                                                        <i class="fas fa-id-card-alt mt-2" style="font-size: 20px;"></i>
                                                    </label>
                                                    <div class="col-lg-10 col-md-4 align-items-center">
                                                        <select name="user_level" class="form-control">
                                                            <option value="">Pilih Jabatan</option>
                                                            <option value="admin">Administrasi</option>
                                                            <option value="kasir">Cashier</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                                <div class="card-footer"> 
                                                    <div class="text-center" id="text"></div>                                                   
                                                    <div class="modal-footer pt-5">
                                                        <button class="btn btn-primary btn-md" name="simpan" type="submit"><i class="fas fa-save"></i></button>
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
        function validasi_input(form){
            var minchar = 8;
            pola_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;

            if(form.username.value == ""){
                alert("username harus diisi");
                form.username.focus();
                return (false);
            }else if(form.username.value.length <= minchar){
                alert("username harus lebih dari 8 karakter");
                form.username.focus();
                return (false);
            }else if(form.userEmail == ""){
                alert("Email Harus Diisi!");
                form.username.focus();
                return (false);
            }else if(!pola_email.test(form.userEmail.value)){
                alert ('Penulisan Email tidak benar');
                form.userEmail.focus();
                return (false);
            }else if(form.pass.value == ""){
                alert("Password Tidak Boleh kosong!");
                form.pass.focus();
                return (false);
            }else if(form.repass.value == ""){
                alert("Re Password Tidak Boleh kosong!");
                form.repass.focus();
                return (false);
            }else{
                return (true);
            }
        }

        function checkpass(){
            var pass_1 = document.getElementById('pass');
            var repass_1 = document.getElementById('repass');
            var message = document.getElementById('text');
            
            var warnabenar = "#66cc66";
            var warnasalah = "#ff6666";

            if(pass_1.value == repass_1.value){
                document.validasi_form.simpan.disabled = false;
                pass_1.style.backgroundColor = warnabenar;
                repass_1.style.backgroundColor = warnabenar;
                message.style.color = warnabenar;
                message.innerHTML = "";
            }else{
                document.validasi_form.simpan.disabled = true;
                alert("password tidak cocok !");
                repass_1.style.backgroundColor = warnasalah;
                message.style.color = warnasalah;
                message.innerHTML = "";
            }
        }

        function shw(){
            var pass = document.getElementById('pass').type;
            if(pass == "password"){
                document.getElementById('pass').type = "text";
            }else{
                document.getElementById('pass').type = "password";
            }
        }

        function shwpass(){
            var pass = document.getElementById('repass').type;
            if(pass == "password"){
                document.getElementById('repass').type = "text";
            }else{
                document.getElementById('repass').type = "password";
            }
        }
    </script>
</body>

</html>