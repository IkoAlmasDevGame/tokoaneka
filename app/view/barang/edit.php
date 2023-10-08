<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Barang</title>
    <?php 
        include("../tampilan/header.php");
        $id = $_GET['barang'];
        $row = $lihat-> barang_edit($id);
    ?>

</head>
<body>
    <?php 
        include("../tampilan/sidebar.php");
    ?>
    <div class="main-content">
        <div class="col-xxl-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <section class="section">
                        <div class="section-header">
                            <h4 class="panel-title fw-bold">Edit Data Barang - <?php echo $row['nama_barang'] ?></h4>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/dashboard.php" class="text-decoration-none text-primary">Halaman utama</a></div>
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="data-barang.php" class="text-decoration-none text-primary">Data barang</a></div>
                                <div class="breadcrumb breadcrumb-item text-primary">Edit Data Barang</div>
                            </div>
                        </div>
                    </section>
                    <div class="col-xl-12">
                        <div class="card">
                        <div class="table-responsive">
                                <table class="table table-striped">
                                    <form action="act-edit.php" method="POST">
                                        <tr>
                                            <td>ID Barang</td>
                                            <td><input type="text" readonly="readonly" class="form-control"
                                                    value="<?php echo $row['id_barang'];?>" name="id"></td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>
                                                <select name="kategori" class="form-control">
                                                    <option value="<?php echo $row['id_kategori'];?>">
                                                        <?php echo $row['nama_kategori'];?></option>
                                                    <option value="#">Pilih Kategori</option>
                                                    <?php  $kat = $lihat-> kategori(); foreach($kat as $isi){ 	?>
                                                    <option value="<?php echo $isi['id_kategori'];?>">
                                                        <?php echo $isi['nama_kategori'];?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td><input type="text" class="form-control"
                                                    value="<?php echo $row['nama_barang'];?>" name="nama"></td>
                                        </tr>
                                        <tr>
                                            <td>Merk Barang</td>
                                            <td><input type="text" class="form-control"
                                                    value="<?php echo $row['merk'];?>" name="merk"></td>
                                        </tr>
                                        <tr>
                                            <td>Harga Beli</td>
                                            <td><input type="number" class="form-control"
                                                    value="<?php echo $row['harga_beli'];?>" name="beli"></td>
                                        </tr>
                                        <tr>
                                            <td>Harga Jual</td>
                                            <td><input type="number" class="form-control"
                                                    value="<?php echo $row['harga_jual'];?>" name="jual"></td>
                                        </tr>
                                        <tr>
                                            <td>Satuan Barang</td>
                                            <td>
                                                <select name="satuan" class="form-control">
                                                    <option value="<?php echo $row['satuan_barang'];?>">
                                                        <?php echo $row['satuan_barang'];?>
                                                    </option>
                                                    <option value="#">Pilih Satuan</option>
                                                    <option value="PCS">PCS</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td><input type="number" class="form-control"
                                                    value="<?php echo $row['stok'];?>" name="stok"></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Update</td>
                                            <td><input type="text" readonly="readonly" class="form-control"
                                                    value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button class="btn btn-primary" type="submit" name="update"><i class="fa fa-edit"></i> Update
                                                    Data</button></td>
                                        </tr>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include("../tampilan/footer.php");
    ?>