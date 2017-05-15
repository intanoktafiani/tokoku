<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 22 April 2017
// Usage		: Model

class MetodePembayaran {
	public $namaBank;
	public $nomorRekening;
	public $jenisPembayaran;
	
	public function __construct($namaBank, $nomorRekening, $jenisPembayaran) {
		$this->namaBank= $namaBank;
		$this->nomorRekening= $nomorRekening;
		$this->jenisPembayaran = $jenisPembayaran;
	}
	
	public static function all() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT b.nama_bank namaBank, b.nomor_rekening nomorRekening, m.jenis_pembayaran jenisPembayaran FROM bank b, metode_pembayaran m, metode_pembayaran_bank p WHERE p.id_metode_pembayaran = m.id_metode_pembayaran AND p.id_bank = b.id_bank');
		
		foreach($req->fetchAll() as $data) {
			$list[] = new MetodePembayaran($data['namaBank'], $data['nomorRekening'], $data['jenisPembayaran']);
		}
		
		return $list;
	}
}
?>