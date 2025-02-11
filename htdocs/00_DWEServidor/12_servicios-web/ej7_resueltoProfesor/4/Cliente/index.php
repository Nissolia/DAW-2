<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilos.css" type="text/css"> 
	<title>Document</title>
</head>
<body>
	<h1>Consulta de la API productos</h1>
	<div class="contenedor">

			<form action="peticion.php" method="post">
				<h2>Alumnos de un grupo</h2>
				Grupo <input type="text" name="grupo">
				<input type="submit" name="filtraGrupo" value="Consultar">
			</form><hr>
			<form action="peticion.php" method="post">
				<h2>Buscar un alumno</h2>
				Nombre del Alumno <input type="text" name="nombre">
				<input type="submit" name="filtraAlumno" value="Consultar">
			</form><hr>
			<form action="peticion.php" method="post">
				<h2>Asignaturas de un alumno</h2> 
				Matrícula del alumno <input type="text" name="matricula">
				<input type="submit" name="filtraAsignatura" value="Consultar">
			</form><hr>
			<form action="peticion.php" method="post">
				<h2>Matricular un alumno en una asignatura</h2> 
				Matricula del Alumno <input type="text" name="matricula" required>
				Código de la Asignatura <input type="text" name="codigo" required>
				<input type="submit" name="matricular" value="Matricular">
			</form><hr>
			<form action="peticion.php" method="POST">
				<h2>Borrar un alumno:</h2> 
				Matricula del Alumno <input type="text" name="matricula" required>
				<input type="submit" name="borrar" value="Borrar">
			</form><hr>
			<form action="peticion.php" method="POST">
				<h2>Cambio de grupo de un alumno:</h2> 
				Matricula del Alumno <input type="text" name="matricula" required>
				Nuevo grupo <input type="text" name="grupo" require>
				<input type="submit" name="cambiaGrupo" value="Actualizar">
			</form><hr>
	</div>
	</body>
</html>