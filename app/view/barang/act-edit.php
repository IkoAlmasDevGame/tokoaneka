<?php 
include("../../database/koneksi.php");

if(isset($_POST['update'])){
    $id = trim($_POST['id']);
    $kategori = trim($_POST['kategori']);
    $nama = trim($_POST['nama']);
    $merk = trim($_POST['merk']);
    $beli = trim($_POST['beli']);
    $jual = trim($_POST['jual']);
    $satuan = trim($_POST['satuan']);
    $stok = trim($_POST['stok']);
    $tgl = trim($_POST['tgl']);

    $data = array(
        "id_barang" => $id,
        "id_kategori" => $kategori,
        "nama_barang" => $nama,
        "merk" => $merk,
        "harga_beli" => $beli,
        "harga_jual" => $jual,
        "satuan_barang" => $satuan,
        "stok" => $stok,
        "tgl_input" => $tgl
    );
    $response['barang'] = array($data);
    array_push($response['barang'], $data);
    
    $sql = "UPDATE barang SET id_kategori='$kategori', nama_barang='$nama', merk='$merk', harga_beli='$beli', harga_jual='$jual',
     satuan_barang='$satuan', stok='$stok', tgl_input='$tgl' WHERE id_barang='$id'";
    $row = $kon->query($sql);
    if(!$row){
        die("update error : ".mysqli_error($kon));
        header('location:edit.php?barang='.$id.'');
    }else{
        header("location:data-barang.php?pesan=edit");
    }
}
?>