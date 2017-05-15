<?php
// Model

class RekeningBank {
	public $nomorRekening;
	public $namaBank;
	public $metodePembayaran;

	public function __construct($nomorRekening, $namaBank, $metodePembayaran) {
		$this->nomorRekening = $nomorRekening;
		$this->namaBank = $namaBank;
		$this->metodePembayaran = $metodePembayaran;
	}
	
	public static function getOne($nomorRekening) {
		$query = "SELECT * FROM rekening_bank WHERE nomor_rekening = :nomorRekening";
		$val = array('nomorRekening' => $nomorRekening);

		$db = Db::getInstance();
		$stmt = $db->prepare($query);
		$stmt->execute($val);
		$rs = $stmt->fetch();
		
		return new RekeningBank($rs["nomor_rekening"], $rs["nama_bank"], $rs["metode_pembayaran"]);
	}
	
	public static function getOneByNamaBankAndMetodePembayaran($namaBank, $metodePembayaran) {
		$query = "SELECT * FROM rekening_bank WHERE nama_bank = :namaBank AND metode_pembayaran = :metodePembayaran";
		$val = array('namaBank' => $namaBank, 'metodePembayaran' => $metodePembayaran);

		$db = Db::getInstance();
		$stmt = $db->prepare($query);
		$stmt->execute($val);
		$rs = $stmt->fetch();

		if ($rs) {
			return new RekeningBank($rs["nomor_rekening"], $rs["nama_bank"], $rs["metode_pembayaran"]);
		} else {
			throw new Exception("Rekening tidak ditemukan");
		}
	}
}
?>
