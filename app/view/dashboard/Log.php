<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karywana</title>
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
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb breadcrumb-item"><a href="../dashboard/dashboard.php" class="text-decoration-none text-primary">Halaman utama</a></div>
                            <div class="breadcrumb breadcrumb-item"><a href="../dashboard/Log.php" class="text-decoration-none text-primary">Log</a></div>
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
                                                <th>Update Jam Masuk</th>
                                                <th>IP Address</th>
                                                <th>Browser Login</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($row as $isi) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $isi['username'] ?></td>
                                                    <td><?php echo $isi['user_level'] ?></td>
                                                    <td><?php echo $isi['onUpdated'] ?></td>
                                                    <td><?php echo get_ip_address(); ?></td>
                                                    <td><?php echo get_client_browser(); ?></td>
                                                </tr>
                                                <?php
                                            $no++; } ?>
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