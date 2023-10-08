<?php 
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

$host 	= 'localhost'; // host server
$user 	= 'root';  // username server
$pass 	= ''; // password server, kalau pakai xampp kosongin saja
$dbname = 'toko_aneka'; // nama database anda

$kon = mysqli_connect($host,$user,$pass,$dbname);
if(!$kon){
    die("Error Database : ".mysqli_connect_errno());
}

try{
   $koneksi =  new PDO("mysql:host=$host;dbname=$dbname;", $user,$pass);
}catch(PDOException $e){
    echo 'KONEKSI GAGAL' .$e -> getMessage();
}

$view = "../controller/controllerBarang.php";

?>