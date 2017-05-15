<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {    	
      if (!isset(self::$instance)) {
//      	$host = "mysql.idhostinger.com";
//      	$database = "u824263145_toko";
//      	$username = "u824263145_user";
//      	$password = "1234567890";
      	
      	$host = "localhost";
      	$database = "tokoku";
      	$username = "root";
      	$password = "";
      	

      	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO("mysql:host=" . $host . ";dbname=" . $database, $username, $password, $pdo_options);
      }
      return self::$instance;
    }

  }
?>