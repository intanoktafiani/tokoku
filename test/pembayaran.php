<?php
$username = "23516047@std.stei.itb.ac.id";
$password = "23516047";

$pembayaran = array(
	'idTransaksi' => '09c6cda2ed6e69aee8ea8ac36b09cf5bc90bc584',
	'metodePembayaran' => 'TRANSFER',
	'bank' => 'BRI'
);

$request = curl_init();
curl_setopt($request, CURLOPT_URL, "http://localhost/tokoku/api/v1/pembayaran");
curl_setopt($request, CURLOPT_USERPWD, "$username:$password");
curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($pembayaran));

$object = curl_exec($request);
curl_close($request);
?>
