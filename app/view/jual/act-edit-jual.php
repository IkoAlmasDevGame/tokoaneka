<?php 
include("../../database/koneksi.php");

$id = htmlentities($_POST['id']);
$id_barang = htmlentities($_POST['id_barang']);
$jumlah = htmlentities($_POST['jumlah']);

$sql_tampil = "select * from barang where id_barang=?";
$row_tampil = $koneksi -> prepare($sql_tampil);
$row_tampil -> execute(array($id_barang));
$row = $row_tampil -> fetch();

if ($row['stok'] > $jumlah) {
    $jual = $row['harga_jual'];
    $total = $jual * $jumlah;
    $data1[] = $jumlah;
    $data1[] = $total;
    $data1[] = $id;
    $sql1 = 'UPDATE penjualan SET jumlah=?,total=? WHERE id=?';
    $row1 = $koneksi -> prepare($sql1);
    $row1 -> execute($data1);
    echo '<script>window.location="jual.php?nota=yes"</script>';
} else {
    echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
			window.location="jual.php#keranjang"</script>';
}

?>