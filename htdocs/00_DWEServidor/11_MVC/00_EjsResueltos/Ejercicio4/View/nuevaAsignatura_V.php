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
	<form action="../Controller/<?=$destino?>" method="POST">
	Codigo: <input type="text" size="10" name="codigo" value="Autonumerico" readonly="readonly">
	<br><br>Nombre: <input type="text" size="30" name="nombre" value="<?=$nombre?>">
	<br><br><input type="submit" value="GRABAR">
</form>
</div>
</body>
</html>