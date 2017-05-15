<?php
include "../connection.php";
include "../models/barang.php";

$list = Barang::getByCategory("Alat Tulis Kantor");
var_dump($list);
?>
