<?php 
include("../../database/koneksi.php");

if (!empty($_GET['cari_barang'])) {
    if(isset($_POST['keyword'])){
        $cari = strip_tags(trim($_POST['keyword']));
        if($cari == ''){   
        }else{
            $sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
            from barang inner join kategori on barang.id_kategori = kategori.id_kategori
            where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";            
            
            $row = $koneksi -> prepare($sql);
            $row -> execute();
            $row = $row -> fetchAll();
        }
?>
    <table class="table table-striped table-bordered" id="example1">
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
        </tr>
<?php foreach ($row as $hasil) {
        ?>
        <tr>
            <td><?php echo $hasil['id_barang'];?></td>
            <td><?php echo $hasil['nama_barang'];?></td>
            <td><?php echo $hasil['merk'];?></td>
            <td><?php echo $hasil['harga_jual'];?></td>
            <td>
                <a class="btn btn-success" href="act-tambah.php?id=<?=$hasil['id_barang']?>">
                    <i class="fa fa-shopping-cart"></i></a>
            </td>
        </tr>
    <?php }?>
    </table>
    <?php
    }
}

?>