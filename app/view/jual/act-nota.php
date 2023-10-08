<?php 
include("../../database/koneksi.php");
if(isset($_POST['bayar'])){
    $bayar = $_POST['bayar'];
    $total = $_POST['total']; 

    $hitung = $bayar - $total;                                                    
    if($bayar >= $total){
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $total_bayar = $_POST['total_bayar'];
        $tgl_input = $_POST['tgl_input'];
        $periode = $_POST['periode'];

        $jumlah_beli = count($id_barang);
        for($x = 0; $x < $jumlah_beli; $x++){
            $row_barang = "SELECT * FROM barang WHERE id_barang ='$id_barang[$x]'";
            $row_data = $koneksi->query($row_barang);

            $sql = "INSERT INTO nota SET id_barang='$id_barang[$x]', jumlah='$jumlah[$x]', 
            total='$total_bayar[$x]', tanggal_input='$tgl_input[$x]', periode='$periode[$x]'";
            $row = $koneksi->query($sql);
            $row = array(
                "id_barang" => $id_barang[$x],
                "jumlah" => $jumlah[$x],
                "total" => $total_bayar[$x],
                "tanggal_input" => $tgl_input[$x],
                "periode" => $periode[$x]
            );

            $hsl = $row_data->fetch_array();

            $stok = $hsl['stok'];
            $idb = $hsl['id_barang'];

            $total_stok = $stok[$x] - $jumlah[$x];

            $editStok = "UPDATE barang SET stok='$total_stok[$x]' WHERE id_barang='$idb[$x]'";
            $edit = $koneksi->query($editStok);
        }
        echo "Belanjaan Berhasil Di Bayar !";
    }else{
        echo "Uang Kurang ! Rp.".$hitung;   
    }  
}
?>