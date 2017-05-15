<?php
  require_once 'connection.php'; // Singleton
  
  if (isset($_GET['controller']) && isset($_GET['action'])) {
  	$controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
  	$controller = 'home';
  	$action     = 'index';
  }
  
  $GLOBALS['id'] = 1;
  $GLOBALS['category'] = "fisik";
  $GLOBALS['str'] = "none";

  include 'views/layout.php';
?>