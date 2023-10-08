<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <?php 
        session_start();
        include("../../config/auth.php");
        include("../../config/config.php");
        include("../../database/koneksi.php");
        include("../../controller/controllerBarang.php");

        include $view;
        $lihat = new view($koneksi);

        if(isset($_GET['aksi'])){
            $aksi = $_GET['aksi'];
            if($aksi == "keluar"){
                if(isset($_SESSION['statusCek'])){
                    unset($_SESSION['statusCek']);
                    session_unset();
                    session_destroy();
                    $_SESSION = array();
                }
                header("location:../tampilan/signin.php");
                exit;
            }
        }
    ?>
    <link rel="stylesheet" href="<?=base("dist/css/all.min.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/bootstrapv5223.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/bootstrapv5222.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/card.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/col-bootstrap.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/glyphicon.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/fontawesome.min.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/style-2.css")?>">
    
    <link rel="stylesheet" href="<?=base("dist/css/dataTables.bootstrap4.css")?>">
    <link rel="stylesheet" href="<?=base("dist/css/jquery.dataTables.min.css")?>">
    
    <link rel="shortcut icon" href="<?=base("assets/icon/toko aneka.png")?>" type="image/x-icon">
    <!-- <link rel="stylesheet" href="<?=base("dist/css/bootstrap.min.css")?>"> -->
</head>
<body>
    <div class="app">
        <div class="layoutApp">
            <div class="layoutAuthenticationApp">
                <main>

                </main>
            </div>
        </div>
    </div>