<?php
// Inicio de sesión
session_start();
if (isset($_GET['codigo']) && isset($_SESSION['catalogo'][$_GET['codigo']])) {
    $codigo = $_GET['codigo'];
    $producto = $_SESSION['catalogo'][$codigo];
} else {
    echo "<h2>Producto no encontrado.</h2>";
    header("Location: paginaPrincipal.php");
    exit;
}
// Inicializar carrito si no existe


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <tr>
            <td class="tabla subtitulo_tabla cesta" colspan="3">Detalles del Producto</td>
        </tr>
        <tr>
            <td class="producto_tabla">Nombre</td>
            <td class="producto_tabla">Precio</td>
            <td class="producto_tabla">Imagen</td>
        </tr>
        <tr>
            <td class="producto_tabla"><?= $producto['nombre'] ?></td>
            <td class="producto_tabla"><?= $producto['precio'] ?>€</td>
            <td class="producto_tabla"><img style="width: 250px;" src="<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>"></td>

        </tr>
        <tr>
            <td class="producto_tabla" colspan="3"><?= $producto['detalle'] ?></td>
        </tr>
        <tr>
            <td class="producto_tabla" >
                <form action="paginaPrincipal.php" method="post">
                    <input class="boton" type="submit" value="Volver a la tienda">
                </form>
            </td>
            <td class="producto_tabla" colspan="2">
            <form action='paginaPrincipal.php' method='post'>
                <input type='hidden' name='codigo' value='<?=  $codigo ?>'>
                <input type='number' name='cantidad' value='1' min='1' required>
                <input class='boton' type='submit' name='comprar' value='Añadir al carrito'>
            </form>
            </td>
        </tr>
    </table>

</body>

</html>