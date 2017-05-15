<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 22 April 2017
// Usage		: Controller

  class HomeController {
    public function index() {
    	setcookie("id", "1", time()+3600, "/","", 0);
    	setcookie("category", "fisik", time()+3600, "/","", 0);
    	setcookie("str", "none", time()+3600, "/","", 0);

    	if (isset($_SESSION['login_user'])) {
    		$_SESSION['itemCount'] = Keranjang::count(); // inisialisasi nilai Badge Keranjang    		
    	} else {
    		$_SESSION['itemCount'] = 0; // belum ada Pelanggan yang Login
    	}
    	
    	require_once('views/home/index.php');
    }
    
    public function filter() {
    	$GLOBALS['id'] = $_GET['id'];
    	$GLOBALS['category'] = $_GET['category'];
    	$GLOBALS['str'] = $_GET['str'];
    	$category = Barang::getCategory($_GET['category']);
    	require_once('views/home/index.php');
    }
    
    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $barang = Barang::find($_GET['id']);
      require_once('views/home/show.php');
    }
  }
?>