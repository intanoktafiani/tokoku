<?php
include("../connection.php");
include("../models/pembelian.php");

$res = Pembelian::getByIdPelanggan(2);
var_dump($res);
?>