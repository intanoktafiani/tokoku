<?php
/**
* Controller untuk fitur pembelian.
*/
class PembelianController {
	
	/**
	 * 
	 */
    public function index() {
		$listPembelian = Pembelian::getByPelanggan();
		require_once('views/pembelian/index.php');
    }
	
	/**
	 * 
	 */
    public function konfirmasiPesanan() {
		$totalTagihan = Keranjang::hitungTotal();
		$pelanggan = $_SESSION["pelanggan"];
		
		require_once('views/pembelian/konfirmasi_pesanan.php');
    }
	
	public function konfirmasiPembayaran() {
		$biayaPengiriman = Pembelian::simpan(); // menyimpan Transaksi pada Keranjang
		$pembelian = Pembelian::getOne();
		
		require_once('views/pembelian/konfirmasi_pembayaran.php');
	}
	
	public function konfirmasiPembayaranDigital() {
	//	$biayaPengiriman = Pembelian::simpan(); // menyimpan Transaksi pada Keranjang
		
	//	$pembelian = Pembelian::getOne();
		$nomor = $_POST['nomor'];
		$jenisBarangDigital = $_POST['jenisBarangDigital'];
		$hargaBarang = $_POST['hargaBarang'];
		$idBarang = $_POST['idBarang'];
		$serialNumber = Barang::getSerialNumber($idBarang);
		require_once('views/pembelian/konfirmasi_pembayaran_digital.php');
	}
	
	public function pesan() {
		$pelanggan = $_SESSION["pelanggan"];

		$alamatPengiriman = $_POST["alamat"];
		$kodeposPengiriman = $_POST["kodepos"];
		$provinsi = $_POST["provinsi"];
		$kabupaten = $_POST["kabupaten"];
		$kecamatan = $_POST["kecamatan"];
		
		$tikiku = new Tikiku($provinsi, $kabupaten, $kecamatan);
		$tarifPengiriman = $tikiku->cekTarif();
		$beratKiriman = Keranjang::hitungBobot($_SESSION["keranjang"]);
		$biayaPengiriman = $tarifPengiriman * $beratKiriman;
		$jumlahNominal = Keranjang::hitungTotal($_SESSION["keranjang"]);

		$kodeVoucher = $_POST["kode_voucher"];
		$potonganVoucher = 0; // HITUNG
		if ($kodeVoucher != "") {
			$voucher = Voucher::getOne($kodeVoucher);
			$potonganVoucher = $voucher->hitungPotongan($_SESSION["keranjang"]);
			if ($potonganVoucher == 0) {
				header("Location: " . $home . "?controller=pembelian&action=konfirmasi_pesanan&message=voucher_invalid");
				return;
			}
		} else {
			$kodeVoucher = NULL;
		}

		$pembelian = Pembelian::create($jumlahNominal, $alamatPengiriman, $kodeposPengiriman, $kodeVoucher, $potonganVoucher, $pelanggan->idPelanggan, new DateTime(), $provinsi, $kabupaten, $kecamatan, $biayaPengiriman, $beratKiriman);

		if ($pembelian->simpan()) {
			Keranjang::simpan($pembelian->idTransaksi, $_SESSION["keranjang"]);
			Keranjang::clean();
			header("Location: " . $home . "?controller=pembelian&action=index&message=next_bayar");
		} else {
			header("Location: " . $home . "?controller=keranjang&action=index&message=pesan_error");
		}
	}
	
	public function bayar() {
		$jenisPembayaran = $_POST['jenisPembayaran'];
		if ($jenisPembayaran == "Fisik") { // STUB bahwa Pembayaran selalu berhasil
			// kurangi stok
			Barang::adjustFisikStock();
			
			// ubah status transaksi agar isi keranjang kembali kosong
			Transaksi::updateStatus();
			
			header("Location: " . $home . "?controller=pembelian&action=index&message=bayar_done");
		} else { // $jenisPembayaran == "Digital"
			$serialNumber = $_POST['serialNumber'];
			Barang::adjustDigitalStock($serialNumber);	
			header("Location: " . $home . "?controller=pembelian&action=index&message=bayar_done");
		}
	}
	
	public function terima() {
		$pembelian = Pembelian::getById($_GET["id_transaksi"]);
		$pembelian->terima();
		header("Location: " . $home . "?controller=pembelian&action=index&message=accepted");
	}
}
?>
