<?php 
include("../tampilan/header.php");
include("../tampilan/sidebar.php");
include("../../database/koneksi.php");

$sql = "select * from barang where stok <= 3";
$row = $koneksi->prepare($sql);
$r = $row->rowCount();
if($r > 0){
    echo "
    <div class='alert alert-warning'>
        <span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
        <span class='pull-right'><a href='index.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
    </div>
    ";	
}

$hasil_barang = $lihat-> barang_row();
$stok = $lihat-> barang_stok_row();
$hasil_kategori = $lihat-> kategori_row();
$jual = $lihat-> jual_row();
$laba = $lihat-> jumlah_nota();
?>

<div class="main-content" style="background: skyblue;">
    <div class="col-xxl-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-heading">
                    <h3 class="panel-title fw-bold">HALAMAN UTAMA</h3>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DATA TOKO ANEKA</h3>
                        </div>
                        <div class="card-header-form">
                            <h3 class="fw-bold text-end" style="font-size: 18px;">Laba Keuangan : <?="Rp. ".number_format($laba['tb'],2)." ,-";?></h3>
                        </div>
                        <div class="card-body bg-secondary">
                            <div class="row">
                                <div class="table-responsive d-flex justify-content-around align-items-center flex-wrap">
                                    <div class="card col-sm-auto bg-danger">
                                        <div class="card-body">
                                            <div class="pt-2 text-center text-white" style="font-size: 20px;">Data Barang</div>
                                            <div class="card-body d-flex justify-content-around align-items-center">
                                                <i class="fas fa-cubes text-white fw-bold mx-4" style="font-size: 20px;"></i>
                                                <h4 class="text-white fw-bold mx-4" style="font-size: 20px;"><?=number_format($hasil_barang);?></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card col-sm-auto bg-warning">
                                        <div class="card-body">
                                            <div class="pt-2 text-center text-white" style="font-size: 20px;">Stok Barang</div>
                                            <div class="card-body d-flex justify-content-around align-items-center">
                                                <h3 class="fas fa-chart-bar text-white fw-bold mx-4" style="font-size: 20px;"></h3>
                                                <h4 class="mx-4 text-white fw-bold" style="font-size: 20px;"><?=number_format($stok['jml'])?></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card col-sm-auto bg-info">
                                        <div class="card-body">
                                            <div class="pt-2 text-center text-white" style="font-size: 20px;">Telah Terjual</div>
                                            <div class="card-body d-flex justify-content-around align-items-center">
                                                <i class="fas fa-upload text-white fw-bold mx-4" style="font-size: 20px;"></i>
                                                <h4 class="text-white fw-bold mx-4" style="font-size: 20px;"><?=number_format($jual['stok'])?></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card col-sm-auto bg-danger">
                                        <div class="card-body">
                                            <div class="pt-2 text-center text-white" style="font-size: 20px;">Kategori Barang</div>
                                            <div class="card-body d-flex justify-content-around align-items-center">
                                                <i class="fa fa-bookmark text-white fw-bold mx-4" style="font-size: 20px;"></i>
                                                <h4 class="text-white fw-bold mx-4" style="font-size: 20px;"><?=number_format($hasil_kategori);?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border border-1"></div>
            </div>
        </div>
    </div>
</div>

<?php 
include("../tampilan/footer.php");
?>