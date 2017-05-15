<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 7 Mei 2017
// Usage		: Controller

class PengembalianController {
	public function index() {
		if ($_SESSION['role'] == "ADMIN_ROLE") {
			$pengembalian = Pengembalian::all();
			require_once('views/pengembalian/index.php');
		} else {
			header('Location: http://tokoku-itb.pe.hu');
		}		
	}
	
	public function history() {
		if ($_SESSION['role'] == "ADMIN_ROLE") {
			$pengembalian = Pengembalian::history();
			require_once('views/pengembalian/history.php');
		} else {
			header('Location: http://tokoku-itb.pe.hu');
		}		
	}

	public function detail() {		
		$pengembalian = Pengembalian::getByTransaksi();
		require_once('views/pengembalian/detail.php');
	}
	
	public function terima(){
		Pengembalian::updateStatus("Diterima", $_GET["id_transaksi"]);
		$this->index();
	}
	
	public function tolak(){
		Pengembalian::updateStatus("Ditolak", $_GET["id_transaksi"]);
		$this->index();
	}
	
	public function konfirmasi() {
		$pembelian = Pembelian::getById($_GET["id_transaksi"]);
		require_once('views/pengembalian/konfirmasi.php');
	}
	
	public function kembalikan() {
		$pengembalian = Pengembalian::createEsential($_POST["id_transaksi"], $_POST["alasan"], $_FILES["bukti"]);
		$pengembalian->simpanFile();
		$pengembalian->simpan();
		
		$pembelian = Pembelian::getById($_POST["id_transaksi"]);
		$pembelian->kembalikan();
		
		header("Location: " . $home . "?controller=pembelian&action=index&message=return_success");
	}
}
?>