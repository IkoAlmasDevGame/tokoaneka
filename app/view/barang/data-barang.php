<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Barang</title>

    <?php 
        include("../tampilan/header.php");
    ?>
</head>

<body>
    <?php 
        include("../tampilan/sidebar.php");
    ?>
    <div class="main-content">
        <div class="col-xxl-12">
            <div class="panel panel-defaul">
                <div class="panel-body">
                    <section class="section">
                        <div class="section-header">
                            <h4 class="panel-title fw-bold">Data Barang</h4>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/dashboard.php" class="text-decoration-none">Halaman utama</a>
                                </div>
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="data-barang.php" class="text-decoration-none">Data barang</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-form">
                                    <button type="button" class="btn btn-primary btn-lg me-2" data-bs-toggle="modal"
                                        data-bs-target="#myModal">
                                        <i class="fa fa-plus"></i> Insert Data</button>
                                    </button>
                                    <a href="data-barang.php?stok=yes" class="btn btn-warning btn-lg me-2">
                                        <i class="fa fa-list"></i> Sortir Stok Kurang</a>
                                    <a href="data-barang.php" class="btn btn-success btn-lg">
                                        <i class="glyphicon glyphicon-refresh"></i> Refresh Data</a>
                                    </div>
                                        <?php 
                                            if(isset($_GET['pesan'])){
                                                if($_GET['pesan'] == "delete"){
                                                ?>
                                                    <div class="col-md-6" style="margin-left:14rem;">
                                                        <div class="alert alert-danger" style="right: 0; bottom:0; top:0;" role="alert">
                                                            <strong>Perhatian !</strong>Anda telah menghapus barang ini.
                                                            <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                                             onclick="window.location = 'data-barang.php'">
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                if($_GET['pesan'] == "tambah"){
                                                ?>
                                                    <div class="col-md-6" style="margin-left:14rem;">
                                                        <div class="alert alert-info" style="right: 0; bottom:0; top:0;" role="alert">
                                                            <strong>Perhatian !</strong>Anda telah menambahkan data produk.
                                                            <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                                             onclick="window.location = 'data-barang.php'">
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                if($_GET['pesan'] == "edit"){
                                                ?>
                                                    <div class="col-md-6" style="margin-left:14rem;">
                                                        <div class="alert alert-info" style="right: 0; bottom:0; top:0;" role="alert">
                                                            <strong>Perhatian !</strong>Anda telah mengubah data produk.
                                                            <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                                             onclick="window.location = 'data-barang.php'">
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Barang</th>
                                                <th>Kategori</th>
                                                <th>Nama Barang</th>
                                                <th>Merk</th>
                                                <th>Stok</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Satuan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $totalBeli = 0;
                                            $totalJual = 0;
                                            $totalStok = 0;
                                            
                                            if(!empty($_GET['stok'] == "yes")){
                                                $row = $lihat-> barang_stok();
                                            }else{
                                                $row = $lihat-> barang();
                                            }

                                            $no = 1;
                                            foreach($row as $isi){
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $isi['id_barang']; ?></td>
                                                <td><?php echo $isi['nama_kategori']; ?></td>
                                                <td><?php echo $isi['nama_barang']; ?></td>
                                                <td><?php echo $isi['merk']; ?></td>
                                                <td>
                                                    <?php if ($isi['stok'] == '0') { ?>
                                                    <button class="btn btn-danger"> Habis</button>
                                                    <?php } else { ?>
                                                    <?php echo $isi['stok']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td>Rp.<?php echo number_format($isi['harga_beli']); ?>,-</td>
                                                <td>Rp.<?php echo number_format($isi['harga_jual']); ?>,-</td>
                                                <td> <?php echo $isi['satuan_barang']; ?></td>
                                                <td>
                                                    <?php if ($isi['stok'] <=  '3') { ?>
                                                    <form action="" method="post">
                                                        <input type="text" name="restok" class="form-control">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $isi['id_barang'];?>"
                                                            class="form-control">
                                                        <button class="btn btn-primary btn-sm" type="submit"
                                                            name="restock">Restok</button>
                                                        <a href="<?=base('')?><?=$isi['id_barang']?>"
                                                            onclick="javascript:return confirm('Hapus Data barang ?');">
                                                            <button class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash-alt"></i></button></a>
                                                    </form>
                                                    <?php } else { ?>
                                                    <a href="detail.php?barang=<?=$isi['id_barang']?>"
                                                        onclick="javascript:return confirm('Apakah anda ingin melihat data barang ini ?');"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                    <a href="edit.php?barang=<?=$isi['id_barang']?>"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="act-hapus.php?barang=<?=$isi['id_barang']?>"
                                                        onclick="javascript:return confirm('Hapus Data barang ?');"
                                                        class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                                    $no++;
                                                    $totalBeli += $isi['harga_beli'] * $isi['stok'];
                                                    $totalJual += $isi['harga_jual'] * $isi['stok'];
                                                    $totalStok += $isi['stok'];
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total </td>
                                                <th><?php echo $totalStok; ?></td>
                                                <th>Rp.<?php echo number_format($totalBeli); ?>,-</td>
                                                <th>Rp.<?php echo number_format($totalJual); ?>,-</td>
                                                <th colspan="2" style="background:#ddd"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="myModal" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style=" border-radius:0px;">
                                    <div class="modal-header" style="background:skyblue;color:#fff;">
                                        <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="act-tambah.php" method="POST">
                                        <div class="modal-body">
                                            <table class="table table-striped bordered">
                                                <?php
                                                $format = $lihat-> barang_id();
                                            ?>
                                                <tr>
                                                    <td>ID Barang</td>
                                                    <td><input type="text" readonly="readonly" required
                                                            value="<?php echo $format;?>" class="form-control"
                                                            name="id">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kategori</td>
                                                    <td>
                                                        <select name="kategori" class="form-control" required>
                                                            <option value="#">Pilih Kategori</option>
                                                            <?php $row = $lihat-> kategori(); foreach($row as $isi){ 	?>
                                                            <option value="<?php echo $isi['id_kategori'];?>">
                                                                <?php echo $isi['nama_kategori'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Barang</td>
                                                    <td><input type="text" placeholder="Nama Barang" required
                                                            class="form-control" name="nama"></td>
                                                </tr>
                                                <tr>
                                                    <td>Merk Barang</td>
                                                    <td><input type="text" placeholder="Merk Barang" required
                                                            class="form-control" name="merk"></td>
                                                </tr>
                                                <tr>
                                                    <td>Harga Beli</td>
                                                    <td><input type="number" placeholder="Harga beli" required
                                                            class="form-control" name="beli"></td>
                                                </tr>
                                                <tr>
                                                    <td>Harga Jual</td>
                                                    <td><input type="number" placeholder="Harga Jual" required
                                                            class="form-control" name="jual"></td>
                                                </tr>
                                                <tr>
                                                    <td>Satuan Barang</td>
                                                    <td>
                                                        <select name="satuan" class="form-control" required>
                                                            <option value="#">Pilih Satuan</option>
                                                            <option value="PCS">PCS</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Stok</td>
                                                    <td><input type="number" required Placeholder="Stok"
                                                            class="form-control" name="stok"></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Input</td>
                                                    <td><input type="text" required readonly="readonly"
                                                            class="form-control"
                                                            value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="submit" class="btn btn-primary"><i
                                                    class="fa fa-plus"></i> Insert
                                                Data</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
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