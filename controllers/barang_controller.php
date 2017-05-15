<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 22 April 2017
// Usage		: Controller

  class BarangController {
    public function index() {
      $barang = Barang::all();
      require_once('views/barang/index.php');
    }
    
    public function search() {
    	$barang = Barang::search();
    	require_once('views/barang/search.php');
    }
    
    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right record
      $barang = Barang::find($_GET['id']);
      if ($barang->idBarang == null) {
      	require_once('views/home/index.php');
      } else {
      	if ($_GET['category'] == 'fisik') {
      		require_once('views/barang/show.php');
      	} else {
      		if (($_GET['category'] == 8) || ($_GET['category'] == 9)) {
      			require_once('views/barang/show_telecommunication.php');
			} else { // token listrik
				require_once('views/barang/show_token.php');				
			}
      	}
      }
    }
  }
?>