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
<h1>estas seguro de que quieres borrar el producto </h1>
<form action="../Controller/borraProducto.php" method="post">
    <input type="hidden" name="prod" value="<?=$_POST["prod"] ?>">
    <input type="submit" value="si" name="confirmar" style="width:50px">
</form>
<form action="../Controller/index.php" method="post">
    <input type="submit" value="no" style="width:50px">
</form>
</body>
</html>