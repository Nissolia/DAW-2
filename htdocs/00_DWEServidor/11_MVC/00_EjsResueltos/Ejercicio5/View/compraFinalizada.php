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
<h1>GRACIAS POR SU COMPRA</h1>
<h3 style="color: red;"> <?= $data['mensaje'] ?></h3>
<h2><a href="../Controller/factura.txt" target="_blank">Ver Factura</a></h2>
<h2><a href="../Controller/index.php">Continuar comprando</a></h2>
</body>
</html>