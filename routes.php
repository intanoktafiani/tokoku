<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');
    require_once('models/adapter.php');
   require_once('utility.php');

    switch($controller) {
	  case 'home':
	  	require_once('models/barang.php');
	  	require_once('models/keranjang.php');
	  	require_once('models/transaksi.php');
	  	$controller = new HomeController();
	  break;
      case 'pages':
        $controller = new PagesController();
      break;
      case 'paging':
      	require_once('models/barang.php');
      	$controller = new PagingController();
      break;
      case 'api':
      	require_once('models/barang.php');
      	require_once('models/metodepembayaran.php');
      	$controller = new ApiController();
      break;
      case 'barang':
        require_once('models/barang.php');
        $controller = new BarangController();
      break;
      case 'keranjang':
      	require_once('models/barang.php');
      	require_once('models/keranjang.php');
      	require_once('models/pelanggan.php');
      	require_once('models/transaksi.php');
      	$controller = new KeranjangController();
      break;      	
      case 'pengembalian':
      	require_once('models/pengembalian.php');
      	require_once('models/transaksi.php');
      	require_once('models/pembelian.php');
      	$controller = new PengembalianController();
      break;
      case 'pembelian':
      	require_once('models/barang.php');
      	require_once('models/keranjang.php');
      	require_once('models/pembelian.php');
      	require_once('models/rekening.php');
      	require_once('models/transaksi.php');
      	require_once('models/voucher.php');
      	require_once('models/wilayah.php');
      	$controller = new PembelianController();
      break;
      case 'laporan':
      	require_once('models/laporan.php');
      	$controller = new LaporanController();
      break;
      case 'login':
      	require_once('models/login.php');
      	require_once('models/laporan.php');
      	$controller = new LoginController();
      break;
    }

    session_start(); // dipindah di sini untuk menghindari masalah class-loading.
    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['index', 'error'],
  					   'barang' => ['index', 'show','search'],
  					   'keranjang' => ['index', 'add','remove','clean'],
  					   'pengembalian' => ['index', 'show', 'response', 'konfirmasi', 'kembalikan', 'detail', 'terima', 'tolak', 'history'],
  					   'pembelian' => ['index', 'konfirmasiPesanan', 'konfirmasiPembayaran', 'konfirmasiPembayaranDigital', 'pesan', 'bayar', 'terima'],
			   		   'paging' => ['filter'],
  					   'api' => ['getBarangService', 'listBarangService', 'listMetodePembayaranService'],  		
  					   'laporan' => ['index', 'laporanPenjualanAdvance'],
  					   'login' => ['index', 'authenticate', 'terminate'],  		
  					   'home' => ['index', 'filter', 'show']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>