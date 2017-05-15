<?php
// Model

class Pembelian {
	public $idTransaksi;
	public $statusTransaksi;
	public $jumlahNominal;
	public $alamatPengiriman;
	public $kodePosPengiriman;
	public $nomorResi;
	public $waktuPembayaran;
	public $waktuCheckout;
	public $potonganVoucher;
	public $idPelanggan;
	public $idMetodePembayaran;
	public $idBank;
	
	
	public function __construct() { }

	public static function create($jumlahNominal, $alamatPengiriman, $kodePosPengiriman,
			$kodeVoucher, $potonganVoucher, $idPelanggan, $waktuCheckout) {
		$instance = new self();

		$instance->alamatPengiriman = $alamatPengiriman;
		$instance->kodePosPengiriman = $kodePosPengiriman;
		$instance->potonganVoucher = $potonganVoucher;
		$instance->idPelanggan = $idPelanggan;
		$instance->jumlahNominal = $jumlahNominal;

		$instance->statusTransaksi = "Belum Dibayar";
		$instance->idTransaksi = sha1($idPelanggan . '' . $waktuCheckout->getTimestamp());
		$instance->waktuPembayaran = null;
		$instance->waktuCheckout = $waktuCheckout;
		
		return $instance;
	}
	
	public static function createComplete($idTransaksi, $statusTransaksi, $jumlahNominal, $alamatPengiriman,
			$kodePosPengiriman, $nomorResi, $waktuPembayaran, $waktuCheckout, $potonganVoucher, $idPelanggan,
			$idMetodePembayaran = 1, $idBank = 1) {
		$instance = new self();
		$instance->idTransaksi = $idTransaksi;
		$instance->statusTransaksi = $statusTransaksi;
		$instance->jumlahNominal = $jumlahNominal;
		$instance->alamatPengiriman = $alamatPengiriman;
		$instance->kodePosPengiriman = $kodePosPengiriman;
		$instance->nomorResi = $nomorResi;
		$instance->waktuPembayaran = $waktuPembayaran;
		$instance->waktuCheckout = $waktuCheckout;
		$instance->potonganVoucher = $potonganVoucher;
		$instance->idPelanggan = $idPelanggan;
		$instance->idMetodePembayaran = $idMetodePembayaran;
		$instance->idBank = $idBank;
		
		return $instance;
	}
	
	public static function simpan() {
		$db = Db::getInstance();
		$totalHarga = Keranjang::hitungTotal();
		$kodeVoucher = $_POST["kodeVoucher"];
		$potonganVoucher = 0; // HITUNG
		if ($kodeVoucher != "") {
			$voucher = Voucher::getOne($kodeVoucher);
			if ($voucher) {
				$potonganVoucher = $voucher->hitungPotongan($voucher->idKategoriBarang, $voucher->nominalVoucher);
			}
		}
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$idTransaksi = $transaksi->idTransaksi;
		
		$alamatPengiriman = $_POST["alamat"];
		$kodeposPengiriman = $_POST["kodePos"];
		$provinsi = $_POST["provinsi"];
		$kabupaten = $_POST["kabkota"];
		$kecamatan = $_POST["kecamatan"];
		$tikiku = new Tikiku($provinsi, $kabupaten, $kecamatan);
		$tarifPengiriman = $tikiku->cekTarif();
		$beratKiriman = Keranjang::hitungBobot();
		$biayaPengiriman = $tarifPengiriman * ($beratKiriman / 1000);
		$noResi = "RESI_001";
		$d=strtotime("today");
		$waktuCheckout = date("Y-m-d h:i:sa", $d);
		
		$sql = "UPDATE transaksi SET status_transaksi='Sedang Belanja', jumlah_nominal = '".$totalHarga."', alamat_pengiriman = '".$alamatPengiriman."', kode_pos_pengiriman = '".$kodeposPengiriman."', nomor_resi = '".$noResi."', waktu_checkout = (SELECT NOW()), potongan_voucher = '".$potonganVoucher."' WHERE id_transaksi = ".$idTransaksi;

		$stmt = $db->query($sql);
		
		return $biayaPengiriman;
				
	}
	
	public static function getByPelanggan() {
		$list = [];
		
		$db = Db::getInstance();
		$idPelanggan = $_SESSION['id'];
		
		$query = "SELECT * FROM transaksi WHERE id_pelanggan = :idPelanggan";
		$stmt = $db->prepare($query);
		$stmt->execute(array('idPelanggan' => $idPelanggan));

		$rs = $stmt->fetchAll();
		foreach($rs as $k => $val) {
			$list[$k] = Pembelian::createComplete($val["id_transaksi"], $val["status_transaksi"], $val["jumlah_nominal"], $val["alamat_pengiriman"],
							$val["kode_pos_pengiriman"], $val["nomor_resi"], $val["waktu_pembayaran"], $val["waktu_checkout"], $val["potongan_voucher"],
							$val["id_pelanggan"], $val["id_metode_pembayaran"], $val["id_bank"]);
		}
		
		return $list;
	}
	
	public static function getByIdPelanggan($idPelanggan) {
		$list = [];
		
		$db = Db::getInstance();
		$query = "SELECT * FROM transaksi WHERE id_pelanggan = :idPelanggan";
		$stmt = $db->prepare($query);
		$stmt->execute(array('idPelanggan' => $idPelanggan));

		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($rs as $k => $val) {
			$list[$k] = Pembelian::createComplete($val["id_transaksi"], $val["status_transaksi"], $val["jumlah_nominal"], $val["alamat_pengiriman"],
							$val["kode_pos_pengiriman"], $val["nomor_resi"], $val["waktu_pembayaran"], $val["waktu_checkout"], $val["potongan_voucher"],
							$val["id_pelanggan"], $val["id_metode_pembayaran"], $val["id_bank"]);
		}
		
		return $list;
	}
	
	public static function getById($idTransaksi) {
		$db = Db::getInstance();
		$query = "SELECT * FROM transaksi WHERE id_transaksi = :idTransaksi";
		$stmt = $db->prepare($query);
		$stmt->execute(array('idTransaksi' => $idTransaksi));
		$val = $stmt->fetch();

		return Pembelian::createComplete($val["id_transaksi"], $val["status_transaksi"], $val["jumlah_nominal"], $val["alamat_pengiriman"],
			$val["kode_pos_pengiriman"], $val["nomor_resi"], $val["waktu_pembayaran"], $val["waktu_checkout"], $val["potongan_voucher"],
			$val["id_pelanggan"], $val["id_metode_pembayaran"], $val["id_bank"]);
	}
	
	public static function getOne() {
		$db = Db::getInstance();
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$idTransaksi = $transaksi->idTransaksi;
		$query = "SELECT * FROM transaksi WHERE id_transaksi = :idTransaksi";
		$stmt = $db->prepare($query);
		$stmt->execute(array('idTransaksi' => $idTransaksi));
		$rs = $stmt->fetch();
		
		return Pembelian::createComplete($rs["id_transaksi"], $rs["status_transaksi"], $rs["jumlah_nominal"], $rs["alamat_pengiriman"],
							$rs["kode_pos_pengiriman"], $rs["nomor_resi"], $rs["waktu_pembayaran"], $rs["waktu_checkout"], $rs["potongan_voucher"],
							$rs["id_pelanggan"], $rs["id_metode_pembayaran"], $rs["id_bank"]);
	}
	
	public function kirim($idTransaksi) {
		$tikiku = new Tikiku();
		$nomorResi = $tikiku->kirim();
		if ($nomorResi) {
			$db = Db::getInstance();
			$query = "UPDATE transaksi SET nomor_resi = :nomorResi, status_transaksi = :statusTransaksi WHERE id_transaksi = :idTransaksi";
			$stmt = $db->prepare($query);
			$stmt->execute(array('idTransaksi' => $idTransaksi, 'statusTransaksi' => 'Sudah Dikirim', 'nomorResi' => $nomorResi));
		}
	}
	
	public function bayar($idTransaksi, $nomorRekeningAsal, $nomorRekeningTujuan, $pin) {
		$paymentGateway = new PaymentGateway();
		if ($paymentGateway->pay($nomorRekeningAsal, $nomorRekeningTujuan, $pin)) {
			$db = Db::getInstance();
			$query = "UPDATE transaksi SET nomor_rekening_asal = :nomorRekeningAsal, nomor_rekening_tujuan = :nomorRekeningTujuan, status_transaksi = :statusTransaksi WHERE id_transaksi = :idTransaksi";
			$stmt = $db->prepare($query);
			$stmt->execute(array('idTransaksi' => $idTransaksi, 'statusTransaksi' => 'Sudah Dibayar', 'nomorRekeningAsal' => $nomorRekeningAsal, 'nomorRekeningTujuan' => $nomorRekeningTujuan));
		} else {
			throw new Exception("402");
		}
	}
	
	public function terima() {
		$db = Db::getInstance();
		$query = "UPDATE transaksi SET status_transaksi = :statusTransaksi WHERE id_transaksi = :idTransaksi";
		$stmt = $db->prepare($query);
		$stmt->execute(array('statusTransaksi' => 'Sudah Diterima', 'idTransaksi' => $this->idTransaksi));
	}
	
	private function dateToString($date) {
		if ($date) {
			return $date->format("Y-m-d H:i:s");
		} else {
			return NULL;
		}
	}

	public function simpanApi() {
		$db = Db::getInstance();
		$query = "INSERT INTO transaksi(status_transaksi, jumlah_nominal, alamat_pengiriman, kode_pos_pengiriman, waktu_pembayaran, waktu_checkout, potongan_voucher, id_pelanggan, id_metode_pembayaran, id_bank, nomor_resi) " .
				"VALUES(:statusTransaksi, :jumlahNominal, :alamatPengiriman, :kodeposPengiriman, :waktuPembayaran, :waktuCheckout, :potonganVoucher, :idPelanggan, :idMetodePembayaran, :idBank, :nomorResi)";
		$stmt = $db->prepare($query);

		$val = array(
				'statusTransaksi' => "WORKING",
				'jumlahNominal' => $this->jumlahNominal,
				'alamatPengiriman' => $this->alamatPengiriman,
				'kodeposPengiriman' => $this->kodePosPengiriman,
				'waktuPembayaran' => dateToString($this->waktuPembayaran),
				'waktuCheckout' => dateToString($this->waktuCheckout),
				'potonganVoucher' => $this->potonganVoucher,
				'idPelanggan' => $this->idPelanggan,
				'idMetodePembayaran' => $this->idMetodePembayaran,
				'idBank' => $this->idBank,
				'nomorResi' => $this->nomorResi
			);

		$stmt->execute($val);
		
		
		$stmt = $db->prepare("SELECT id_transaksi FROM transaksi WHERE status_transaksi = :statusTransaksi AND id_pelanggan = :idPelanggan");
		$stmt->execute(array('statusTransaksi' => 'WORKING', 'idPelanggan' => $this->idPelanggan));
    	$res = $stmt->fetch();
    	return $res['id_transaksi'];
	}
	
	public function updateKirim() {
		$db = Db::getInstance();
		$stmt = $db->prepare("UPDATE transaksi SET status_transaksi = 'Sudah Dikirim' WHERE id_transaksi = :idTransaksi");
		$stmt->execute(array('idTransaksi' => $this->idTransaksi));
	}
	
	public function kembalikan() {
		$pembelian = Pembelian::getById($this->idTransaksi);
		if ($pembelian->statusTransaksi == 'Sudah Dibayar') {
			$db = Db::getInstance();
			$query = "UPDATE transaksi SET status_transaksi = :statusTransaksi WHERE id_transaksi = :idTransaksi";
			$stmt = $db->prepare($query);
			$stmt->execute(array('statusTransaksi' => 'Pengajuan Pengembalian', 'idTransaksi' => $this->idTransaksi));
		} else {
			throw new Exception("Barang belum dikirim atau sedang dalam pengembalian", 407);
		}
	}
}
?>
