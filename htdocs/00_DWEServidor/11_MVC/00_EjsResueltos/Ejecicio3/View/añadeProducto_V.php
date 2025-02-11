<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
      <link rel="StyleSheet" href="../View/estilos.css" type="text/css">
      <title>
        Tienda de informatica
      </title>
    </meta>
</head>
<body>
<form action="../Controller/añadeProducto.php" method="post">
	<h3>Unidades: </h3><input type="number" name="unidades">
	<input type="hidden" name="prod" value="<?=$_POST['prod']?>">
	<br><br><input type="submit" name="aceptar" value="Aceptar">
</form>
<h2><a href="../Controller/index.php">Cancelar</a></h2>
</body>
</html>