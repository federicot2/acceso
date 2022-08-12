
<?php
	session_start();
	ini_set ('error_reporting', E_ALL);
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

		$db_password = $user->cedula;


	 	/*if($userQuery->rowCount()){
	 		header("Location: hola.html");
	 	}
	 	else{
	 	 echo"No se encontro el usuario";
	 	}*/
		if(password_verify($pin, $db_password)){
			header("Location: hola.php");

		}
		else{
			echo"No se encontro el usuario";
			
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<form method="post" autocomplete="off">
		<h2>Login</h2>
		User: <input type="text" name="name" required>
		<br><br>
		password: <input type="password" name="pin" required>
		<br><br>
  		<input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>
