<?php
$username = "23516047@std.stei.itb.ac.id";
$password = "23516047";

$request = curl_init();
curl_setopt($request, CURLOPT_URL, "http://localhost/tokoku/api/v1/pembelian");
curl_setopt($request, CURLOPT_USERPWD, "$username:$password");

$object = curl_exec($request);
curl_close($request);
?>
