<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<?php
	include ("conect.php");
	//variables
	/*$name = $pin ="";*/

	if (isset($_POST['enviar'])) {
		//si presiono enviar se ejecuta estas intrucciones
		$name = trim($_POST['name']);
		$pin = trim($_POST['pin']);
		//buscar en la db usario y contraseña
	 	$userQuery = $conex->prepare("SELECT * FROM usuarios WHERE nombre = :name");

		$userQuery->execute([
			":name" => $name
		]);

		$user = $userQuery->fetch(PDO::FETCH_OBJ);


		try{
			$db_password = $user->cedula;
		}catch(Exception $e){
			error_reporting(0);
		}

	 	/*if($userQuery->rowCount()){
	 		header("Location: hola.html");
	 	}
	 	else{
	 	 echo"No se encontro el usuario";
	 	}*/
		if(password_verify($pin, $db_password)){
			header("Location: hola.html");

		}
		else{
			echo"No se encontro el usuario";
			
		}
	}

	?>
	<form method="post" autocomplete="off">
		<h2>Login</h2>
		Nombre: <input type="text" name="name" required>
		<br><br>
		Cedula: <input type="text" name="pin" required>
		<br><br>
  		<input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>
