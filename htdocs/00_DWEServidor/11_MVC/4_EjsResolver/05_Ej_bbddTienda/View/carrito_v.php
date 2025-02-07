<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>
<body>
    <h1>Carrito de Compra</h1>
    <div class="conjuntoBtn">
        <a class="nuevo" href="../index.php">Volver a índice</a>
        <form method="post" action="../Controller/vaciarCesta.php" style="display: inline;">
                    <input class="boton vaciar" type="submit" value="Vaciar cesta">
                </form>
    </div>
    <table>
       
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Acción</th>
        </tr>
        <?php if (!empty($_SESSION['carrito'])) { ?>
            <?php foreach ($_SESSION['carrito'] as $id => $producto) { ?>
                <tr>
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td><?= $producto['cantidad'] ?></td>
                    <td><?= $producto['precio'] ?> €</td>
                    <td><?= $producto['cantidad'] * $producto['precio'] ?> €</td>
                 <?php 
                $data['totalImporte'] += $producto['cantidad'] * $producto['precio'];
                 ?>
                    <td>
                        <form method="post" action="../Controller/eliminarCesta.php" >
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input class="boton eliminar" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
                
            <?php } ?>
            <tr>
                <td colspan="3">Importe total:</td>
                <td  colspan="2"><b><?= $data['totalImporte']  ?> €</b> </td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="5">El carrito está vacío.</td>
            </tr>
        <?php } ?>
    </table>
  
  <form action="../Controller/hacerFactura.php" method="post">
    <input type="hidden" name="idUser" value="  <?= $_SESSION['usuarioSesion']->getId() ?>">
    <input class="boton anadir" type="submit" value="Hacer factura">
  </form>
</body>
</html>
