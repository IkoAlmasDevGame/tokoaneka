<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penjualan Toko</title>

    <?php
    include("../tampilan/header.php");
    include("../../database/koneksi.php");
    include("../../database/koneksi2.php");
    ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script lang="javascript">
    // AJAX call for autocomplete 
    $(document).ready(function() {
        $("#cari").change(function() {
            $.ajax({
                type: "POST",
                url: "act-barang.php?QW=yes",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    $("#hasil_cari").hide();
                    $("#tunggu").html(
                        '<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html) {
                    $("#tunggu").html('');
                    $("#hasil_cari").show();
                    $("#hasil_cari").html(html);
                }
            });
        });
    });
    </script>
</head>

<body>
    <?php
    include("../tampilan/sidebar.php")
    ?>
    <div class="main-content">
        <div class="col-xxl-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <section class="section">
                        <div class="section-header">
                            <h4 class="panel-title fw-bold">Sales Product Cashier</h4>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/dashboard.php"
                                        class="text-decoration-none text-primary">Halaman utama</a>
                                </div>
                                <div class="breadcrumb breadcrumb-item">
                                    <a href="jual.php" class="text-decoration-none text-primary">Halaman penjualan</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card card-primary mb-3">
                                    <div class="card-header bg-primary text-white">
                                        <h5><i class="fa fa-search"></i> Cari Barang</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" id="cari" class="form-control" name="cari"
                                            placeholder="Masukan : Kode / Nama Barang  [ENTER]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card card-primary mb-3">
                                    <div class="card-header bg-primary text-white">
                                        <h5><i class="fa fa-list"></i> Hasil Pencarian</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="hasil_cari"></div>
                                            <div id="tunggu"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header bg-primary text-white">
                                <h5><i class="fa fa-shopping-cart"></i> KASIR
                                    <div class="col-md-offset-0 pt-3">
                                        <a class="btn btn-danger"
                                            onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');"
                                            href="act-hapus-jual.php"> <b>RESET KERANJANG</b></a>
                                    </div>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="keranjang">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td><b>Tanggal</b></td>
                                            <td><input type="text" readonly="readonly" class="form-control"
                                                    value="<?php echo date("j F Y, G:i"); ?>" name="tgl"></td>
                                        </tr>
                                    </table>
                                    <table class="table table-striped tabel-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <td> No</td>
                                                <td> Nama Barang</td>
                                                <td style="width:10%;"> Jumlah</td>
                                                <td style="width:20%;"> Total</td>
                                                <td> Kasir</td>
                                                <td> Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $row = $lihat -> penjualan();
                                            $total_bayar = 0;
                                            $no = 1;
                                            foreach ($row as $isi) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $isi['nama_barang']; ?></td>
                                                <td>
                                                    <!-- aksi ke table penjualan -->
                                                    <form method="POST" action="act-edit-jual.php">
                                                        <input type="number" name="jumlah"
                                                            value="<?php echo $isi['jumlah']; ?>" class="form-control">
                                                        <input type="hidden" name="id" value="<?php echo $isi['id']; ?>"
                                                            class="form-control">
                                                        <input type="hidden" name="id_barang"
                                                            value="<?php echo $isi['id_barang']; ?>"
                                                            class="form-control">
                                                </td>
                                                <td>Rp.<?php echo number_format($isi['total']); ?>,-</td>
                                                <td><?php echo $_SESSION['username']; ?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                    </form>
                                                    <!-- aksi ke table penjualan -->
                                                    <a href="act-hapus-item.php?id=<?= $isi['id'] ?>&brg=<?= $isi['id_barang'] ?>"
                                                        class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                $no++;
                                                $total_bayar += $isi['total'];
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div id="kasirnya">
                                        <table class="table table-striped">
                                            <?php
                                            

                                            if (!empty($_GET['nota'] =="yes")){   
                                                    $bayar = $_POST['bayar'];
                                                    $total = $_POST['total']; 

                                                    if(!empty($bayar)){
                                                        $hitung = $bayar - $total; 
                                                        if($bayar >= $total){
                                                            $id_barang = $_POST['id_barang'];
                                                            $jumlah = $_POST['jumlah'];
                                                            $total_bayar = $_POST['total1'];
                                                            $tgl_input = $_POST['tgl_input'];
                                                            $periode = $_POST['periode'];
                                                            $jumlah_beli = count($id_barang);

                                                            for($x = 0; $x < $jumlah_beli; $x++){
                                                                $row_barang = "SELECT * FROM barang WHERE id_barang ='$id_barang[$x]'";
                                                                $row_data = $kon->query($row_barang);

                                                                $sql = "INSERT INTO nota SET id_barang='$id_barang[$x]', jumlah='$jumlah[$x]', total='$total_bayar[$x]', tanggal_input='$tgl_input[$x]', periode='$periode[$x]'";
                                                                $row = $kon->query($sql);

                                                                $hsl = $row_data->fetch_array();
                                                                $total_stok = $hsl['stok'] - $jumlah[$x];

                                                                $editStok = "UPDATE barang SET stok='$total_stok' WHERE id_barang='$id_barang[$x]'";
                                                                $edit = $kon->query($editStok);
                                                            }
                                                            echo "Belanjaan Berhasil Di Bayar !";
                                                        }else{
                                                            echo "Uang Kurang ! Rp.".$hitung;
                                                        }
                                                    $row = $lihat -> jumlah_nota();
                                                    }
                                                }                             
                                            ?>
                                            <form action="jual.php?nota=yes#kasirnya" method="post">
                                                <tbody>
                                                    <?php
                                                    foreach ($row as $isi) {
                                                    ?>
                                                    <input type="hidden" name="id_barang[]"
                                                        value="<?php echo $isi['id_barang']; ?>">
                                                    <input type="hidden" name="jumlah[]"
                                                        value="<?php echo $isi['jumlah']; ?>">
                                                    <input type="hidden" name="total1[]"
                                                        value="<?php echo $isi['total']; ?>">
                                                    <input type="hidden" name="tgl_input[]"
                                                        value="<?php echo $isi['tanggal_input']; ?>">
                                                    <input type="hidden" name="periode[]"
                                                        value="<?php echo date('m-Y'); ?>">
                                                    <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <?php 
                                                            if(!empty($_GET['nota'] == "yes")){
                                                        ?>
                                                        <td>Total Semua </td>
                                                        <td><input type="text" class="form-control" name="total"
                                                                value="<?php $row = $lihat -> jumlah(); echo $row['bayar']; ?>"></td>
                                                        <td>Bayar </td>
                                                        <td><input type="text" class="form-control" name="bayar"
                                                                value="<?= $bayar; ?>"></td>
                                                        <td><button class="btn btn-success" type="submit"><i
                                                            class="fa fa-shopping-cart"></i>Bayar</button>
                                                                <a href="act-hapus-nota.php" class="btn btn-danger">RESET</a>
                                                        </td>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tr>
                                                </tbody>
                                            </form>
                                            <tr>
                                                <?php 
                                                    if(!empty($_GET['nota'] == "yes")){
                                                ?>
                                                <td>Kembali</td>
                                                <td><input type="text" class="form-control" name="kembali"
                                                        value="<?= $hitung; ?>">
                                                </td>
                                                <td colspan="2"></td>
                                                        <td>
                                                            <a href="print.php?username=<?=$_SESSION['username']?>&bayar=<?=$bayar;?>&kembali=<?=$hitung;?>" target="_blank">
                                                            <button class="btn btn-secondary">
                                                                <i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
                                                            </button></a>
                                                        </td>
                                                    <?php
                                                    }
                                                ?>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("../tampilan/footer.php")
    ?>