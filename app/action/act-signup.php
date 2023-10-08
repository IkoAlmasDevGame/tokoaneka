<?php 
include("../database/koneksi.php");

if(isset($_POST['simpan'])){
    $userEmail = trim($_POST['userEmail']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    $userLevel = trim($_POST['user_level']);
    $oncreated = date("y-m-d H:i:s a");
    $onupdated = date("y-m-d H:i:s a");

    if(!empty($_POST['userEmail'] == "") && !empty($_POST['password'] == "")){
        echo "tidak boleh kosong user email dan password";
        exit(0);
    }

    if(!empty($_POST['userEmail'])){
        $response = array(
            "userEmail" => $userEmail,
            "username" => $username,
            "password" => $password,
            "repassword" => $repassword,
            "user_level" => $userLevel,
            "onCreated" => $oncreated,
            "onUpdated" => $onupdated
        );
        $response['user_data'] = array();
        $data = "INSERT into user_data (id_user,userEmail,username,password,repassword,user_level,onCreated,onUpdated)
         VALUES ('','$userEmail','$username','$password','$repassword','$userLevel','$oncreated','$onupdated')";
        if($row = $koneksi->prepare($data)){
            array_push($response['user_data'], $response);
            header("location:../view/tampilan/signin.php");
            $row->execute();
        }else{
            header("location:../view/tampilan/signup.php");
        }
    }
}

?>