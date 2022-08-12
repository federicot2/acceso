<?php
	session_start();
	if (isset($_POST['enviar'])) {
		header("Location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido</title>
</head>
<body>
	<h1>Bienvenido</h1>
	<form method="post" autocomplete="off">
  		<input type="submit" name="enviar" value="cerrar sesion">
	</form>

</body>
</html>