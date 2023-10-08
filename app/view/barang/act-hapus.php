<?php 
include("../../database/koneksi.php");
if(!empty($_GET['barang'])){
    $id = $_GET['barang'];
    $sql = "DELETE FROM barang WHERE id_barang='$id'";
    $row = $kon->query($sql);

    if(!$row){
        die("error delete : ".mysqli_errno($kon));
    }else{
        header("location:data-barang.php?pesan=delete");
    }
}
?>