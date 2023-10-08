<?php 
if(isset($_SESSION['statusCek'])){
    if(isset($_SESSION['id_user'])){
        if(isset($_SESSION['username'])){
            if(isset($_SESSION['user_level'])){
                
            }
        }
    }
}else{
    header("location:../tampilan/signin.php");
}
?>