<?php 
include("../../database/koneksi.php");

$sqlI = "DELETE FROM nota";
$rowI = $koneksi->prepare($sqlI);
$rowI->execute();
header("location:jual.php?nota=yes#kasirnya");
?>