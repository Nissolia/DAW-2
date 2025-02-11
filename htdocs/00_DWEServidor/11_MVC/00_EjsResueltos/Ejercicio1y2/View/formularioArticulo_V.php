<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="StyleSheet" href="../View/estilos.css" type="text/css">
	<title></title>
</head>
<body>
	<form action="../Controller/<?=$data['destino']?>" method="POST">
	Codigo: <input type="text" size="5" name="codigo" value="<?=$data['codigo']?>" readonly="readonly">
	<br><br>
	<h3>Título</h3>
	<input type="text" size="50" name="titulo" value="<?=$data['titulo']?>">
	<br><br>Fecha: <input type="text" size="10" name="fecha" value="<?=$data['fecha']?>" readonly="readonly">
	
	<br><h3>Contenido del articulo</h3>
	<textarea name="contenido" rows="10" cols="80"><?=$data['contenido']?></textarea>
	<br><input type="submit" value="GRABAR">
</form>
</body>
</html>