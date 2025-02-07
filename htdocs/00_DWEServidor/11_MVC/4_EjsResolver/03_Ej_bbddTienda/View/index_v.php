<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Tienda Peachepe</h1>
    <table>
        <tr>
            <td colspan="4">
                <a class="nuevo" href="../Controller/anadirProducto.php">Añadir producto</a>
            </td>
            <td colspan="4">
                <a href="../Controller/carrito.php">
                    <?php
                    if ($data['cesta'] > 0) {
                        echo "  Productos en carrito " .  $data['cesta'];
                    } else {
                        echo "No hay productos en el carrito";
                    }
                    ?>


                </a>
            </td>
        </tr>
        <tr>
            <th colspan="2">Acciones stock</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($data['productos'] as $producto){ ?>
            <tr>
                <td>
                    <a class="boton añadir" href="../Controller/reponerStock.php?id=<?= $producto->getId() ?>">Añadir</a>
                </td>
                <td>
                    <a class="boton retirar" href="../Controller/retirarStock.php?id=<?= $producto->getId() ?>">Retirar</a>
                </td>
                <td><?= $producto->getId() ?></td>
                <td><?= $producto->getNombre() ?></td>
                <td><?= $producto->getPrecio() ?></td>
                <td>
                    <figure>
                        <img src="../View/images/<?= $producto->getImagen() ?>" alt="Imagen de tienda">
                    </figure>
                </td>
                <td><?= $producto->getStock() ?></td>
                <td>
                    <a href="../Controller/anadirCarrito.php?id=<?= $producto->getId() ?>">Añadir al carrito</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>