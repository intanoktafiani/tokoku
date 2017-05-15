<?php
// Model

class Wilayah {
	public static $host = "http://localhost/tokoku";
	
	public static function getProvinsi() {
		$json = file_get_contents(Wilayah::$host . "/resources/json/provinsi.json");
		return json_decode($json, true);
	}

	public static function getProvinsiKode($namaProvinsi) {
		foreach(Wilayah::getProvinsi() as $prov) {
			if ($prov["namaProvinsi"] == $namaProvinsi) {
				return $prov["kodeProvinsi"];
			}
		}
		return NULL;
	}

	public static function getAllKabupaten() {
		$json = file_get_contents(Wilayah::$host . "/resources/json/kabupaten.json");
		return json_decode($json, true);
	}
	
	public static function getKabupaten($kodeProvinsi) {
		$listKabupaten = [];
		foreach(Wilayah::getAllKabupaten() as $kab) {
			if ($kab["kodeProvinsi"] == $kodeProvinsi) {
				$listKabupaten[] = $kab;
			}
		}
		return $listKabupaten;
	}

	public static function getKabupatenKode($namaKabupaten) {
		foreach(Wilayah::getAllKabupaten() as $kab) {
			if ($kab["namaKotaKabupaten"] == $namaKabupaten) {
				return $kab["kodeKotaKabupaten"];
			}
		}
		return NULL;
	}

	public static function getAllKecamatan() {
		$json = file_get_contents(Wilayah::$host . "/resources/json/kecamatan.json");
		return json_decode($json, true);
	}
	
	public static function getKecamatan($kodeKabupaten) {
		$listKecamatan = [];
		foreach(Wilayah::getAllKecamatan() as $kec) {
			if ($kec["kodeKotaKabupaten"] == $kodeKabupaten) {
				$listKecamatan[] = $kec;
			}
		}
		return $listKecamatan;
	}

	public static function getKecamatanKode($namaKecamatan) {
		foreach(Wilayah::getAllKecamatan() as $kec) {
			if ($kec["namaKecamatan"] == $namaKecamatan) {
				return $kec["kodeKecamatan"];
			}
		}
		return NULL;
	}
}
?>
