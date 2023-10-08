<?php 
include("../../database/koneksi.php");
$nama= trim($_POST['kategori']);
$tgl= date("j F Y, G:i");
$row = array(
    "nama_kategori" => $_POST['nama_kategori'],
    "tgl_input" => date("j F Y, G:i")
);
$sql = "INSERT INTO kategori (id_kategori,nama_kategori,tgl_input) VALUES ('','$nama','$tgl')";
$row = $kon->query($sql);
$response = array();
$response['kategori'] = array_push($response['kategori'], $row);
header("location:data-kategori.php");
?>