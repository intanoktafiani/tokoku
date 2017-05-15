<?php
function dateToString($date) {
	if ($date) {
		return $date->format("Y-m-d H:i:s");
	} else {
		return NULL;
	}
}

function isLoggedIn() {
	if (!isset($_SESSION["login_user"])) {
		throw new Exception("403");
	}
}

function getHomeAddress() {
	$home = $_SERVER["HTTP_HOST"];
	$location = "";
	if (strpos($home, "localhost") !== false) {
		$location = "/tokoku";
	}
	
	return $location;
}
?>
