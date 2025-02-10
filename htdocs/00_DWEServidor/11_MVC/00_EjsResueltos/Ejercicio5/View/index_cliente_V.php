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
<h1>CLIENTE: <?= $_SESSION['usuario'] ?> 
<form action="login.php">
  <input type="submit" name="cerrar" value="Cerrar Sesión">
</form>
</h1>
<table border = "1">
<tr><th colspan=5><br></th>
    <th rowspan="2"><a href="../Controller/VerCesta.php">CESTA: <?=$data['cantidad']?>Prod</a></th>
</tr>
<tr>
    <th>Codigo</th><th>Producto</th><th>Precio</th><th>Imagen</th><th>Stock disponible</th>
</tr>
<?php
foreach ($data['productos'] as $producto) {
    if ($cesta=Cesta::getCestaById($_SESSION['id_usuario'],$producto->getCodigo())) {
      $stockTemp=$producto->getStock()-$cesta->getCantidad();
    }else{
      $stockTemp=$producto->getStock();
    }

    
?>
   <tr>
    <td><?=$producto->getCodigo()?></td>
    <td><?=$producto->getNombre()?></td>
    <td><?=$producto->getPrecio()?></td>
    <td><img style="width:100px" src="../View/imagen/<?=$producto->getImagen()?>"></td>
    <td><?=$stockTemp?></td>
    <td>
<?php  if ($stockTemp>0) {
?>
        <form action="../Controller/MeteCarro.php" method="post">
        <input type="hidden" name="prod" value="<?=$producto->getCodigo()?>">
        <input type="submit" value="Añadir a la cesta">
    </form>
<?php 
}else{
    echo "<h3>SIN STOCK</h3>";
}
 ?>
    </td></tr>
<?php
}
?>
</table>
</div>
  </body>
</html>
