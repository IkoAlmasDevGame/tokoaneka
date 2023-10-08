<?php 

class view {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function karyawan_toko(){
        $sql = "select * from user_data where user_level='kasir'";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $row = $row->fetchAll();
        return $row;
    }

    public function log_karyawan(){
        $sql = "select * from user_data";    
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $row = $row->fetchAll();
        return $row;
    }

    public function barang(){
        $sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
                from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
                ORDER BY id DESC";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetchAll();
        return $row;
    }

    public function barang_stok(){
        $sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
                from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
                where stok <= 3 ORDER BY id DESC";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetchAll();
        return $row;
    }

    public function kategori()
    {
        $sql = "select*from kategori";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetchAll();
        return $row;
    }

    public function barang_edit($id){
        $sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
                from barang inner join kategori on barang.id_kategori = kategori.id_kategori
                where id_barang=?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $row = $row -> fetch();
        return $row;
    }

    public function barang_cari($cari)
    {
        $sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
                from barang inner join kategori on barang.id_kategori = kategori.id_kategori
                where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetchAll();
        return $row;
    }

    public function barang_id(){
        $sql = 'SELECT * FROM barang ORDER BY id DESC';
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();

        $urut = substr($row['id_barang'], 2, 3);
        $tambah = (int) $urut + 1;
        if (strlen($tambah) == 1) {
            $format = 'BR00'.$tambah.'';
        } elseif (strlen($tambah) == 2) {
            $format = 'BR0'.$tambah.'';
        } else {
            $ex = explode('BR', $row['id_barang']);
            $no = (int) $ex[1] + 1;
            $format = 'BR'.$no.'';
        }
        return $format;
    }

    public function kategori_edit($id){
        $sql = "select*from kategori where id_kategori=?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $row = $row -> fetch();
        return $row;
    }

    public function kategori_row(){
        $sql = "select * from kategori";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> rowCount();
        return $row;
    }

    public function barang_row(){
        $sql = "select*from barang";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> rowCount();
        return $row;
    }

    public function barang_stok_row(){
        $sql ="SELECT SUM(stok) as jml FROM barang";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();
        return $row;
    }

    public function barang_beli_row(){
        $sql = "SELECT SUM(harga_beli) as beli FROM barang";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();
        return $row;
    }

    public function jual_row(){
        $sql = "SELECT SUM(jumlah) as stok FROM nota";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();
        return $row;
    }

    public function jual(){
        $sql = "SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli from nota 
                left join barang on barang.id_barang=nota.id_barang where nota.periode = ? ORDER BY id_nota DESC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array(date('m-Y')));
        $row = $row -> fetchAll();
        return $row;
    }

    public function periode_jual($periode){
        $sql = "SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli from nota left join barang on barang.id_barang=nota.id_barang WHERE nota.periode = ? ORDER BY id_nota ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($periode));
        $row = $row -> fetchAll();
        return $row;
    }

    public function hari_jual($hari){
        $ex = explode('-', $hari);
        $monthNum  = $ex[1];
        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
        if ($ex[2] > 9) {
            $tgl = $ex[2];
        } else {
            $tgl1 = explode('0', $ex[2]);
            $tgl = $tgl1[1];
        }
        $cek = $tgl.' '.$monthName.' '.$ex[0];
        $param = "%{$cek}%";
        $sql = "SELECT nota.* , barang.id_barang, barang.nama_barang,  barang.harga_beli from nota left join barang on barang.id_barang=nota.id_barang WHERE nota.tanggal_input LIKE ? ORDER BY id_nota ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($param));
        $row = $row->fetchAll();
        return $row;
    }

    public function penjualan(){
        $sql = "SELECT penjualan.* , barang.id_barang, barang.nama_barang from penjualan 
                left join barang on barang.id_barang=penjualan.id_barang ORDER BY id ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function jumlah(){
        $sql = "SELECT SUM(total) as bayar FROM penjualan";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();
        return $row;
    }

    public function jumlah_nota(){
        $sql = "SELECT SUM(total) as tb FROM nota";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();
        return $row;
    }

    public function jml(){
        $sql = "SELECT SUM(harga_beli*stok) as byr FROM barang";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();
        return $row;
    }
}
?>