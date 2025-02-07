<?php
session_start();
// Calcular totales
$totalUnidades = 0;
$totalPrecio = 0;
if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    foreach ($_SESSION['carrito'] as $producto) {
        $totalUnidades += $producto['cantidad'];
        $totalPrecio += $producto['precio'] * $producto['cantidad'];
    }
}

// Eliminar producto individual del carrito
if (isset($_POST['eliminar'])) {
    $codigoEliminar = $_POST['eliminar'];
    if (isset($_SESSION['carrito'][$codigoEliminar])) {
        $_SESSION['carrito'][$codigoEliminar]['cantidad']--;
        if ($_SESSION['carrito'][$codigoEliminar]['cantidad'] == 0) {
            unset($_SESSION['carrito'][$codigoEliminar]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  
    <table>
    <td class="tabla titulo_tabla" colspan="5">  <h2>Productos en la cesta</h2></td>
        <?php
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        ?>
            <tr>
                <th class="tabla subtitulo_tabla">Nombre</th>
                <th class="tabla subtitulo_tabla">Cantidad</th>
                <th class="tabla subtitulo_tabla">Imagen</th>
                <th class="tabla subtitulo_tabla">Precio</th>
                <th class="tabla subtitulo_tabla">Acción</th>
            </tr>
            <?php
            foreach ($_SESSION['carrito'] as $codigo => $producto) {
            ?>
                <tr>
                    <td class="producto_tabla"><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td class="producto_tabla"><?= htmlspecialchars($producto['cantidad']) ?></td>
                    <td class="producto_tabla"><img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" width="50"></td>
                    <td class="producto_tabla"><?= number_format($producto['precio'] * $producto['cantidad'], 2) ?>€</td>
                    <td class="producto_tabla">
                        <form action="cesta.php" method="post">
                            <input type="hidden" name="eliminar" value="<?= htmlspecialchars($codigo) ?>">
                            <input class="boton" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td class="producto_tabla"><strong>Total</strong></td>
                <td class="producto_tabla"><strong><?= $totalUnidades ?></strong></td>
                <td class="producto_tabla" colspan="2"><strong><?= number_format($totalPrecio, 2) ?>€</strong></td>
                <td class="producto_tabla">
                    <form action="vaciarCarro.php" method="post">
                        <input type="hidden" name="vaciar" value="si">
                        <input class="boton" type="submit" value="Vaciar Cesta">
                    </form>
                </td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="5">La cesta está vacía.</td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <form action="paginaPrincipal.php" method="post">
        <input class="boton" type="submit" value="Volver a la tienda">
    </form>
</body>

</html>
