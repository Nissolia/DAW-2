<?php
include_once 'libreria.php';
// Inicio de sesión
session_start();

// Conexión con la base de datos
$tabla = "almacen";
$bd = "gestimal";
$conexion = pedirConexion($tabla, $bd);

// Paginación de productos (almacen)
if (!isset($_SESSION['paginaActualProductos'])) {
    $_SESSION['paginaActualProductos'] = 1;
}

// Obtener el número total de productos y calcular páginas totales
if (!isset($_SESSION['paginasTotalesProductos'])) {
    $consulta = $conexion->query("SELECT COUNT(*) AS total FROM $tabla");
    $conteoRows = $consulta->fetchObject()->total; // Convertir a entero
    $_SESSION['paginasTotalesProductos'] = ceil($conteoRows / 5); // 5 productos por página
}

// Control de navegación entre páginas para los productos
if (isset($_GET['accionProductos'])) {
    if ($_GET['accionProductos'] === 'Siguiente' && $_SESSION['paginaActualProductos'] < $_SESSION['paginasTotalesProductos']) {
        $_SESSION['paginaActualProductos']++;
    } elseif ($_GET['accionProductos'] === 'Anterior' && $_SESSION['paginaActualProductos'] > 1) {
        $_SESSION['paginaActualProductos']--;
    } elseif ($_GET['accionProductos'] === 'Primera') {
        $_SESSION['paginaActualProductos'] = 1;
    } elseif ($_GET['accionProductos'] === 'Última') {
        $_SESSION['paginaActualProductos'] = $_SESSION['paginasTotalesProductos'];
    }
}

// Calcular el OFFSET para la consulta SQL de productos
$offsetProductos = max(0, ($_SESSION['paginaActualProductos'] - 1) * 5);
/////////////////////////////////////////////// LIMIT valor1, valor2
// Consultar productos de la página actual
$consultaProductos = $conexion->query("SELECT * FROM $tabla LIMIT 5 OFFSET $offsetProductos");

// Paginación del carrito
if (!isset($_SESSION['paginaActualCarrito'])) {
    $_SESSION['paginaActualCarrito'] = 1;
}

// Asegurarse de que $_SESSION['carrito'] esté inicializado como un array
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Control de navegación para los productos en el carrito
if (isset($_GET['accionCarrito'])) {
    // Verificar si el carrito tiene productos antes de intentar paginar
    $totalCarrito = count($_SESSION['carrito']);
    if ($totalCarrito > 0) {
        $paginasTotalesCarrito = ceil($totalCarrito / 5);
        if ($_GET['accionCarrito'] === 'SiguienteCarrito' && $_SESSION['paginaActualCarrito'] < $paginasTotalesCarrito) {
            $_SESSION['paginaActualCarrito']++;
        } elseif ($_GET['accionCarrito'] === 'AnteriorCarrito' && $_SESSION['paginaActualCarrito'] > 1) {
            $_SESSION['paginaActualCarrito']--;
        } elseif ($_GET['accionCarrito'] === 'PrimeraCarrito') {
            $_SESSION['paginaActualCarrito'] = 1;
        } elseif ($_GET['accionCarrito'] === 'ÚltimaCarrito') {
            $_SESSION['paginaActualCarrito'] = $paginasTotalesCarrito;
        }
    }
}

// Calcular el OFFSET para la consulta del carrito
$offsetCarrito = max(0, ($_SESSION['paginaActualCarrito'] - 1) * 5);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GESTISIMAL</title>
</head>
<body>
    <h1>GESTISIMAL</h1>
    <!-- Botón de Administrar Productos -->
    <form action="login.php">
        <input type="submit" value="Administrar Productos">
    </form>

    <!-- Paginación de productos -->
    <h2>Productos</h2>
    <table>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
            <th>Margen</th>
            <th>Comprar</th>
        </tr>

        <?php
        while ($almacen = $consultaProductos->fetchObject()) {
            ?>
            <tr>
                <td><?= $almacen->codigo ?></td>
                <td><?= $almacen->descripcion ?></td>
                <td><?= $almacen->compra ?></td>
                <td><?= $almacen->venta ?></td>
                <td><?= $almacen->stock ?></td>
                <td><?= $almacen->venta - $almacen->compra ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="codigoProducto" value="<?= $almacen->codigo ?>">
                        <input type="submit" name="comprar" value="Comprar">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <form method="get">
        <input type="submit" name="accionProductos" value="Primera" <?= $_SESSION['paginaActualProductos'] == 1 ? 'disabled' : '' ?>>
        <input type="submit" name="accionProductos" value="Anterior" <?= $_SESSION['paginaActualProductos'] == 1 ? 'disabled' : '' ?>>
        <input type="submit" name="accionProductos" value="Siguiente" <?= $_SESSION['paginaActualProductos'] == $_SESSION['paginasTotalesProductos'] ? 'disabled' : '' ?>>
        <input type="submit" name="accionProductos" value="Última" <?= $_SESSION['paginaActualProductos'] == $_SESSION['paginasTotalesProductos'] ? 'disabled' : '' ?>>
    </form>

    <!-- Paginación del carrito -->
    <h2>Carrito de Compra</h2>
    <?php if (count($_SESSION['carrito']) > 0): ?>
        <table>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio con IVA</th>
            </tr>
            <?php
            $carritoPaginado = array_slice($_SESSION['carrito'], $offsetCarrito, 5);
            foreach ($carritoPaginado as $producto) {
                echo "<tr>
                    <td>{$producto->codigo}</td>
                    <td>{$producto->descripcion}</td>
                    <td>{$producto->precioConIva} EUR</td>
                </tr>";
            }
            ?>
        </table>
        <form action="" method="post">
            <input type="submit" name="procesarPedido" value="Procesar Pedido">
        </form>

        <!-- Paginación del carrito -->
        <form method="get">
            <input type="submit" name="accionCarrito" value="PrimeraCarrito" <?= $_SESSION['paginaActualCarrito'] == 1 ? 'disabled' : '' ?> >
            <input type="submit" name="accionCarrito" value="AnteriorCarrito" <?= $_SESSION['paginaActualCarrito'] == 1 ? 'disabled' : '' ?>>
            <input type="submit" name="accionCarrito" value="SiguienteCarrito" <?= $_SESSION['paginaActualCarrito'] == ceil(count($_SESSION['carrito']) / 5) ? 'disabled' : '' ?>>
            <input type="submit" name="accionCarrito" value="ÚltimaCarrito" <?= $_SESSION['paginaActualCarrito'] == ceil(count($_SESSION['carrito']) / 5) ? 'disabled' : '' ?>>
        </form>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
</body>
</html>
