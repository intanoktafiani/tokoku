<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 4 Mei 2017
// Usage		: Controller

class LoginController {
	public function index() {
		header('Location: http://tokoku.kilatiron.com/');
	}
	
	public function authenticate() {
		if (((($_POST['username'] == "administrator") || ($_POST['username'] == "Administrator") || ($_POST['username'] == "admin") || ($_POST['username'] == "Admin")) && ($_POST['password']) == "tokoku")) {
			$myusername = $_POST['username'];
			$_SESSION['login_user'] = $myusername;
			$_SESSION['name'] = $myusername;
			$_SESSION['role'] = "ADMIN_ROLE";
			$_SESSION['id'] = "0";
			$req = Laporan::laporanPenjualan();
			require_once('views/laporan/laporan_penjualan_advance.php');			
		} else {
			$category = Login::authenticate($_POST['username'], $_POST['password']);
			if ($category == 1) { // Pelanggan terotentikasi
				$myusername = $_POST['username'];
				$_SESSION['login_user'] = $myusername;
				$pelanggan = Login::find($_POST['username']);
				$_SESSION['name']= $pelanggan[1];
				$_SESSION['role'] = "PELANGGAN_ROLE";
				$_SESSION['id'] = $pelanggan[0];
				$this->index();
			}
		}
	}
	
	public function terminate() {
		session_unset();
		session_destroy();
		$this->index();
	}	
}
?>