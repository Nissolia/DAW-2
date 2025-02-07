<?php
session_start();
include_once 'libreria.php';

// Crear conexión a la BD y guardar la conexión en la variable $conexion
$conexion = pedirConexion("tienda");  // Asegúrate de que la conexión devuelva la conexión PDO

// Leer el archivo carrito.txt y contar los productos
$carrito = file_get_contents('carrito.txt');

// Verificar si el carrito está vacío
if (empty($carrito)) {
    $articulosEnCarrito = 0; // Si el archivo está vacío, asignamos 0
} else {
    // Contar los productos en el carrito
    $articulosEnCarrito = count(explode("\n", trim($carrito)));
}
// Mostrar la página principal
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Bienvenido a nuestra tienda</h1>
<form action="adminProductos.php" method="post">
  <input class="boton" type="submit" value="Administrar productos">
</form>
    <!-- Mostrar cantidad de productos en el carrito -->
    <p><a href="verCarrito.php">Tienes <?= $articulosEnCarrito ?> artículos en tu carrito</a></p>

    <?php 
    // Consultar todos los productos de la tabla 'productos'
    $consulta = $conexion->query("SELECT * FROM productos");

    // Mostrar la tabla HTML
    echo "<table>
            <tr>
                <th class='titulo_tabla tabla'>Descripción</th>
                <th class='titulo_tabla tabla'>Precio</th>
                <th class='titulo_tabla tabla'>Imagen</th>
                <th class='titulo_tabla tabla'>Acción</th>
            </tr>";

    // Recorrer cada fila de la consulta y mostrar los productos
    while ($producto = $consulta->fetchObject()) {
        echo "<tr>
        <td class='producto_tabla'>" . $producto->descripcion . "</td>
        <td class='producto_tabla'>" . $producto->precio . "€</td>
        <td class='producto_tabla'>
            <a href='detalle.php?codigo=" . $producto->id . "'>
                <img style='width: 100px;' src='" . $producto->imagen . "' alt='" . $producto->nombre . "'>
            </a>
        </td>
        <td class='producto_tabla'>
            <form action='agregarCarrito.php' method='post'>
                <input type='hidden' name='codigo' value='" . $producto->id . "'>
                <input class='boton' type='submit' value='Añadir carrito'>
            </form>
        </td>
    </tr>";

    }

    // Cerrar la tabla HTML
    echo "</table>";


    // Cerrar la conexión a la base de datos
    $conexion = null;
    ?>
   
</body>

</html>
