<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 5 Mei 2017
// Usage		: Model

class Laporan {
		
	public static function laporanPenjualan() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query("SELECT MONTHNAME(waktu_pembayaran) AS bulan,
							YEAR(waktu_pembayaran) AS tahun,
							sum(jumlah_nominal) AS 'totalPenjualan',
							COUNT(id_transaksi) AS 'jumlahTransaksi'
							FROM transaksi
							WHERE NOT status_transaksi = 'Belum Dibayar'
							GROUP BY MONTHNAME(waktu_pembayaran),
							YEAR(waktu_pembayaran)");
		return $req;
	}
}
?>