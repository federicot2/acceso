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
	$name = $pin ="";

	if (isset($_POST['enviar'])) {
		//si presiono enviar se ejecuta estas intrucciones
		$name = trim($_POST['name']);
		$pin = trim($_POST['pin']);

		//validar
		mysqli_select_db($conex, $bd) or die ("Error al conectar a la base de Datos");
	 	$result = mysqli_query($conex, "SELECT * FROM usuarios WHERE nombre = '$name' AND Cedula = '$pin'");

	 	if(mysqli_fetch_array($result)){
	 		header("Location: hola.html");
	 	}
	 	else{
	 	 echo"No se encontro el usuario";
	 	}
	}

	?>
	<form method="post">
		<h2>Login</h2>
		Nombre: <input type="text" name="name" required>
		<br><br>
		Cedula: <input type="text" name="pin" required>
		<br><br>
  		<input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>
