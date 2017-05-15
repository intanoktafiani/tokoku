<?php
// Model

class Keranjang {
	public $idBarang;
	public $namaBarang;
	public $harga;
	public $kuantitas;
	public $keterangan;
	public $subtotal;
	public $idKategoriBarang;
	
	public function __construct($idBarang, $namaBarang, $harga, $kuantitas, $keterangan, $subtotal) {
		$this->idBarang = $idBarang;
		$this->namaBarang = $namaBarang;
		$this->harga = $harga;
		$this->kuantitas = $kuantitas;
		$this->keterangan = $keterangan;
		$this->subtotal = $subtotal;
	}
	
	public static function create($idBarang, $namaBarang, $harga, $kuantitas, $keterangan, $subtotal, $idKategoriBarang) {
		$instance = new self($idBarang, $namaBarang, $harga, $kuantitas, $keterangan, $subtotal);
		$instance->idKategoriBarang = $idKategoriBarang;
		
		return $instance;
	}

	public static function add($idBarang, $kuantitas, $keterangan = "") {		
		if ($kuantitas > 0){
			$db = Db::getInstance();
			$idPelanggan = $_SESSION['id'];
			
			$sql = "SELECT id_transaksi FROM transaksi where status_transaksi = 'Sedang Belanja' AND id_pelanggan = ".$idPelanggan;
			if ($db->query($sql)->rowCount() == 0){
				$req = $db->query("INSERT INTO transaksi (status_transaksi, jumlah_nominal, id_pelanggan) VALUES ('Sedang Belanja', 10000, '".$idPelanggan."')");
			}
			$transaksi = Transaksi::find($idPelanggan);
			$idTransaksi = $transaksi->idTransaksi;
			
			$sql = "SELECT jumlah_barang FROM keranjang where id_transaksi = '".$idTransaksi."' AND id_barang = '".$idBarang."'";
			if ($db->query($sql)->rowCount() == 0){
				$req = $db->query("INSERT INTO keranjang (id_barang, id_transaksi, jumlah_barang, keterangan) VALUES ('".$idBarang."', '".$idTransaksi."', '".$kuantitas."', '".$keterangan."')");
			} else { // id barang telah ada pada keranjang, cukup menambahkan kuantitas barang
				$req = $db->query($sql);
				$barang = $req->fetch();
				$kuantitas = $kuantitas + $barang['jumlah_barang'];
				$req = $db->query("UPDATE keranjang SET jumlah_barang = '".$kuantitas."' WHERE keranjang.id_barang = '".$idBarang."' AND keranjang.id_transaksi = '".$idTransaksi."'");
			}
		}
	}

	public static function lists() {
		$db = Db::getInstance();
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$idTransaksi = $transaksi->idTransaksi;
		$req = $db->query("SELECT k.id_barang, b.nama_barang, b.harga, k.jumlah_barang, k.keterangan FROM keranjang k, barang b WHERE k.id_barang = b.id_barang AND k.id_transaksi = '".$idTransaksi."'");
		
		$list = [];
		foreach($req->fetchAll() as $keranjang) {
			$list[] = new Keranjang($keranjang['id_barang'], $keranjang['nama_barang'], $keranjang['harga'], $keranjang['jumlah_barang'], $keranjang['keterangan'], $keranjang['harga'] * $keranjang['jumlah_barang']);
		}			
		
		return $list;
	}
	
	public static function count() {
		$db = Db::getInstance();
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$row = 0;
		if ($transaksi){
			$idTransaksi = $transaksi->idTransaksi;
			$sql = "SELECT b.nama_barang, b.harga, k.jumlah_barang AS kuantitas FROM keranjang k, barang b WHERE k.id_barang = b.id_barang AND k.id_transaksi = '".$idTransaksi."'";
			
//			$row = $db->query($sql)->rowCount();
			$req = $db->query($sql);
			foreach($req->fetchAll() as $data) {
				$row = $row + $data['kuantitas'];
			}
		}
		
		return $row;
	}
	
	public static function remove($idBarang) {
		$db = Db::getInstance();
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$idTransaksi = $transaksi->idTransaksi;
		$sql = "DELETE FROM keranjang WHERE keranjang.id_barang = '".$idBarang."' AND keranjang.id_transaksi = '".$idTransaksi."'";
		$req = $db->query($sql);
	}

	public static function clean() {
		$db = Db::getInstance();
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$idTransaksi = $transaksi->idTransaksi;
		$sql = "DELETE FROM keranjang WHERE keranjang.id_transaksi = ".$idTransaksi;
		$req = $db->query($sql);
	}
		
	public static function hitungTotal() {
		$db = Db::getInstance();
		
		$totalTagihan = 0;
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		if ($transaksi){
			$idTransaksi = $transaksi->idTransaksi;
			$req = $db->prepare('SELECT k.jumlah_barang, b.harga FROM keranjang k, barang b WHERE k.id_barang = b.id_barang AND k.id_transaksi = :id');
			$req->execute(array('id' => $idTransaksi));
			
			foreach($req->fetchAll() as $total) {
				$totalTagihan = $totalTagihan + ($total['jumlah_barang'] * $total['harga']);
			}			
		}
		
		return $totalTagihan;
	}
	
	public static function hitungBobot() {
		$db = Db::getInstance();
		
		$totalBobot = 0;
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		if ($transaksi){
			$idTransaksi = $transaksi->idTransaksi;
			$req = $db->prepare('SELECT k.jumlah_barang, b.bobot FROM keranjang k, barang b WHERE k.id_barang = b.id_barang AND k.id_transaksi = :id');
			$req->execute(array('id' => $idTransaksi));
			
			foreach($req->fetchAll() as $total) {
				$totalBobot = $totalBobot + ($total['jumlah_barang'] * $total['bobot']);
			}
		}
		
		return $totalBobot;
	}

	//Untuk API
	public static function simpan($idTransaksi, $arr) {
		$db = Db::getInstance();
		$query = "INSERT INTO keranjang VALUES ";
		$qPart = array_fill(0, count($arr), "(?, ?, ?, ?)");
		$query .= implode(",", $qPart);
		$stmt = $db->prepare($query);
		
		$i = 1;
		foreach($arr as $item) {
			$stmt->bindValue($i++, $item->idBarang);
			$stmt->bindValue($i++, $idTransaksi);
			$stmt->bindValue($i++, $item->kuantitas);
			$stmt->bindValue($i++, $item->keterangan);
		}
		
		$stmt->execute();
	}
}
?>
