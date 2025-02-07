<?php
include_once 'libreria.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Conexión con la base de datos
$tabla = "almacen";
$bd = "gestimal";
$conexion = pedirConexion($tabla, $bd);

if (isset($_REQUEST['codigo'])) {
    $_SESSION['codigo'] = $_REQUEST['codigo'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada Almacén</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $codigo = $_SESSION['codigo'] ?? null;

    if ($codigo) {
        // Consulta para verificar si el código existe
        $consulta = $conexion->query("SELECT stock FROM $tabla WHERE codigo = '$codigo'");

        if ($consulta->rowCount() > 0) {
            // Recuperar el stock actual
            $almacen = $consulta->fetchObject();
            $stockAnterior = $almacen->stock;

            // Mostrar el formulario si aún no se ha enviado el stock adicional
            if (!isset($_POST['masStock'])) {
                ?>
                <h2>Añadir Stock</h2>
                <p>Stock actual: <?= $stockAnterior ?></p>
                <form action="" method="post">
                    <label for="masStock">Añadir al stock actual:</label>
                    <input type="number" id="masStock" name="masStock" max="100" min="1" required>
                    <input type="hidden" name="entrada" value="true">
                    <input type="submit" value="Añadir al stock">
                </form>
                <?php
            } else {
                // Procesar el stock adicional enviado
                $masStock = (int)$_POST['masStock'];

                // Validar que el valor adicional es válido
                if ($masStock > 0 && $masStock <= 100) {
                    $totalStock = $stockAnterior + $masStock;

                    // Actualizar el stock en la base de datos
                    $update = "UPDATE $tabla SET stock=\"$totalStock\" WHERE codigo=\"$codigo\"";
                    $conexion->query($update);

                    echo "<p>El stock se ha actualizado correctamente. </p>";
                    echo "<h3>El nuevo stock es: $totalStock.</h3>";
                } else {
                    echo "<p>Error: el stock adicional debe estar entre 1 y 100.</p>";
                }
            }
        } else {
            echo "<p>Error: el código proporcionado no existe.</p>";
        }
    } else {
        echo "<p>Error: no se ha proporcionado un código válido.</p>";
    }
    ?>
    <hr>
    <p>Volver a la <a href='index.php'>página principal</a>.</p>
</body>

</html>
