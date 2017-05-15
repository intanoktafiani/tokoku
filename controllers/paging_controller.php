<?php
// Created by	: Intan Oktafiani 23516026
// Date	Created	: 5 Mei 2017
// Usage		: Controller

class PagingController {
	public function filter() {
		if (!isset($_GET['id']))
			return call('pages', 'error');
		
		$data = Barang::filter($_GET['id'], $_GET['category'], $_GET['str']);
//		$data = Barang::filter($_GET['id'], $_GET['category'], $_GET['str']);
		
		
		require_once('views/pagination/index.php');
	}
}
?>