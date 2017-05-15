<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 5 Mei 2017
// Usage		: Controller

class LaporanController {
	public function laporanPenjualanAdvance() {
		if ($_SESSION['role'] == "ADMIN_ROLE") {
			$req = Laporan::laporanPenjualan();
			require_once('views/laporan/laporan_penjualan_advance.php');
		} else {
			header('Location: http://tokoku-itb.pe.hu');
		}
	}	
}
?>