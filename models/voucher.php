<?php
// Model

class Voucher {
	public $kodeVoucher;
	public $nominalVoucher;
	public $idPelanggan;
	public $idKategoriBarang;

	public function __construct($kodeVoucher, $nominalVoucher, $idPelanggan, $idKategoriBarang) {
		$this->kodeVoucher = $kodeVoucher;
		$this->nominalVoucher = $nominalVoucher;
		$this->idPelanggan = $idPelanggan;
		$this->idKategoriBarang = $idKategoriBarang;
	}
	
	public static function getOne($kodeVoucher) {
		$query = "SELECT * FROM voucher WHERE kode_voucher = :kodeVoucher";
		$val = array('kodeVoucher' => $kodeVoucher);

		$db = Db::getInstance();
		$stmt = $db->prepare($query);
		$stmt->execute($val);
		$rs = $stmt->fetch();
		
		if ($rs) {
			return new Voucher($rs["kode_voucher"], $rs["nominal_voucher"], $rs["id_pelanggan"], $rs["id_kategori_barang"]);
		} else {
			return null;
		}
	}
	
	public function hitungPotongan($idKategori, $nominal) {
		$totalPotongan = 0;
		$idPelanggan = $_SESSION['id'];
		$transaksi = Transaksi::find($idPelanggan);
		$idTransaksi = $transaksi->idTransaksi;
		$sql = "SELECT * FROM keranjang WHERE id_transaksi =".$idTransaksi;
		$db = Db::getInstance();
		$req = $db->query($sql);
		
		foreach($req->fetchAll() as $item) {
			$idKategoriBarang = Barang::getIdCategory($item['id_barang']);
			$hargaBarang = Barang::getHarga($item['id_barang']);
			if ($idKategoriBarang == $idKategori) {
				$totalPotongan += $hargaBarang * $item['jumlah_barang'] * ($nominal / 100);
			}
		}
		
		return $totalPotongan;
	}
	
	public function hitungPotonganPesanan($listPesanan) {
		$totalPotongan = 0;
		
		foreach($listPesanan as $item) {
			if ($this->idKategoriBarang == $item->idKategoriBarang) {
				$totalHarga = $item->harga * $item->kuantitas;
				$totalPotongan += $totalHarga * ($this->nominalVoucher / 100);
			}
		}
		
		return $totalPotongan;
	}
}
?>
