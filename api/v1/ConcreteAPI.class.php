<?php
require_once 'API.class.php';

class ConcreteAPI extends API {

    public function __construct($request, $origin) {
        parent::__construct($request);
	}

	/* Endpoint Barang */
	protected function barang($args) {
		switch ($this->method) {
			case 'GET':
				if (!empty($this->verb)) {
					if (!empty($this->args[0])) {
						switch($this->verb) {
							case "kategori":
								return Barang::getByCategory($this->args[0]);
							default: throw new Exception("Not Found", 404);
						}
					}
				} else if (!empty( $this->args)) {
					return Barang::find($this->args[0]);
				} else {
					throw new Exception('Not found', 404);
				}
				break;
			default: throw new Exception("Method not allowed", 405);
		}
	}

	/* Endpoint Pembelian */
	protected function pembelian() {
		switch ($this->method) {
			case 'GET':
				$pelanggan = $this->authenticate();
				return Pembelian::getByIdPelanggan($pelanggan->idPelanggan);
			case 'POST':
				$pelanggan = $this->authenticate();
				$body = json_decode($this->file, true);
				$provinsi = $body["alamat"]["provinsi"];
				$kabupaten = $body["alamat"]["kabupaten"];
				$kecamatan = $body["alamat"]["kecamatan"];

				$keranjang = [];
				$beratKiriman = 0;
				$jumlahNominal = 0;
				foreach($body["pesanan"] as $item) {
					$barang = Barang::find($item["idBarang"]);
					$idKategoriBarang = Barang::getIdCategory($item["idBarang"]);
					$beratKiriman += $barang->bobot;
					$jumlahNominal += $barang->harga;
					$keranjang[] = Keranjang::create($barang->idBarang, $barang->namaBarang, $barang->harga, $item["kuantitas"], "", ($barang->harga * $item["kuantitas"]), $idKategoriBarang);
				}
				
				$tikiku = new Tikiku($provinsi, $kabupaten, $kecamatan);
				$tarifPengiriman = $tikiku->cekTarif();
				$biayaPengiriman = $tarifPengiriman * $beratKiriman;
				$nomorResi = $tikiku->kirim('TOKOKU', 'Jl. Tamansari', '0220129384', $pelanggan->namaLengkap, $pelanggan->alamat, $pelanggan->noHP, $beratKiriman);
				$kodeVoucher = $body["kodeVoucher"];
				$potonganVoucher = 0; // HITUNG
				if ($kodeVoucher != "") {
					$voucher = Voucher::getOne($kodeVoucher);
					$potonganVoucher = $voucher->hitungPotonganPesanan($keranjang);
					if ($potonganVoucher == 0) {
						throw new Exception("Voucher tidak berlaku untuk pesanan anda", 407);
					}
				} else {
					$kodeVoucher = NULL;
				}

				$date = new DateTime();
				$pembelian = Pembelian::createComplete(NULL, 'WORKING', $jumlahNominal, $body["alamat"]["detail"],
					$body["alamat"]["kodepos"], $nomorResi, $date, $date, $potonganVoucher, $pelanggan->idPelanggan, 1, 1);

				if ($idTransaksi = $pembelian->simpanApi()) {
					Keranjang::simpan($idTransaksi, $keranjang);
					$pembelian->idTransaksi = $idTransaksi;
					$pembelian->updateKirim();
					
					return $idTransaksi;
				} else {
					throw new Exception("Failed", 500);
				}
			default: throw new Exception("Method not allowed", 405);
		}
	}
}
?>
