<?php
	//error_reporting(0) sirve si al tener un error la db no muestre información importante
	error_reporting(0);
	$host = "127.0.0.1";
	$user = "root";
	$clave = "";
	$bd = "aca";
	//script para conectar base de datos
		$conex = new PDO("mysql:host=$host;dbname=$bd",$user,$clave)
?>