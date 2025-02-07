<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Tienda Peachepe - Bienvenid@: <i><?= $_SESSION['usuarioSesion']->getNombre() ?></i> </h1>

    <h3 class="error"><?= ($_SESSION['errorSesion']) ?></h3>
    <div class="conjuntoBtn">
    <a class="eliminar" href="../Controller/cerrarSesion.php">Cerrar sesión</a>
    <a href="../Controller/carrito.php">
                    <?php
                    if ($data['cesta'] > 0) {
                        echo "  Productos en carrito " .  $data['cesta'];
                    } else {
                        echo "No hay productos en el carrito";
                    }
                    ?>


                </a>
</div>
    <table>
   
 
        <tr>

            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($data['productos'] as $producto) { ?>
            <tr>

                <td><?= $producto->getNombre() ?></td>
                <td><?= $producto->getPrecio() ?></td>
                <td>
                    <figure>
                        <img src="../View/images/<?= $producto->getImagen() ?>" alt="Imagen de tienda <?= ($producto->getNombre()) ?>">
                    </figure>
                </td>
                <td>
                    <?php
                    if ($producto->getStock() <= 0) {
                        echo "<b>SIN STOCK</b>";
                    } else {
                        echo $producto->getStock();
                    ?>
                       </td>
                <td>
                    <form action="../Controller/anadirCarrito.php" method="post">
                        <input type="hidden" name="id" value="<?= $producto->getCodigo() ?>">
                        <input class="boton anadir" type="submit" value="Añadir al carrito">
                    </form>
                <?php
                    }

                ?>
                    </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>