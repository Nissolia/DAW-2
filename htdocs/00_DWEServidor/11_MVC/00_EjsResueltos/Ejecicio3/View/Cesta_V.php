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
    foreach ($data['productos'] as $prod) {
            $producto=$prod[0];
            $cantidad=$prod[1];
            echo'<tr><td>'.$producto->getCodigo().'</td><td><img style="width:100px" src="../View/imagen/'.$producto->getImagen().'"></td><td>'.$cantidad.'</td><td>'.$producto->getPrecio().' euros</td><td>'.$producto->getPrecio()*$cantidad.' euros</td><td>';
            ?>
            <form action="../Controller/QuitaCarro.php" method="get">
                <input type="hidden" name="cod_pro" value="<?= $producto->getCodigo() ?>">
                <input type="submit" value="Eliminar">
            </form>
            </td></tr>
    <?php  
    }
    ?>
    <tr><td colspan="2">Total</td><td><?=$_SESSION['cantidad']?></td><td></td><td> <?=$_SESSION['total']?>euros</td><td></td></tr>
    <tr><td colspan="3"><a href="index.php">Cerrar</a></td><td colspan="3"><a href="../Controller/finalizarCompra.php">Finalizar Compra</a></td></tr>
</table>
</div>
  </body>
</html>