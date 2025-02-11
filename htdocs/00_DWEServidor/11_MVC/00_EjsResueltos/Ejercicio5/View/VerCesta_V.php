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
<table border = "1"><tr><th colspan="6"><h3>PRODUCTOS EN TU CESTA</h3></th></tr>
<tr><td>Codigo</td><td>Producto</td><td>Cantidad</td><td>Precio</td><td>Importe</td></tr>
<?php 
    foreach ($data['productos'] as $producto) {
            echo'<tr><td>'.$producto['codigo'].'</td><td><img style="width:100px" src="../View/imagen/'.$producto['imagen'].'"></td>
                <td>'.$producto['cantidad'].'</td>
                <td>'.$producto['precio'].' euros</td>
                <td>'.$producto['precio']*$producto['cantidad'].' euros</td><td>';
            ?>
            <form action="../Controller/QuitaCarro.php" method="post">
                <input type="hidden" name="prod" value="<?= $producto['codigo'] ?>">
                <input type="submit" value="Eliminar">
            </form>
            </td></tr>
    <?php  
    }
    ?>
    <tr><td colspan="2">Total</td><td><?= Cesta::getCantidadByCliente($_SESSION['id_usuario']) ?></td>
    <td></td>
    <td> <?= Cesta::getTotalByCliente($_SESSION['id_usuario']) ?>euros</td><td></td></tr>
    <tr><td colspan="3"><a href="index.php">Cerrar</a></td><td colspan="3"><a href="comprar.php">Finalizar Compra</a></td></tr>
</table>
</div>
  </body>
</html>