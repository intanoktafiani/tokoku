<?php
require_once 'ConcreteAPI.class.php';
require_once '../../connection.php';
require_once '../../utility.php';
require_once '../../models/barang.php';
require_once '../../models/pelanggan.php';
require_once '../../models/login.php';
require_once '../../models/pembelian.php';
require_once '../../models/keranjang.php';
require_once '../../models/voucher.php';
require_once '../../models/rekening.php';
require_once '../../models/adapter.php';
require_once '../../models/wilayah.php';
require_once '../../models/transaksi.php';

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    $API = new ConcreteAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
?>
