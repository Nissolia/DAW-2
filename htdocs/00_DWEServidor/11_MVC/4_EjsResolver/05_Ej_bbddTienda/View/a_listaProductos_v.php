<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Tienda Peachepe - Bienvenid@ administrad@r: <i> <?= $_SESSION['usuarioSesion']->getNombre() ?></i></h1>
    <?php if (isset($_SESSION['error'])){ ?>
            <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php } ?>
        <div class="conjuntoBtn">
            <a class="eliminar" href="../Controller/cerrarSesion.php">Cerrar sesión</a>
           <a class="nuevo" href="../Controller/anadirProducto.php">Añadir producto</a>

        </div>
    <table>
       
        <tr>
            <td colspan="8">
            </td>

        </tr>
        <tr>
            <th>Acciones<br>stock</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th>Acciones<br>productos</th>
        </tr>
        <?php foreach ($data['productos'] as $producto) { ?>
            <tr>
                <td>
                    <form action="../Controller/reponerStock.php" method="post">
                        <input type="hidden" name="id" value="<?= $producto->getCodigo() ?>">
                        <input class="boton anadir" type="submit" value="Reponer">
                    </form>

              
                    <form action="../Controller/retirarStock.php" method="post">
                        <input type="hidden" name="id" value="<?= $producto->getCodigo() ?>">
                        <input class="boton eliminar" type="submit" value="Retirar">
                    </form>
                </td>
                <td><?= $producto->getCodigo() ?></td>
                <td><?= $producto->getNombre() ?></td>
                <td><?= $producto->getPrecio() ?></td>
                <td>
                    <figure>
                        <img src="../View/images/<?= $producto->getImagen() ?>" alt="Imagen de tienda">
                    </figure>
                </td>
                <td><?= $producto->getStock() ?></td>
                <td>
                    <form action="../Controller/modificarProducto.php" method="post">
                        <input type="hidden" name="id" value="<?= $producto->getCodigo() ?>">
                        <input class="boton modificar" type="submit" value="Modificar">
                    </form>
             
                    <form action="../Controller/borrarProducto.php" method="post">
                        <input type="hidden" name="id" value="<?= $producto->getCodigo() ?>">
                        <input class="boton eliminar" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>