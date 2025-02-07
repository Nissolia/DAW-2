<?php
session_start();
include_once 'libreria.php';

// Crear conexión a la BD y guardar la conexión en la variable $conexion
$conexion = pedirConexion("tienda");

// Leer los productos del carrito desde el archivo 'carrito.txt'
$carrito = file_get_contents('carrito.txt');
$productosEnCarrito = explode("\n", trim($carrito));

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
// Inicializar el total de la cesta
$totalCesta = 0;

// Crear un array para contar las cantidades de cada producto
$productosContados = [];

echo "<h1>Tu Carrito</h1>";
echo "<table>
        <tr>
            <th class='titulo_tabla tabla'>Descripción</th>
            <th class='titulo_tabla tabla'>Precio</th>
            <th class='titulo_tabla tabla'>Cantidad</th>
            <th class='titulo_tabla tabla'>Imagen</th>
            <th class='titulo_tabla tabla'>Total Producto</th>
        </tr>";

// Recorrer los productos del carrito
foreach ($productosEnCarrito as $productoId) {
    if (!empty($productoId)) {
        // Consultar el producto por ID usando query
        $consulta = $conexion->query("SELECT * FROM productos WHERE id = $productoId");

        // Verificar si se obtuvo un producto
        $producto = $consulta->fetchObject();

        // Si el producto existe, agregarlo al carrito
        if ($producto) {
            // Contar cuántas veces aparece este producto en el carrito
            if (isset($productosContados[$productoId])) {
                $productosContados[$productoId]++;
            } else {
                $productosContados[$productoId] = 1;
            }
        }
    }
}

// Mostrar los productos con su cantidad
foreach ($productosContados as $productoId => $cantidad) {
    // Consultar el producto por ID nuevamente usando query
    $consulta = $conexion->query("SELECT * FROM productos WHERE id = $productoId");
    $producto = $consulta->fetchObject();

    // Mostrar la fila del producto
    if ($producto) {
        // Calcular el total por producto
        $totalProducto = $producto->precio * $cantidad;
        $totalCesta += $totalProducto; // Acumular el total de la cesta

        echo "<tr>
                <td class='producto_tabla'>" . ($producto->descripcion) . "</td>
                <td class='producto_tabla'>" . ($producto->precio) . "€</td>
                <td class='producto_tabla'>" . $cantidad . "</td>
                <td class='producto_tabla'><img style='width: 100px;' src='" . htmlspecialchars($producto->imagen) . "' alt='" . htmlspecialchars($producto->descripcion) . "'></td>
                <td class='producto_tabla'>" . $totalProducto . "€</td>
            </tr>";
}}

// Cerrar la tabla HTML
echo "</table>";

// Mostrar el total de la cesta
echo "<h3>Total de la cesta: " . $totalCesta . "€</h3>";

?>
<form action="vaciarCarro.php" method="post">
          <input type="hidden" name="vaciar" value="true">
          <input class="boton" type="submit" value="Vaciar carrito">
      </form>
<a href="paginaPrincipal.php">Página principal</a>

</body>
</html>
