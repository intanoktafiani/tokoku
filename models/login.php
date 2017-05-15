<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 4 Mei 2017
// Usage		: Model

class Login {
	public $idPelanggan;
	public $namaLengkap;
	public $email;
	public $password;
	
	public function __construct($idPelanggan, $namaLengkap, $email, $password) {
		$this->idBarang = $idPelanggan;
		$this->namaBarang = $namaLengkap;
		$this->deskripsi = $email;
		$this->lokasiGambar = $password;
	}
	
	public static function all() {
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM pelanggan');
		
		$list = [];
		foreach($req->fetchAll() as $login) {
			$list[] = new Login($login['id_pelanggan'], $login['nama_lengkap'], $login['email'], $login['password']);
		}
		
		return $list;
	}
		
	public static function authenticate($username, $password) {
		$db = Db::getInstance();
		$sql = "SELECT id_pelanggan FROM pelanggan WHERE email = '".$username."' AND password = '".$password."'";
		$row = $db->query($sql)->rowCount();
		
		return $row;
	}
		
	public static function authenticateApi($username, $password) {
		$db = Db::getInstance();
		$req = $db->prepare("SELECT * FROM pelanggan WHERE email = :username AND password = :password");
		$req->execute(array('username' => $username, 'password' => $password));

		if ($arr = $req->fetch()) {
			return new Pelanggan($arr["id_pelanggan"], $arr["nama_lengkap"], $arr["email"], $arr["password"], $arr["no_hp"], $arr["alamat"], $arr["kode_pos"]);
		} else {
			return null;
		}
	}
	
	public static function find($username) {
		$db = Db::getInstance();
		$req = $db->prepare('SELECT * FROM pelanggan WHERE email = :username');
		$req->execute(array('username' => $username));
		$login = $req->fetch();
		
		$data = [];
		$data[0] = $login['id_pelanggan'];
		$data[1] = $login['nama_lengkap'];
		
		return $data;
	}
}
?>