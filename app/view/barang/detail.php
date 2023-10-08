<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Barang</title>
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
                            <h4 class="panel-title fw-bold">Detail Data Barang - <?php echo $row['nama_barang'] ?></h4>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/dashboard.php"
                                        class="text-decoration-none text-primary">Halaman utama</a>
                                </div>
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="data-barang.php" class="text-decoration-none text-primary">Data barang</a>
                                </div>
                                <div class="breadcrumb breadcrumb-item text-primary">Detail Data Barang</div>
                            </div>
                        </div>
                    </section>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <td>ID Barang</td>
                                        <td><input type="text" readonly="readonly" class="form-control"
                                                value="<?php echo $row['id_barang'];?>" name="id"></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>
                                            <select name="kategori" class="form-control" readonly="readonly">
                                                <option value="<?php echo $row['id_kategori'];?>">
                                                    <?php echo $row['nama_kategori'];?></option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td><input type="text" class="form-control"
                                                value="<?php echo $row['nama_barang'];?>" name="nama" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td>Merk Barang</td>
                                        <td><input type="text" class="form-control" value="<?php echo $row['merk'];?>"
                                            name="merk" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Beli</td>
                                        <td><input type="number" class="form-control"
                                            value="<?php echo $row['harga_beli'];?>" name="beli" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Jual</td>
                                        <td><input type="number" class="form-control"
                                                value="<?php echo $row['harga_jual'];?>" name="jual" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td>Satuan Barang</td>
                                        <td>
                                            <select name="satuan" class="form-control" readonly="readonly">
                                                <option value="<?php echo $row['satuan_barang'];?>">
                                                    <?php echo $row['satuan_barang'];?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td><input type="number" class="form-control" value="<?php echo $row['stok'];?>"
                                            name="stok" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Update</td>
                                        <td><input type="text" readonly="readonly" class="form-control"
                                                value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
                                    </tr>
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