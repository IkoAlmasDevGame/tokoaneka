<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Document Profile</title>
    <?php 
        include("../tampilan/header.php");
        include("../../database/koneksi.php");

        if(isset($_GET['id_user'])){
            $id = $_GET['id_user'];
            $row = $kon->query("SELECT * From user_data WHERE id_user = '$id'");
            $hsl = $row->fetch_array();

            if(!count($hsl)){
                ?>
                <script>
                    window.setTimeout(() => {
                        alert("database tidak dapat ditemukan.");
                        window.location.href = "../dashboard/dashboard.php";
                    });
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                window.setTimeout(() => {
                    alert("masukkan id.");
                    window.location.href = "../dashboard/dashboard.php";
                });
            </script>
            <?php
        }
    ?>
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
</head>
<body>
    <?php 
        include("../tampilan/sidebar.php");
    ?>
    <div class="main-content">
        <div class="col-xxl-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <section class="section">
                        <div class="section-header">
                            <h4 class="panel-title fw-bold"><img src="<?=base('assets/icon/toko aneka.png')?>" alt="logo" width="32"> Edit Profile</h4>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb breadcrumb-item active"><a href="../dashboard/dashboard.php" class="text-decoration-none text-primary">Halaman utama</a></div>
                                <div class="breadcrumb breadcrumb-item"><a href="user.php?id_user=<?=$id?>" class="text-decoration-none text-primary">Profile</a></div>
                            </div>
                        </div>
                    </section>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                    if(isset($_POST['update'])){
                                        $id = trim($_POST['id']);
                                        $userEmail = trim($_POST['userEmail']);
                                        $username = trim($_POST['username']);
                                        $password = trim($_POST['password']);
                                        $repassword = trim($_POST['repassword']);
                                        $user_level = trim($_POST['user_level']);

                                        $sql = "UPDATE user_data SET userEmail='$userEmail', username='$username', password='$password', repassword='$repassword', user_level='$user_level' WHERE id_user='$id'";
                                        $row = $kon->query($sql);
                                    }
                                ?>
                                <table class="table table-striped table-responsive table-sm">
                                    <form action="user.php?id_user=<?=$hsl['id_user']?>" 
                                    method="post" name="validasi_form" onsubmit="return validasi_input(this)">
                                        <input type="hidden" name="id" value="<?=$hsl['id_user']?>">
                                        <tr>
                                            <td>E-mailing : </td>
                                            <td><input type="email" name="userEmail" id="userEmail" class="form-control" value="<?=$hsl['userEmail']?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Panggilan : </td>
                                            <td><input type="text" name="username" id="username" class="form-control" value="<?=$hsl['username']?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Password : </td>
                                            <td><input type="password" name="password" onchange="checkpass()" id="pass" class="form-control" placeholder="masukkan password anda" value="<?=htmlspecialchars($hsl['password'])?>" require>
                                            <input type="checkbox" onclick="shw()"> show password
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Repassword : </td>
                                            <td><input type="password" name="repassword" onchange="checkpass()" id="repass" class="form-control" placeholder="masukkan repassword anda" value="<?=htmlspecialchars($hsl['repassword'])?>" require>
                                            <input type="checkbox" onclick="shwpass()"> show password
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan : </td>
                                            <td>
                                                <select name="user_level" class="form-control custom-select-sm">
                                                    <option value="<?=$hsl['user_level']?>"><?=$hsl['user_level']?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" name="update" type="submit">
                                                        <i class="fas fa-save mx-3"></i>Update</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include("../tampilan/footer.php");
    ?>