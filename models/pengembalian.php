<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 7 Mei 2017
// Usage		: Model

class Pengembalian {
	public $idPengembalian;
	public $idTransaksi;
	public $statusPengembalian;
	public $alasanPengembalian;
	public $lokasiGambarBuktiAlasan;
	public $noResiBuktiPengembalian;

	public $imageFile;
	private $target_dir = "img/pengembalian/";
	
	public function __construct($idPengembalian, $idTransaksi, $statusPengembalian, $alasanPengembalian, $lokasiGambarBuktiAlasan, $noResiBuktiPengembalian) {
		$this->idPengembalian = $idPengembalian;
		$this->idTransaksi = $idTransaksi;
		$this->statusPengembalian = $statusPengembalian;
		$this->alasanPengembalian = $alasanPengembalian;
		$this->lokasiGambarBuktiAlasan = $lokasiGambarBuktiAlasan;
		$this->noResiBuktiPengembalian = $noResiBuktiPengembalian;
	}
	
	public static function create($idPengembalian, $idTransaksi, $statusPengembalian, $alasanPengembalian, $lokasiGambarBuktiAlasan, $noResiPengembalian, $waktuPermintaanPengembalian, $waktuResponPengembalian) {
		$instance = new self($idPengembalian, $idTransaksi, $statusPengembalian, $alasanPengembalian, $lokasiGambarBuktiAlasan, $noResiPengembalian);
		$instance->waktuPermintaanPengembalian = $waktuPermintaanPengembalian;
		$instance->waktuResponPengembalian = $waktuResponPengembalian;
		
		return $instance;
	}
	
	public static function createEsential($idTransaksi, $alasanPengembalian, $imageFile) {
		$instance = new self(null, null, null, null, null, null);
		$instance->idTransaksi = $idTransaksi;
		$instance->alasanPengembalian = $alasanPengembalian;
		$instance->waktuPermintaanPengembalian = new DateTime();
		$instance->imageFile = $imageFile;
		$instance->statusPengembalian = "Menunggu Respon";
		$instance->noResiBuktiPengembalian = "-";
		
		if ($imageFile) {
			$instance->lokasiGambarBuktiAlasan = $idTransaksi . "-" . basename($imageFile["name"]);
		}
		
		return $instance;
	}
	
	public static function all() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query("SELECT * FROM pengembalian WHERE status_pengembalian = 'Menunggu Respon'");
		
		foreach($req->fetchAll() as $pengembalian) {
			$list[] = new Pengembalian($pengembalian['id_pengembalian'], $pengembalian['id_transaksi'], $pengembalian['status_pengembalian'], $pengembalian['alasan_pengembalian'], $pengembalian['lokasi_gambar_bukti_alasan'], $pengembalian['no_resi_pengembalian']);
		}
		
		return $list;
	}
	
	public static function history() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query("SELECT * FROM pengembalian WHERE status_pengembalian != 'Menunggu Respon'");
		
		foreach($req->fetchAll() as $pengembalian) {
			$list[] = new Pengembalian($pengembalian['id_pengembalian'], $pengembalian['id_transaksi'], $pengembalian['status_pengembalian'], $pengembalian['alasan_pengembalian'], $pengembalian['lokasi_gambar_bukti_alasan'], $pengembalian['no_resi_pengembalian']);
		}
		
		return $list;
	}
	
	public static function find($id) {
		$db = Db::getInstance();
		$id = intval($id);
		$req = $db->prepare('SELECT * FROM pengembalian WHERE id_transaksi = :id');
		$req->execute(array('id' => $id));
		$barang = $req->fetch();
		
		return new Pengembalian($pengembalian['id_pengembalian'], $pengembalian['id_transaksi'], $pengembalian['status_pengembalian'], $pengembalian['alasan_pengembalian'], $pengembalian['lokasi_gambar_bukti_alasan'], $pengembalian['no_resi_pengembalian']);
	}	

	public static function getByTransaksi() {
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::findByStatus($idPelanggan, "Sudah Dibayar");
		$id = $transaksi->idTransaksi;
		
		$db = Db::getInstance();
		$stmt = $db->prepare("SELECT * FROM pengembalian WHERE id_transaksi = :idTransaksi");
		$stmt->execute(array('idTransaksi' => $id));
		$val = $stmt->fetch();
		
		return Pengembalian::create($val['id_pengembalian'], $val['id_transaksi'], $val['status_pengembalian'], $val['alasan_pengembalian'], $val['lokasi_gambar_bukti_alasan'], $val['no_resi_pengembalian'], $val['waktu_permintaan_pengembalian'], $val['waktu_respon_pengembalian']);
	}
	
	public static function updateStatus($status, $idTransaksi){
		$db = Db::getInstance();
		$req = $db->prepare("UPDATE pengembalian SET status_pengembalian = :status WHERE id_transaksi = :idTransaksi");
		$req->execute(array('idTransaksi' => $idTransaksi, 'status' => $status));
	}
	
	public function simpanFile() {
		if ($this->imageFile) {
			$targetFile = $this->target_dir . $this->lokasiGambarBuktiAlasan;
			$imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
			
			move_uploaded_file($this->imageFile["tmp_name"], $targetFile);
			chmod($targetFile, 0644);
		}
	}
	
	public function simpan() {
		$db = Db::getInstance();
		$query = "INSERT INTO pengembalian(id_transaksi, waktu_permintaan_pengembalian, status_pengembalian, alasan_pengembalian, lokasi_gambar_bukti_alasan, no_resi_pengembalian) " .
			"VALUES(:idTransaksi, :waktuPermintaanPengembalian, :statusPengembalian, :alasanPengembalian, :lokasiGambarBuktiAlasan, :noResiPengembalian)";
		$stmt = $db->prepare($query);
		$val = array(
			'idTransaksi' => $this->idTransaksi,
			'waktuPermintaanPengembalian' => dateToString($this->waktuPermintaanPengembalian),
			'statusPengembalian' => $this->statusPengembalian,
			'alasanPengembalian' => $this->alasanPengembalian,
			'lokasiGambarBuktiAlasan' => $this->lokasiGambarBuktiAlasan,
			'noResiPengembalian' => $this->noResiBuktiPengembalian
		);
		
		$stmt->execute($val);
	}
}
?>