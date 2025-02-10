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
    <div class="contenedor">
<h1>ADMINISTRADOR: <?= $_SESSION['usuario'] ?> 
<form action="login.php">
  <input type="submit" name="cerrar" value="Cerrar Sesión">
</form>
</h1>
<table border = "1">
<tr><th colspan=7><br><form action="../Controller/nuevoProducto.php" method="post"><input type="submit" value="Nuevo Producto" name="administrar"></form></th>
</tr>
<tr>
    <th>Baja</th><th>Añadir Uds</th><th>Codigo</th><th>Producto</th><th>Precio</th><th>Imagen</th><th>Stock</th>
</tr>
<?php
foreach ($data['productos'] as $producto) {

?>
   <tr><td><form action="../Controller/borraProducto.php" method="post">
        <input type="hidden" name="prod" value="<?=$producto->getCodigo()?>">
        <input type="submit" value="Eliminar">
    </form></td>
    <td><form action="../Controller/añadeProducto.php" method="post">
        <input type="hidden" name="prod" value="<?=$producto->getCodigo()?>">
        <input type="submit" value="Añadir">
    </form></td>
    <td><?=$producto->getCodigo()?></td><td><?=$producto->getNombre()?></td><td><?=$producto->getPrecio()?></td><td><img style="width:100px" src="../View/imagen/<?=$producto->getImagen()?>"></td><td><?=$producto->getStock()?></td>
    </tr>
<?php
}
?>
</table>
</div>
  </body>
</html>
