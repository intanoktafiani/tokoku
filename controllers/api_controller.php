<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 22 April 2017
// Usage		: Controller

class ApiController {
    public function getBarangService() {
    	if ($_SESSION['role'] == "ADMIN_ROLE") {
    		$message = [];
    		$barang = Barang::find($_GET['id']);
    		$message["code"] = "0";
    		$message["data"] = $barang;
    		require_once('views/api/index.php');
    	} else {
    		header('Location: http://tokoku-itb.pe.hu');
    	}
    }
    
    public function listBarangService() {
//    	if ($_SESSION['role'] == "ADMIN_ROLE") {
    		$message = [];
    		$barang[] = Barang::all();
//    		$message["code"] = "0";
    		$message["data"] = $barang;
    		require_once('views/api/index.php');
//    	} else {
//    		header('Location: http://tokoku-itb.pe.hu');
//    	}    	
    }
    
    public function listMetodePembayaranService() {
//    	if ($_SESSION['role'] == "ADMIN_ROLE") {    		
    		$message = [];
    		$metodePembayaran = MetodePembayaran::all();
//    		$message["code"] = "0";
    		$message["data"] = $metodePembayaran;
    		require_once('views/api/index.php');
//    	} else {
//    		header('Location: http://tokoku-itb.pe.hu');
//    	}
    }
}
?>