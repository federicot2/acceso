<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
<?php
    if (isset($_POST['register'])) {
        header("Location: index.php");
    }
    if (isset($_POST['submit'])) {
        header("Location: login.php");
    }
?>
<form method="post">
        <input type="submit" name="register" value="registrar">
  		<input type="submit" name="submit" value="iniciar sesion">
	</form>
</body>
</html>