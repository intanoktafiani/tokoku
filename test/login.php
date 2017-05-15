<?php
include "../connection.php";
include "../models/pelanggan.php";
include "../models/login.php";

$username = "23516047@std.stei.itb.ac.id";
$password = "23516047";

$pelanggan = Login::authenticate($username, $password);

var_dump($pelanggan);
?>
