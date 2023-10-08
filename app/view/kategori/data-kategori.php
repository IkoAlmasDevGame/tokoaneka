<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Kategori</title>

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
            <div class="panel panel-default">
                <div class="panel-body">
                    <section class="section">
                        <div class="section-header">
                            <h4 class="panel-title fw-bold">Data Kategori</h4>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/dashboard.php"
                                        class="text-decoration-none text-primary">Halaman utama</a>
                                </div>
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="data-kategori.php" class="text-decoration-none text-primary">Data
                                        kategori</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-form">
                                    <?php 
                                        if(isset($_GET['pesan'])){
                                            if($_GET['pesan'] == "delete"){
                                            ?>
                                                <div class="col-sm-12">
                                                    <div class="alert alert-danger" style="right: 0; bottom:0; top:0;" role="alert">
                                                        <strong>Perhatian !</strong>Anda telah menghapus barang ini.
                                                        <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                                         onclick="window.location = 'data-kategori.php'">
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            if($_GET['pesan'] == "tambah"){
                                            ?>
                                                <div class="col-sm-12">
                                                    <div class="alert alert-info" style="right: 0; bottom:0; top:0;" role="alert">
                                                        <strong>Perhatian !</strong>Anda telah menambahkan data produk.
                                                        <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                                         onclick="window.location = 'data-kategori.php'">
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            if($_GET['pesan'] == "edit"){
                                            ?>
                                                <div class="col-sm-12">
                                                    <div class="alert alert-info" style="right: 0; bottom:0; top:0;" role="alert">
                                                        <strong>Perhatian !</strong>Anda telah mengubah data produk.
                                                        <button type='button' class="close" data-bs-dismiss='alert' aria-label='Close'
                                                         onclick="window.location = 'data-kategori.php'">
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                    ?>
                                    <form method="POST" action="act-edit.php">
                                        <?php
                                            global $koneksi;
                                            if (!empty($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $sql = "SELECT * FROM kategori WHERE id_kategori = '$id'";
                                                $row = $koneksi->execute($sql);
                                                $edit = $row->fetch();
                                            ?>
                                        <table>
                                            <tr>
                                                <td style="width:25pc;"><input type="text" class="form-control"
                                                        value="<?= $edit['nama_kategori']; ?>" required name="kategori"
                                                        placeholder="Masukan Kategori Barang Baru">
                                                    <input type="hidden" name="id" value="<?= $edit['id_kategori']; ?>">
                                                </td>
                                                <td style="padding-left:10px;"><button id="tombol-simpan"
                                                        class="btn btn-primary" type="submit"><i class="fa fa-edit"></i>
                                                        Ubah Data</button></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?php } else { ?>
                                    <form method="POST" action="act-tambah.php">
                                        <table>
                                            <tr>
                                                <td style="width:25pc;"><input type="text" class="form-control" required
                                                        name="kategori" placeholder="Masukan Kategori Barang Baru"></td>
                                                <td style="padding-left:10px;"><button id="tombol-simpan"
                                                        class="btn btn-primary"><i class="fa fa-plus"></i>
                                                        Insert Data</button></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Input</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $row = $lihat-> kategori();
                                                $no=1;
                                                foreach($row as $isi){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $isi['nama_kategori'];?></td>
                                                            <td><?php echo $isi['tgl_input'];?></td>
                                                            <td>
                                                                <a href="data-kategori.php?id=<?php echo $isi['id_kategori'];?>"><button
                                                                    class="btn btn-warning">Edit</button></a>
                                                                <a href="act-hapus.php?id=<?=$isi['id_kategori']?>"
                                                                    onclick="javascript:return confirm('Hapus Data Kategori ?');"><button
                                                                    class="btn btn-danger">Hapus</button></a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    $no++; 
                                                }
                                            ?>
                                        </tbody>
                                    </table>
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