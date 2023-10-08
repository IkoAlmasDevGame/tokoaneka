<?php 
include("../../database/koneksi.php");

$id = $_GET['id'];

// get tabel barang id_barang
$sql = 'SELECT * FROM barang WHERE id_barang = ?';
$row = $koneksi->prepare($sql);
$row->execute(array($id));
$row = $row->fetch();

if ($row['stok'] > 0) {
    $jumlah = 1;
    $total = $row['harga_jual'];
    $tgl = date("j F Y, G:i");

    $data1[] = $id;
    $data1[] = $jumlah;
    $data1[] = $total;
    $data1[] = $tgl;

    $sql1 = 'INSERT INTO penjualan (id_barang,jumlah,total,tanggal_input) VALUES (?,?,?,?)';
    $row1 = $koneksi->prepare($sql1);
    $row1 -> execute($data1);

        header("location:jual.php?nota=yes");
    }else{
        echo '<script>alert("Stok Barang Anda Telah Habis !");"</script>';
        header("location:jual.php#keranjang");
}

?>