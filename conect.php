<?php

	//error_reporting(0);

	$host = "127.0.0.1";
	$user = "root";
	$clave = "";
	$bd = "PAYA";
	//script para conectar base de datos
		$conex = new PDO("mysql:host=$host;dbname=$bd",$user,$clave)
?>