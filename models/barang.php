<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 22 April 2017
// Usage		: Model

class Barang {
    public $idBarang;
    public $namaBarang;
    public $deskripsi;
    public $lokasiGambar;
    public $harga;
    public $stok;
    public $bobot;
    
    public function __construct($idBarang, $namaBarang, $deskripsi, $lokasiGambar, $harga, $stok, $bobot) {
      $this->idBarang = $idBarang;
      $this->namaBarang = $namaBarang;
      $this->deskripsi = $deskripsi;
      $this->lokasiGambar = $lokasiGambar;
      $this->harga = $harga;
      $this->stok = $stok;
      $this->bobot = $bobot;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM barang');

      foreach($req->fetchAll() as $barang) {
      	$list[] = new Barang($barang['id_barang'], $barang['nama_barang'], $barang['deskripsi'], $barang['lokasi_gambar'], $barang['harga'], $barang['stok'], $barang['bobot']);
      }

      return $list;
    }
    
    public static function lists($start) {
    	$db = Db::getInstance();
    	
    	if ($start > 1) {
    		$limit = 8;
    		$start = intval($start);
    		$start = ($start - 1) * $limit;
    		$sql = 'SELECT * FROM barang WHERE bobot > 0 LIMIT '.$start.', 8'; // Cara Kedua
    		$req = $db->query($sql);    		
    	} else {
    		$sql = 'SELECT * FROM barang WHERE bobot > 0 LIMIT 10';
    	}
    	
    	$req = $db->query($sql); // Cara Pertama    		
    	
    	$list = [];    	
    	foreach($req->fetchAll() as $barang) {
    		$list[] = new Barang($barang['id_barang'], $barang['nama_barang'], $barang['deskripsi'], $barang['lokasi_gambar'], $barang['harga'], $barang['stok'], $barang['bobot']);
    	}
    		
    	return $list;
    }
    
    public static function filter($id, $category, $str) {
    	$db = Db::getInstance();

    	$id = intval($id);
    	
    	$limit = 8;
    	$id = ($id - 1) * $limit;
    	    	
    	if (($str == 'none') || ($str == 'null')){
    		$str = '';
    	} else {
    		$str = " AND nama_barang LIKE '%".$str."%'";
    	}

    	if (($category < 8) || ($category == 'fisik')) {
    		if ($category == 'fisik') {
    			$category = '';
    		} else {
    			$category = " AND id_kategori_barang = ".$category;
    		}
    		
    		$sql1 = "SELECT * FROM barang WHERE bobot != 12345".$category."".$str;
    		$row = $db->query($sql1)->rowCount();
    		
    		if ($row < 8){
    			$sql2 = "SELECT * FROM barang WHERE bobot != 12345".$category."".$str;
    		} else {
    			$sql2 = "SELECT * FROM barang WHERE bobot != 12345".$category."".$str." LIMIT ".$id.", 8";
    		}    		
    	} else if (($category >= 8) || ($category == 'digital')) {
    		if ($category == 'digital') {
    			$category = '';
    		} else {
    			$category = " AND id_kategori_barang = ".$category;
    		}
    		
    		$sql1 = "SELECT * FROM barang WHERE bobot = 12345".$category."".$str;
    		$row = $db->query($sql1)->rowCount();
    		
    		if ($row < 8){
    			$sql2 = "SELECT * FROM barang WHERE bobot = 12345".$category."".$str;
    		} else {
    			$sql2 = "SELECT * FROM barang WHERE bobot = 12345".$category."".$str." LIMIT ".$id.", 8";
    		}
    	}
    	
    	
		$req = $db->query($sql2);

		$list = [];		
    	foreach($req->fetchAll() as $barang) {
    		$list[] = new Barang($barang['id_barang'], $barang['nama_barang'], $barang['deskripsi'], $barang['lokasi_gambar'], $barang['harga'], $barang['stok'], $barang['bobot']);
    	}
    	    	
    	$data = array('list' => $list,
    			'row' => $row);
    	
    	return $data;
    }

    public static function search(){
    	$str = filter_input(INPUT_POST, 'str');
    	if ($str == ""){
    		return NULL;
    	} else {
    		$db = Db::getInstance();
    		
    		$query = "SELECT * FROM barang WHERE nama_barang LIKE ?";
    		$param = array("%$str%");
    		$req = $db->prepare($query);
    		$req->execute($param);
    		
    		$list = [];
    		foreach($req->fetchAll() as $barang) {
    			$list[] = new Barang($barang['id_barang'], $barang['nama_barang'], $barang['deskripsi'], $barang['lokasi_gambar'], $barang['harga'], $barang['stok'], $barang['bobot']);
    		}
    		return $list;
    	}
    }
    
    public static function find($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM barang WHERE id_barang = :id');
      $req->execute(array('id' => $id));
      $barang = $req->fetch();

      return new Barang($barang['id_barang'], $barang['nama_barang'], $barang['deskripsi'], $barang['lokasi_gambar'], $barang['harga'], $barang['stok'], $barang['bobot']);
    }
    
    public static function getCategory($id){
    	$db = Db::getInstance();
    	$id = intval($id);
    	$req = $db->prepare('SELECT nama_kategori_barang FROM kategori_barang WHERE id_kategori_barang = :id');
    	$req->execute(array('id' => $id));
    	$kategoriBarang = $req->fetch();
    	return $kategoriBarang['nama_kategori_barang'];
    }
    
    public static function getIdCategory($id){
    	$db = Db::getInstance();
    	$id = intval($id);
    	$req = $db->prepare('SELECT id_kategori_barang FROM barang WHERE id_barang = :id');
    	$req->execute(array('id' => $id));
    	$kategoriBarang= $req->fetch();
    	return $kategoriBarang['id_kategori_barang'];
    }
    
    public static function getHarga($id){
    	$db = Db::getInstance();
    	$id = intval($id);
    	$req = $db->prepare('SELECT harga FROM barang WHERE id_barang = :id');
    	$req->execute(array('id' => $id));
    	$barang= $req->fetch();
    	return $barang['harga'];
    }
    
    public static function adjustFisikStock(){
    	$idPelanggan = $_SESSION['id'];
    	$transaksi = Transaksi::find($idPelanggan);
    	$idTransaksi = $transaksi->idTransaksi;
    	$sql = "SELECT * FROM keranjang WHERE id_transaksi = :idTransaksi";
    	$db = Db::getInstance();
    	$req = $db->prepare($sql);
    	$req->execute(array('idTransaksi' => $idTransaksi));
    	
    	foreach ($req->fetchAll() as $keranjang){
    		$sql = "UPDATE barang SET stok = (stok - '".$keranjang['jumlah_barang']."') WHERE id_barang = ".$keranjang['id_barang']."";
    		$req = $db->prepare($sql);
    		$req->execute();
    	}    	
    }
    
    public static function adjustDigitalStock($serialNumber){
    	$db = Db::getInstance();
    	$sql = "UPDATE barang_digital SET status = 1 WHERE serial_number = :serialNumber";
    	$req = $db->prepare($sql);
    	$req->execute(array('serialNumber' => $serialNumber));
    }
    
    public static function getSerialNumber($idBarang){
    	$db = Db::getInstance();
    	$idBarang = intval($idBarang);
    	$sql = "SELECT serial_number FROM barang_digital WHERE status = 0 AND id_barang = :idBarang LIMIT 1";    	
    	$req = $db->prepare($sql);
    	$req->execute(array('idBarang' => $idBarang));
    	$barang= $req->fetch();
    	return $barang['serial_number'];
    }
	
	public static function getByCategory($namaKategoriBarang) {
		$idKategoriBarang = Barang::getIdCategoryBarang($namaKategoriBarang);

		$db = Db::getInstance();
		$query = "SELECT * FROM barang WHERE id_kategori_barang = :idKategoriBarang";
		$stmt = $db->prepare($query);
		$stmt->execute(array('idKategoriBarang' => $idKategoriBarang));

		$list = [];
		foreach($stmt->fetchAll() as $val) {
			$list[] = new Barang($val['id_barang'], $val['nama_barang'], $val['deskripsi'], $val['lokasi_gambar'], $val['harga'], $val['stok'], $val['bobot']);
		}

		return $list;
	}
    
    public static function getIdCategoryBarang($namaKategoriBarang){
    	$db = Db::getInstance();
    	$req = $db->prepare('SELECT id_kategori_barang FROM kategori_barang WHERE nama_kategori_barang = :namaKategoriBarang');
    	$req->execute(array('namaKategoriBarang' => $namaKategoriBarang));
    	$kategoriBarang = $req->fetch();

    	return $kategoriBarang['id_kategori_barang'];
    }
}
?>