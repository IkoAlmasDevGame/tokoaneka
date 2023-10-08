<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <?php 
    include("../tampilan/header.php");
    $row = $lihat-> karyawan_toko();
    ?>
</head>
<body>
    <?php 
        include("../tampilan/sidebar.php");
    ?>
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <section class="section">
                    <div class="section-header">
                        <h4 class="panel-title fw-bold">Data Karyawan</h4>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb breadcrumb-item"><a href="../dashboard/dashboard.php" class="text-decoration-none text-primary">Halaman utama</a></div>
                            <div class="breadcrumb breadcrumb-item"><a href="../dashboard/data-karyawan.php" class="text-decoration-none text-primary">Data karyawan</a></div>
                        </div>
                    </div>
                </section>
                <div class="col-xxl-12">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jabatan Karyawan</th>
                                            </tr>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($row as $isi) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $isi['username'] ?></td>
                                                        <td><?php echo $isi['user_level'] ?></td>
                                                    </tr>
                                                    <?php
                                                $n++; } ?>
                                            </tbody>
                                        </thead>
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