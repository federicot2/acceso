<?php
	session_start();
	include ("conect.php");
	//paso 4
	//defino las variables
	//agregue cedula
	$nombre = $apellido = $cedula =$direccion = $fecha = $genero ="";

	if (isset($_POST['submit'])) {
		//si presiono enviar se ejecuta estas intrucciones
		$nombre = trim($_POST['nombre']);
		$apellido = trim($_POST['apellido']);
		$cedula = trim($_POST['cedula']);//nuevo
		$direccion = trim($_POST['direccion']);
		$fecha = $_POST['fecha'];
		$genero = $_POST['genero'];

		//insetar los datos a la base de datos
		/*$consulta = "INSERT INTO usuarios(nombre,apellido,cedula,direccion,fecha,genero) VALUES ('$nombre','$apellido','$cedula','$direccion','$fecha','$genero')";
		$query = mysqli_query($conex, $consulta);
		if ($query) {
			echo"datos guardados correctamente!";
		}
		else{
			echo"incorrecto";
		}*/
		$insertQuery = $conex->prepare("INSERT INTO usuarios(nombre,apellido,cedula,direccion,fecha,genero) VALUES (:nombre,:apellido,:cedula,:direccion,:fecha,:genero)");

		$insertQuery->execute(
			array(
				'nombre'=>$nombre,
				'apellido'=>$apellido,
				'direccion'=>$direccion,
				'fecha'=>$fecha,
				'genero'=>$genero,
				'cedula'=>password_hash($cedula,PASSWORD_BCRYPT,[20])
			)
		);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario</title>
</head>
<body>
	<?php
		//Primer hola mundo en php, paso 3 del reto
		echo "Hola Mundo";
		echo "<br><br>";
	?>

	
	<form method="post">
		<h2>Formulario</h2>
		Nombre: <input type="text" name="nombre" required>
		<br><br>
		apellido: <input type="text" name="apellido" required>
		<br><br>
		cedula: <input type="text" name="cedula" required>
		<br><br>
		Direccion:<input type="text" name="direccion" required>
		<br><br>
		Fecha de nacimiento:<input type="date" name="fecha" required>
		<br><br>
		Genero:	<input type="radio" name="genero" value="Mujer" required>Mujer
  				<input type="radio" name="genero" value="Hombre">Hombre
  		<br><br>
  		<input type="submit" name="submit" value="Enviar"> 
	</form>
	<?php
	//impresion de los datos que guardamos
		echo "<h2>Datos Guardados:</h2>";
		echo $nombre;
		echo "<br>";
		echo $apellido;
		echo "<br>";
		echo $cedula;
		echo "<br>";
		echo $direccion;
		echo "<br>";
		echo $fecha;
		echo "<br>";
		echo $genero;
	?>
</body>
</html>