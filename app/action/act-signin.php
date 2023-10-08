<?php 
include("../database/koneksi.php");

session_start();
if(isset($_POST['submit'])){
    $userEmail = trim($_POST['userEmail']);
    $password = trim($_POST['password']);
    $onUpdated = date("y-m-d H:i:s a");

    if($userEmail == "" || $password == ""){
        header("location:../view/tampilan/signin.php?pesan=kosong");
        exit(0);
    }

    $data = "SELECT * FROM user_data WHERE userEmail='$userEmail' and password='$password'";
    $cek = $koneksi->prepare($data);
    $cek->execute();
    $cekdata = $cek->rowCount();

    password_verify($password, PASSWORD_DEFAULT);

    if($cekdata > 0){
        $response = array($userEmail, $password, $onUpdated);
        $response['user_data'] = array();
            if($row = $cek->fetch()){
                if($row['user_level'] == "admin"){
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_level'] = "admin";

                    header("location:../view/dashboard/dashboard.php");
                }else if($row['user_level'] == "kasir"){
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_level'] = "kasir";

                    header("location:../view/dashboard/dashboard.php");
                }
                $_SESSION['statusCek'] = true;
                $rowdata = $koneksi->prepare("UPDATE user_data SET onUpdated = '$onUpdated' WHERE userEmail = '$userEmail'");
                $rowdata->execute();
                array_push($response['user_data'], $row);
            }
        }else{
            $_SESSION['statusCek'] = false;
            header("location:../view/tampilan/signin.php?pesan=gagal");
            exit(0);
    }
}