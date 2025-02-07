<?php
include_once 'libreria.php';
// primero de todo pedimos la conexion con la base de datos
$tabla = "cliente";
$bd = "banco";
$conexion = pedirConexion($tabla, $bd);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta cliente</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php
    if (isset($_REQUEST['eliminar'])) {
        // Comprueba si ya existe un cliente con el DNI introducido
        $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni=" . $_POST['dni']);


        if ($consulta->rowCount() == 1) {
            // Esta parte en la que existe ya un cliente sí funciona
            $consulta = $conexion->query("DELETE FROM cliente WHERE dni='$_POST[dni]'");
            echo "Se ha eliminado " .$_POST['dni'];
            // si hay mas de un cliente con esa clave (esto x si acaso)
        } else {

            $conexion = null;
            header('Location: index.php');
        }
    }
    ?>
    <p>Ya puede volver a la <a href='index.php'>página principal</a>.</p>
</body>

</html>