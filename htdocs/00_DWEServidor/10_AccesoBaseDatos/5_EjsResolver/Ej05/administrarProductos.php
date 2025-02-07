<?php
include_once 'libreria.php';
// Inicio de sesión
session_start();

// Conexión con la base de datos
$tabla = "almacen";
$bd = "gestimal";
$conexion = pedirConexion($tabla, $bd);

// Configuración inicial de paginación
if (!isset($_SESSION['paginaActual'])) {
    $_SESSION['paginaActual'] = 1;
}

// Obtener el número total de registros y calcular páginas totales
if (!isset($_SESSION['paginasTotales'])) {
    $consulta = $conexion->query("SELECT COUNT(*) AS total FROM $tabla");
    $conteoRows = $consulta->fetchObject()->total; // Convertir a entero

    // Asegurarse de que siempre haya al menos una página
    $_SESSION['paginasTotales'] = ceil($conteoRows / 5); // 5 registros por página
}

// Control de navegación entre páginas
if (isset($_GET['accion'])) {
    if ($_GET['accion'] === 'Siguiente' && $_SESSION['paginaActual'] < $_SESSION['paginasTotales']) {
        $_SESSION['paginaActual']++;
    } elseif ($_GET['accion'] === 'Anterior' && $_SESSION['paginaActual'] > 1) {
        $_SESSION['paginaActual']--;
    } elseif ($_GET['accion'] === 'Primera') {
        $_SESSION['paginaActual'] = 1;
    } elseif ($_GET['accion'] === 'Última') {
        $_SESSION['paginaActual'] = $_SESSION['paginasTotales'];
    }
}

// Calcular el OFFSET para la consulta SQL
defined('ITEMS_POR_PAGINA') || define('ITEMS_POR_PAGINA', 5);

// Calcular el OFFSET (debe ser >= 0)
$offset = max(0, ($_SESSION['paginaActual'] - 1) * ITEMS_POR_PAGINA);

// Consultar registros de la página actual
$consulta = $conexion->query("SELECT * FROM $tabla LIMIT " . ITEMS_POR_PAGINA . " OFFSET " . $offset);
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

    <table>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
            <th>Margen</th>
            <th colspan="4">Modificaciones</th>
        </tr>

        <?php
        while ($almacen = $consulta->fetchObject()) {
        ?>
            <tr>
                <td><?= $almacen->codigo ?></td>
                <td><?= $almacen->descripcion ?></td>
                <td><?= $almacen->compra ?></td>
                <td><?= $almacen->venta ?></td>
                <td><?= $almacen->stock ?></td>
                <td><?= $almacen->venta - $almacen->compra ?></td>
                <td>
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $almacen->codigo ?>">
                        <input class="eliminar" type="submit" value="Eliminar">
                    </form>
                </td>
                <td>
                    <form action="modificar.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $almacen->codigo ?>">
                        <input class="modificar" type="submit" value="Modificar">
                    </form>
                </td>
                <td>
                    <form action="entrada.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $almacen->codigo ?>">
                        <input class="movAlmacen" type="submit" value="Entrada">
                    </form>
                </td>
                <td>
                    <form action="salida.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $almacen->codigo ?>">
                        <input class="movAlmacen" type="submit" value="Salida">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td class="paginado">
                <form method="get">
                    Página <?= $_SESSION['paginaActual'] ?> de <?= $_SESSION['paginasTotales'] ?> &nbsp;
            </td>
            <td> <input type="submit" name="accion" value="Primera" <?= $_SESSION['paginaActual'] == 1 ? 'disabled' : '' ?>>
            </td>
            <td> <input type="submit" name="accion" value="Anterior" <?= $_SESSION['paginaActual'] == 1 ? 'disabled' : '' ?>>
            </td>
            <td> <input type="submit" name="accion" value="Siguiente" <?= $_SESSION['paginaActual'] == $_SESSION['paginasTotales'] ? 'disabled' : '' ?>>
            </td>
            <td> <input type="submit" name="accion" value="Última" <?= $_SESSION['paginaActual'] == $_SESSION['paginasTotales'] ? 'disabled' : '' ?>>
            </td>
            </form>

        </tr>
        <tr>
            <form action="altaAlmacen.php" method="post">
                <td><input type="text" name="codigo" placeholder="Código" minlength="4" maxlength="4"></td>
                <td><input type="text" name="descripcion" placeholder="Descripción" minlength="3"></td>
                <td><input type="number" name="compra" placeholder="Precio de compra"></td>
                <td><input type="number" name="venta" placeholder="Precio de venta"></td>
                <td><input type="number" name="stock" placeholder="Stock"></td>
                <td colspan="6"><input class="nuevoalmacen" type="submit" value="Nuevo almacén"></td>
            </form>
        </tr>
    </table>
</body>

</html>