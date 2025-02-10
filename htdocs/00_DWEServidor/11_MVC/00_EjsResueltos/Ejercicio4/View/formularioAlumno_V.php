<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
      <link rel="StyleSheet" href="../View/estilos.css" type="text/css">
      <title>
        Escuela de alumnos
      </title>
    </meta>
</head>
<body>
	<div class="contenedor">
	<form action="../Controller/<?=$data['destino']?>" method="POST">
	Matricula: <input type="text" size="10" name="matricula" value="<?=$data['matricula']?>" <?=$data['bloqueado']?>>
	<br><br>Nombre: <input type="text" size="30" name="nombre" value="<?=$data['nombre']?>">
	<br><br>Apellidos: <input type="text" size="50" name="apellidos" value="<?=$data['apellidos']?>">
	<br><br>Curso: <input type="text" size="10" name="curso" value="<?=$data['curso']?>">
	<br><br><input type="submit" value="GRABAR">
</form>
</div>
</body>
</html>