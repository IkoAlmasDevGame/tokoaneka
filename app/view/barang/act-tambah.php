<?php 
include("../../database/koneksi.php");

if(isset($_POST['submit'])){
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
    $sql = "INSERT into barang (id,id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input)
     VALUES ('','$id','$kategori','$nama','$merk','$beli','$jual','$satuan','$stok','$tgl')";
    if($kon->query($sql)){
        array_push($response['barang'], $data);
        header("location:data-barang.php?pesan=tambah");
    }     
}
?>