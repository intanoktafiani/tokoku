<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 4 Mei 2017
// Usage		: Model

class Pelanggan {
	public $idPelanggan;
	public $namaLengkap;
	public $email;
	public $password;
	public $noHP;
	public $alamat;
	public $kodePos;
	
	public function __construct($idPelanggan, $namaLengkap, $email, $password, $noHP, $alamat, $kodePos) {
		$this->idPelanggan = $idPelanggan;
		$this->namaLengkap = $namaLengkap;
		$this->email = $email;
		$this->password = $password;
		$this->noHP = $noHP;
		$this->alamat = $alamat;
		$this->kodePos = $kodePos;
	}
	
	public static function all() {
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM pelanggan');
		
		$list = [];
		foreach($req->fetchAll() as $pelanggan) {
			$list[] = new Pelanggan($pelanggan['id_pelanggan'], $pelanggan['nama_lengkap'], $pelanggan['email'], $pelanggan['password'], $pelanggan['no_hp'], $pelanggan['alamat'], $pelanggan['kode_pos']);
		}
		
		return $list;
	}
	
	public static function lists($start) {
		$db = Db::getInstance();
		
		if ($start > 1) {
			$limit = 8;
			$start = intval($start);
			$start = ($start - 1) * $limit;
			$sql = 'SELECT * FROM pelanggan LIMIT '.$start.', 8'; // Cara Kedua
			$req = $db->query($sql);
		} else {
			$sql = 'SELECT * FROM pelanggan LIMIT 10';
		}
		
		$req = $db->query($sql); // Cara Pertama
		
		$list = [];
		foreach($req->fetchAll() as $pelanggan) {
			$list[] = new Pelanggan($pelanggan['id_pelanggan'], $pelanggan['nama_lengkap'], $pelanggan['email'], $pelanggan['password'], $pelanggan['no_hp'], $pelanggan['alamat'], $pelanggan['kode_pos']);
		}
		
		return $list;
	}
	
	public static function find($id) {
		$db = Db::getInstance();
		$id = intval($id);
		$req = $db->prepare('SELECT * FROM pelanggan WHERE id_pelanggan = :id');
		$req->execute(array('id' => $id));
		$pelanggan= $req->fetch();
		
		return new Pelanggan($pelanggan['id_pelanggan'], $pelanggan['nama_lengkap'], $pelanggan['email'], $pelanggan['password'], $pelanggan['no_hp'], $pelanggan['alamat'], $pelanggan['kode_pos']);
	}
	
	
	public static function findByName($name) {
		$db = Db::getInstance();
		$req = $db->prepare("SELECT * FROM pelanggan WHERE nama_lengkap = ?");
		$req->execute(array($name));
		$pelanggan= $req->fetch(PDO::FETCH_ASSOC);
		
		return new Pelanggan($pelanggan['id_pelanggan'], $pelanggan['nama_lengkap'], $pelanggan['email'], $pelanggan['password'], $pelanggan['no_hp'], $pelanggan['alamat'], $pelanggan['kode_pos']);
	}
}
?>