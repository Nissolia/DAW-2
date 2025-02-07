<?php
include_once 'libreria.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Primero, establecemos la conexión con la base de datos
$tabla = "almacen";
$bd = "gestimal";
$conexion = pedirConexion($tabla, $bd);

// Si no se ha guardado el código en la sesión, lo tomamos de la URL (o de la solicitud)
if (!isset($_SESSION['codigo'])) {
    $_SESSION['codigo'] = $_REQUEST['codigo'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Almacén</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_REQUEST['modificar'])) {
        // Recuperamos el código de la sesión
        $codigo = $_SESSION['codigo'];

        // Comprobamos si ya existe un almacén con el código introducido
        $consulta = $conexion->query("SELECT codigo FROM almacen WHERE codigo='$codigo'");

        if ($consulta->rowCount() == 1) {
            // Si el almacén existe, procesamos la modificación
            if (isset($_REQUEST['codigo']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['compra']) && isset($_REQUEST['venta']) && isset($_REQUEST['stock'])) {
                
                // Comprobamos que los campos no estén vacíos
                if ($_REQUEST['codigo'] == "" || $_REQUEST['descripcion'] == "" || $_REQUEST['compra'] == "" || $_REQUEST['venta'] == "" || $_REQUEST['stock'] == "") {
                    echo "Todos los campos son obligatorios.";
                } else {
                    // Realizamos la actualización
                    $update = "UPDATE almacen SET 
                                codigo='{$_REQUEST['codigo']}',
                                descripcion='{$_REQUEST['descripcion']}',
                                compra='{$_REQUEST['compra']}',
                                venta='{$_REQUEST['venta']}',
                                stock='{$_REQUEST['stock']}'
                                WHERE codigo='$codigo'";
                    $consulta = $conexion->query($update);

                    echo "Se ha modificado el almacén con el código: " . $_REQUEST['codigo'];
                }
            }
        } else {
            // Si no existe el almacén, redirigimos a la página principal
            $conexion = null;
            header('Location: index.php');
        }
    } else {
        // Mostrar el formulario para modificar el almacén
        $codigo = $_SESSION['codigo'];
        $consulta = $conexion->query("SELECT * FROM almacen WHERE codigo='$codigo'");

        if ($consulta->rowCount() == 1) {
            $almacen = $consulta->fetchObject();
            ?>
            <h2>Modificar Almacén: <?= $almacen->codigo ?></h2>
            <form action="modificar.php" method="post">
                <input type="hidden" name="modificar" value="true">
                <table>
                    <tr>
                        <td>Código</td>
                        <td><input type="text" name="codigo" value="<?= $almacen->codigo ?>" minlength="4" maxlength="4" required></td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td><input type="text" name="descripcion" value="<?= $almacen->descripcion ?>" minlength="3" required></td>
                    </tr>
                    <tr>
                        <td>Precio de compra</td>
                        <td><input type="number" name="compra" value="<?= $almacen->compra ?>" required></td>
                    </tr>
                    <tr>
                        <td>Precio de venta</td>
                        <td><input type="number" name="venta" value="<?= $almacen->venta ?>" required></td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td><input type="number" name="stock" value="<?= $almacen->stock ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="modificar" type="submit" value="Modificar Almacén"></td>
                    </tr>
                </table>
            </form>
            <?php
        } else {
            echo "No se ha encontrado el producto con el código: " . $codigo;
        }
    }
    ?>

    <p><a href="index.php">Volver a la página principal</a></p>
</body>

</html>
