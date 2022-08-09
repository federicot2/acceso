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

	<?php
	include ("conect.php");
	//paso 4
	//defino las variables
	//agregue cedula
	$nombre = $apellido = $cedula =$direccion = $fecha = $genero ="";

	if (isset($_POST['submit'])) {
			if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['cedula']) >= 1 && strlen($_POST['direccion']) >= 1 && strlen($_POST['fecha']) >= 1 && strlen($_POST['genero']) >= 1) {

			//si presiono enviar se ejecuta estas intrucciones
			$nombre = trim($_POST['nombre']);
			$apellido = trim($_POST['apellido']);
			$cedula = trim($_POST['cedula']);//nuevo
			$direccion = trim($_POST['direccion']);
			$fecha = $_POST['fecha'];
			$genero = $_POST['genero'];

			//insetar los datos a la base de datos
			$consulta = "INSERT INTO usuarios(nombre,apellido,cedula,direccion,fecha,genero) VALUES ('$nombre','$apellido','$cedula','$direccion','$fecha','$genero')";
			$query = mysqli_query($conex, $consulta);
			if ($query) {
				echo"datos guardados correctamente!";
			}
			else{
				echo"incorrecto";
			}
		}
	}

	?>
	<form method="post">
		<h2>Formulario</h2>
		Nombre: <input type="text" name="nombre">
		<br><br>
		apellido: <input type="text" name="apellido">
		<br><br>
		cedula: <input type="text" name="cedula">
		<br><br>
		Direccion:<input type="text" name="direccion">
		<br><br>
		Fecha de nacimiento:<input type="date" name="fecha">
		<br><br>
		Genero:	<input type="radio" name="genero" value="Mujer">Mujer
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
	<table border="1">
		<h2>Tabla de Datos:</h2>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Cedula</td>
			<td>Direccion</td>
			<td>Fecha</td>
			<td>Genero</td>
		</tr>
		<?php
			$sql="SELECT * from usuarios";
			$result=mysqli_query($conex,$sql);
			while ($mostrar=mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $mostrar['ID']?></td>
			<td><?php echo $mostrar['nombre']?></td>
			<td><?php echo $mostrar['apellido']?></td>
			<td><?php echo $mostrar['cedula']?></td>
			<td><?php echo $mostrar['direccion']?></td>
			<td><?php echo $mostrar['fecha']?></td>
			<td><?php echo $mostrar['genero']?></td>
		</tr>
		<?php
	}
	?>
	</table>

</body>
</html>