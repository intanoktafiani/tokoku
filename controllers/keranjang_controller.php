<?php

class KeranjangController {
    public function index() {
		$totalHarga = Keranjang::hitungTotal();
		
		$_SESSION['itemCount'] = Keranjang::count();
		$pelanggan = Pelanggan::find($_SESSION['id']);
		
		if ($_SESSION['itemCount'] > 0){
			$items = Keranjang::lists();
			$pelanggan = Pelanggan::find($_SESSION['id']);
		} else {
			$items = null;
			$pelanggan = null;
		}
		
		require_once('views/keranjang/index.php');
    }

	public function add() {
		if (isset($_SESSION['role']) && ($_SESSION['role'] == "PELANGGAN_ROLE")) {
			$kuantitas = $_POST["kuantitas"];
			$idBarang = $_POST["idBarang"];
			$keterangan = $_POST["keterangan"];
			
			if(!empty($kuantitas) && !empty($idBarang)) {
				Keranjang::add($idBarang, $kuantitas, $keterangan);
			}
			
			$this->index();			
		} else { // Login first
			header('Location: http://tokoku-itb.pe.hu');
		}
	}
	
	public function remove() {
		Keranjang::remove($_GET['idBarang']);

		$this->index();
	}
	
	public function clean() {
		Keranjang::clean();
		$this->index();
	}
}
?>