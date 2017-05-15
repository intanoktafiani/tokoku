<?php
$home = $_SERVER["HTTP_HOST"];
$location = "";
if (strpos($home, "localhost") !== false) {
	$location = "/tokoku";
}

$location .= "/api/v1/deskripsi-api-tokoku.json";
header("Location: $location");
?>
