<?php
// Inicio de sesión
session_start();

// Conexión a la base de datos
include_once 'libreria.php'; // Asegúrate de tener una función que configure la conexión PDO
$conexion = pedirConexion("tienda"); // Esta función debería retornar una conexión PDO

// Verificar si el parámetro 'codigo' existe en la URL
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Realizar la consulta directamente usando query
    $consulta = $conexion->query("SELECT * FROM productos WHERE id = $codigo");

    // Obtener el producto
    $producto = $consulta->fetchObject();

    // Si el producto no existe
    if (!$producto) {
        echo "<h2>Producto no encontrado.</h2>";
        header("Location: paginaPrincipal.php");
        exit;
    }
} else {
    echo "<h2>Producto no encontrado.</h2>";
    header("Location: paginaPrincipal.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
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
            <td class="producto_tabla"><?= htmlspecialchars($producto->nombre) ?></td>
            <td class="producto_tabla"><?= $producto->precio ?>€</td>
            <td class="producto_tabla">
                <!-- Enlace para redirigir a la página de detalles -->
                <a href="detalle.php?codigo=<?= $producto->id ?>">
                    <img style="width: 250px;" src="<?= htmlspecialchars($producto->imagen) ?>" alt="<?= htmlspecialchars($producto->nombre) ?>">
                </a>
            </td>
        </tr>
        <tr>
            <td class="producto_tabla" colspan="3"><?= htmlspecialchars($producto->descripcion) ?></td>
        </tr>
        <tr>
            <td class="producto_tabla">
                <form action="paginaPrincipal.php" method="post">
                    <input class="boton" type="submit" value="Volver a la tienda">
                </form>
            </td>
            <td class="producto_tabla" colspan="2">
                <form action="paginaPrincipal.php" method="post">
                    <input type="hidden" name="codigo" value="<?= $producto->id ?>">
                    <input type="number" name="cantidad" value="1" min="1" required>
                    <input class="boton" type="submit" name="comprar" value="Añadir al carrito">
                </form>
            </td>
        </tr>
    </table>

</body>

</html>
