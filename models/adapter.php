<?php
// Model Adapter

class PaymentGateway {
	public function pay($rekeningTujuan) {
		if ($rekeningTujuan == NULL) {
			throw new Exception("Rekening tidak boleh kosong");
		} 
		return time() % 2;
	}
}

class SmsGateway {
	public function send($phoneNumber, $message) {
		return TRUE;
	}
}

class EmailSender {
	public function send($address, $subject, $message) {
		return TRUE;
	}
}

class Tikiku {
	public $provinsi;
	public $kabupaten;
	public $kecamatan;
	
	public $myProvinsi;
	public $myKabupaten;
	public $myKecamatan;
	
	private $host = "http://tikiku.zeidcode.com";

	public function __construct($provinsi, $kabupaten, $kecamatan) {
		$this->myProvinsi = Wilayah::getProvinsiKode("JAWA BARAT");
		$this->myKabupaten = Wilayah::getKabupatenKode("KOTA BANDUNG");
		$this->myKecamatan = Wilayah::getKecamatanKode("CIDADAP");
		$this->provinsi = Wilayah::getProvinsiKode($provinsi);
		$this->kabupaten = Wilayah::getKabupatenKode($kabupaten);
		$this->kecamatan = Wilayah::getKecamatanKode($kecamatan);
	}

	public function cekTarif() {
		/*
		$endpoint = "/webservis/tarif.php";
		$url = $this->host . $endpoint . "?API_KEY=12345&provinsiPengirim=$this->myProvinsi&kotaKabupatenPengirim=$this->myKabupaten&provinsiPenerima=$this->provinsi&kotaKabupatenPenerima=$this->kabupaten&kodeProdukPengiriman=SDS&kodeJenisBarang=DOC";
		$json = file_get_contents($url);
		$obj = json_decode($json, true);

		if (is_array($obj)) {
			return $obj["tarifPengirimanBarang"];
		} else {
			return $obj;
		}
		*/
		
		return 100;
	}
	
	public function kirim($namaPengirim, $alamatPengirim, $noTeleponPengirim, $namaPenerima, $alamatPenerima, $noTeleponPenerima, $beratKiriman) {
		/*
		$endpoint = "/webservis/insertData.php";
		$url = "?Api-Key=12345&namaPengirim=$namaPengirim&alamatPengirim=$alamatPengirim&noTeleponPengirim=$noTeleponPengirim&kodeProvinsiPengirim=$myProvinsi&kodeKotaKabupatenPengirim=$myKabupaten&namaPenerima=$namaPenerima&alamatPenerima=$alamatPenerima&noTeleponPenerima=$noTeleponPenerima&kodeProvinsiPenerima=$provinsi&kodeKotaKabupatenPenerima=$kabupaten&kodeKecamatanPenerima=$kecamatan&kodeProdukPengiriman=SDS&kodeJenisBarang=DOC&deskrpisiBarang=TOKOKU&beratBarang=$beratKiriman";
		$json = file_get_contents($url);
		$obj = json_decode($json, true);

		if (is_array($obj)) {
			return $obj["no_Resi"];
		} else {
			return $obj;
		}
		*/
		
		return "229833300120";
	}
	
	public function cekResi($noResi) {
		$endpoint = "/webservis/CekResi.php";
		$url = $this->host . $endpoint . "?noResi=$noResi";
		
		return file_get_contents($url);
	}
}
?>
