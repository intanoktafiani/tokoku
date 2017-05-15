<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 12 Mei 2017
// Usage		: Model

class Transaksi {
	public $idTransaksi;
	public $statusTransaksi;
	public $jumlahNominal;
	public $alamatPengiriman;
	public $kodePos;
	public $noResi;
	public $waktuPembayaran;
	public $waktuCheckout;
	public $potonganVoucher;
	public $idPelanggan;
	public $idMetodePembayaran;
	public $idBank;
	
	public function __construct($idTransaksi, $statusTransaksi, $jumlahNominal, $idPelanggan) {
		$this->idTransaksi = $idTransaksi;
		$this->statusTransaksi = $statusTransaksi;
		$this->jumlahNominal = $jumlahNominal;
		$this->idPelanggan = $idPelanggan;
	}
	
	public static function all() {
	}
	
	public static function lists($start) {
	}
		
	public static function find($id) {
		$db = Db::getInstance();
		$id = intval($id);
		$req = $db->prepare("SELECT * FROM transaksi WHERE status_transaksi = 'Sedang Belanja' AND id_pelanggan = :id");
		$req->execute(array('id' => $id));
		$transaksi = $req->fetch();
		if ($transaksi){
			return new Transaksi($transaksi['id_transaksi'], $transaksi['status_transaksi'], $transaksi['jumlah_nominal'], $transaksi['id_pelanggan']);
		} else {
			return null;
		}
	}
	
	public static function findByStatus($id, $status) {
		$db = Db::getInstance();
		$id = intval($id);
		$req = $db->prepare("SELECT * FROM transaksi WHERE status_transaksi = :status AND id_pelanggan = :id");
		$req->execute(array('id' => $id, 'status' => "Sudah Dibayar"));
		$transaksi = $req->fetch();
		if ($transaksi){
			return new Transaksi($transaksi['id_transaksi'], $transaksi['status_transaksi'], $transaksi['jumlah_nominal'], $transaksi['id_pelanggan']);
		} else {
			return null;
		}
	}
	
	public static function updateStatus() {
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$idTransaksi = $transaksi->idTransaksi;
		$db = Db::getInstance();		
		$req = $db->prepare("UPDATE transaksi SET status_transaksi = 'Sudah Dibayar', id_metode_pembayaran = 1, id_bank = 1 WHERE id_transaksi = :idTransaksi");
		$req->execute(array('idTransaksi' => $idTransaksi));
	}	
}
?>