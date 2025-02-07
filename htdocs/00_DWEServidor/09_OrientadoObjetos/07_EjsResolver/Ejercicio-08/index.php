<?php
include_once 'Zona.php';
session_start();


if (!isset($_SESSION['zonas'])) {
    // iniciamos los valores si no existen
    $_SESSION['zonas'] = [
        'Principal' => new Zona("Principal", 1000, 20),
        'Compra-Venta' => new Zona("Compra-Venta", 200, 35),
        'VIP' => new Zona("VIP", 25, 50)
    ];
}

// guardamos el mensaje final
$mensaje = '';

// venta de entradas
if (isset($_REQUEST['cantidad'])) {
    $zonaSeleccionada = $_POST['zona'];
    $cantidadEntradas = $_POST['cantidad'];

    // accedemos a la zona que se selecciona
    $zona = $_SESSION['zonas'][$zonaSeleccionada];

    // vendemos las entradas
    $mensaje = $zona->venderEntradas($cantidadEntradas);

    // guardamos la informacion en la sesion
    $_SESSION['zonas'][$zonaSeleccionada] = $zona;
}

// calculamos ingresos totales
$ingresosGlobales = 0;
foreach ($_SESSION['zonas'] as $zona) {
    $ingresosGlobales += $zona->getIngresosTotales();
}
?>
<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Entradas - Circo del Sol</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Venta de Entradas - Circo del Sol</h1>

    <?php
    if ($mensaje) {
        // mostramos el mensaje de exito o de error
        $claseMensaje = (strpos($mensaje, 'exitosa')) ? 'exito' : 'error';
        echo "<div class='mensaje $claseMensaje'>$mensaje</div>";
    }
    ?>

    <!-- informacion de las zonas -->
    <table>
        <thead>
            <tr>
                <th>Zona</th>
                <th>Entradas Disponibles</th>
                <th>Precio (€)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['zonas'] as $zona) {
                echo "<tr> <td>" . $zona->obtenerInfo()['nombre'] . "</td>";
                echo "<td>" . $zona->obtenerInfo()['entradasDisponibles'] . "</td>";
                echo "<td>" . $zona->obtenerInfo()['precio'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- formulario para vender entradas -->
    <div class="formulario">
        <h3>Vender Entradas</h3>
        <form method="POST" action="index.php">
            <label for="zona">Selecciona la zona:</label>
            <select name="zona" id="zona">
                <option value="Principal">Principal</option>
                <option value="Compra-Venta">Compra-Venta</option>
                <option value="VIP">VIP</option>
            </select><br>
            <label for="cantidad">Cantidad de entradas:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" required><br><br>
            <button type="submit">Vender entradas</button>
        </form>
    </div>

    <!-- mostrar ingresos globales -->
    <h2>Ingresos Globales</h2>
    <p><strong>Total Ingresos Generados:</strong> <?php echo $ingresosGlobales; ?> €</p>

</body>

</html>