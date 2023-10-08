<?php 
include("../../database/koneksi.php");

$dataI = $_GET['brg'];
$sql = "select * from barang where id_barang= ?";
$row = $koneksi->prepare($sql);
$row->execute(array($dataI));

$id = $_GET['id'];
$sqlI = "DELETE FROM penjualan WHERE id= ?";
$rowI = $koneksi->prepare($sqlI);
$rowI->execute(array($id));
header("location:jual.php");
?>