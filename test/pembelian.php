<?php
$username = "23516047@std.stei.itb.ac.id";
$password = "23516047";
$pembelian = array(
	'pesanan' => array(
		array(
			'idBarang' => '25',
			'kuantitas' => '10'
		)
	),
	'alamat' => array(
		'provinsi' => 'JAWA BARAT',
		'kabupaten' => 'KOTA BANDUNG',
		'kecamatan' => 'CIDADAP',
		'detail' => 'Jl. Siliwangi Gandok',
		'kodepos' => '40141'
	),
	'kodeVoucher' => 'sou123456'
);
$request = curl_init();
curl_setopt($request, CURLOPT_URL, "http://tokoku.kilatiron.com/api/v1/pembelian");
curl_setopt($request, CURLOPT_USERPWD, "$username:$password");
curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($pembelian));
$object = curl_exec($request);
curl_close($request);
?>