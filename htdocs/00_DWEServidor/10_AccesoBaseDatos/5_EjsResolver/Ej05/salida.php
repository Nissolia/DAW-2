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
    <title>Salida de Almacén</title>
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
            if (!isset($_POST['menosStock'])) {
                ?>
                <h2>Salida de Stock</h2>
                <p>Stock actual: <?= $stockAnterior ?></p>
                <form action="" method="post">
                    <label for="menosStock">¿Cuánto desea retirar del stock?</label>
                    <input type="number" id="menosStock" name="menosStock" max="<?= $stockAnterior ?>" min="1" required>
                    <input type="hidden" name="salida" value="true">
                    <input type="submit" value="Realizar salida">
                </form>
                <?php
            } else {
                // Procesar la salida de stock
                $menosStock = (int)$_POST['menosStock'];

                // Validar que el valor no sea mayor que el stock actual
                if ($menosStock > $stockAnterior) {
                    echo "<p>Error: no puede retirar más stock del que hay disponible.</p>";
                } else {
                    // Si el stock es válido, realizar la reducción de stock
                    $totalStock = $stockAnterior - $menosStock;
                    $update = "UPDATE $tabla SET stock=\"$totalStock\" WHERE codigo=\"$codigo\"";
                    $conexion->query($update);
                    
                // elseif ($menosStock == $stockAnterior) {
                //     // Si el stock es igual al actual, eliminar el producto
                //     $delete = "DELETE FROM $tabla WHERE codigo='$codigo'";
                //     $conexion->query($delete);
                //     echo "<p>El producto con código '$codigo' ha sido eliminado.</p>";
                // } 
               

                    echo "<p>La salida de stock se ha realizado correctamente.</p>";
                    echo "<h3>El nuevo stock es: $totalStock.</h3>";
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
