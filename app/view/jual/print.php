<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Print</title>
    <?php 
        include("../tampilan/header.php");
        include("../tampilan/footer.php");
    ?>
</head>
<body>
    <script>window.print();</script>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <center>
					<p><?php echo "TOKO ANEKA";?></p>
					<p><?php echo "Jl. ****** ****** *** *****";?></p>
					<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
                    <p>kasir : <?php echo $_GET['username'] ?></p>
				</center>
                <table class="table table-bordered" style="width: 100%;">
                    <tr>
						<td>No.</td>
						<td>Barang</td>
						<td>Jumlah</td>
						<td>Total</td>
					</tr>
                    <?php
                    $row = $lihat -> penjualan();
                    $no=1; foreach($row as $isi){?>
                        <tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
						</tr>
                    <?php $no++; } ?>
                </table>
                <div class="pull-right">
                    <?php $row = $lihat->jumlah_nota(); ?>
                    Total : Rp.<?php echo number_format($row['tb']);?>,-
					<br/>
					Bayar : Rp.<?php echo number_format($_GET['bayar']);?>,-
					<br/>
					Kembali : Rp.<?php echo number_format($_GET['kembali']);?>,-
                </div>
                <div class="clearfix"></div>
                <center>
					<p>Terima Kasih Telah berbelanja di toko kami !</p>
				</center>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>