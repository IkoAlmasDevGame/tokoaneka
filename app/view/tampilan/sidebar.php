<?php 
if($_SESSION['user_level'] == ""){
    header("location:../tampilan/signin.php?pesan=belummasuk");
    exit(0);
}

if($_SESSION['user_level'] == "admin" || $_SESSION['user_level'] == "kasir"){
?>
<div class="main-wrapper">
    <div class="navbar-bg" style="background: skyblue;"></div>

    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline me-auto">
            <ul class="navbar-nav me-3 list-unstyled pt-4">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                    class="fas fa-bars text-black" style="font-size: 18px;"></i></a></li>
            </ul>
        </form>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="dashboard.php">Toko Aneka</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <img src="<?=base("assets/icon/toko aneka.png")?>" alt="logo" style="width:32px">
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Halaman Utama
                <li><a href="../dashboard/dashboard.php" class="nav-link"><i class="fas fa-fire-alt mx-0"></i>
                    <span class="col-md-offset-1 text-black fw-bold mx-4">Halaman utama</span></a></li>
                </li>
                <li class="menu-header">Menu Data Master
                <?php 
                if($_SESSION['user_level'] == "admin"){
                    ?>
                        <li><a href="../kategori/data-kategori.php" class="nav-link"><i class="fas fa-database" title="Kategori Barang"></i>
                            <span class="col-md-offset-1 text-black fw-bold mx-4">Kategori</span></a></li>
                        </li>
                        <li><a href="../barang/data-barang.php" class="nav-link"><i class="fas fa-database" title="Data Barang"></i>
                            <span class="col-md-offset-1 text-black fw-bold mx-4">Barang</span></a></li>
                        </li>
                        <li><a href="../dashboard/data-karyawan.php" class="nav-link"><i class="fas fa-database" title="Data Karyawan"></i>
                            <span class="col-md-offset-1 text-black fw-bold mx-4">Karyawan</span></a></li>
                        </li>
                        <li><a href="../dashboard/Log.php" class="nav-link"><i class="fas fa-database" title="Log Karyawan"></i>
                            <span class="col-md-offset-1 text-black fw-bold mx-4">Log</span></a></li>
                        </li>
                    <?php
                    }else if($_SESSION['user_level'] == "kasir"){
                        ?>
                        <li><a href="../jual/jual.php" class="nav-link"><i class="fas fa-shopping-cart" title="Halaman Penjualan"></i>
                            <span class="col-md-offset-1 text-black fw-bold mx-4">Halaman Penjualan</span></a></li>
                        </li>
                    <?php
                    }
                ?>
                <?php 
                    if($_SESSION['user_level'] == "admin"){
                    ?>
                        <li class="menu-header">Menu Fitur
                            <li><a href="../laporan/laporan.php" class="nav-link"><i class="fas fa-money-bill-wave-alt" title="Buku Laporan"></i>
                                <span class="col-md-offset-1 text-black fw-bold mx-4">Laporan Keuangan</span></a></li>
                        </li>
                    <?php
                    }
                ?>
                <li class="menu-header">Pengaturan
                    <li><a href="../pengaturan/user.php?id_user=<?=$_SESSION['id_user']?>" class="nav-link"><i class="fas fa-user-alt" title="Profile"></i>
                        <span class="col-md-offset-1 text-black fw-bold mx-4">Profile</span></a></li>
                    <li><a href="../tampilan/header.php?aksi=keluar" class="nav-link" onclick="javascript:return confirm('Apakah anda ingin keluar dari website ini ?');"><i class="fas fa-sign-out-alt has-icon text-danger" title="Keluar"></i>
                        <span class="col-md-offset-1 text-black fw-bold mx-4 text-danger">Log Out</span></a></li>
                </li>
            </ul>
        </aside>
    </div>
</div>
<?php
}else{
    header("location:../tampilan/signin.php?pesan=gagal");
    exit(0);
}

?>