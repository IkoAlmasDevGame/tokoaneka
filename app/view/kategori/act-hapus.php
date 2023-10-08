<?php 
include("../../database/koneksi.php");
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM kategori WHERE id_kategori='$id'";
    $row = $kon->query($sql);

    if(!$row){
        die("error delete : ".mysqli_errno($kon));
    }else{
        header("location:data-barang.php?pesan=delete");
    }
}
?>