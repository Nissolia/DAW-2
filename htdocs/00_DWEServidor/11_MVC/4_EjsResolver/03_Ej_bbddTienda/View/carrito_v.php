<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Carrito de Compra</h1>
    <table>
        <tr>
            <td colspan="4">
                <a class="nuevo" href="../index.php">Volver a índice</a>
            </td>
            <td colspan="4">
                <form method="post" action="../Controller/CestaController.php" style="display: inline;">
                    <button class="boton vaciar" type="submit" name="vaciar">Vaciar Cesta</button>
                </form>
            </td>
        </tr>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Acción</th>
        </tr>
        <?php if (!empty($data['cesta'])): ?>
            <?php foreach ($data['cesta'] as $item): ?>
                <tr>
                    <!-- Acceder al código del producto usando el índice del array o métodos del objeto -->
                    <td><?= ($item['codigo_producto']) ?></td>
                
                    <!-- Acceder a la cantidad usando el índice del array -->
                    <td><?= ($item['cantidad']) ?></td>
                    <td>
                        <form method="post" action="../Controller/CestaController.php" style="display: inline;">
                            <input type="hidden" name="codigo_producto" value="<?= ($item['codigo_producto']) ?>">
                            <input class="boton eliminar" type="submit" name="delete" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">El carrito está vacío.</td>
            </tr>
        <?php endif; ?>
    </table>
    <form method="post" action="../Controller/hacerFactura.php">
        <input class="boton comprar" type="submit" name="Comprar" value="Comprar">
    </form>
</body>

</html>
