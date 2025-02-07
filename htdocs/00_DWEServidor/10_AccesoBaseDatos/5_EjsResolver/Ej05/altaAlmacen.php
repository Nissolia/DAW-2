<?php
include_once 'libreria.php';
// primero de todo pedimos la conexion con la base de datos
$tabla = "almacen";
$bd = "gestimal";
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
    if (isset($_REQUEST['codigo'])) {
        // Comprueba si ya existe un cliente con el codigo introduccodigoo
        $consulta = $conexion->prepare("SELECT codigo FROM almacen WHERE codigo = :codigo");
        $consulta->execute([':codigo' => $_REQUEST['codigo']]);

        if ($consulta->rowCount() > 0) {
            // Esta parte en la que existe ya un cliente sí funciona
    ?>
            Ya existe un producto con codigo <?= $_REQUEST['codigo'] ?><br>

    <?php
        } else {
            // Inserción usando una consulta preparada
            $insercion = $conexion->prepare(
                "INSERT INTO almacen (codigo, descripcion, compra, venta, stock) VALUES (:codigo, :descripcion, :direccion, :venta, :stock)"
            );

            $insercion->execute([
                ':codigo' => $_REQUEST['codigo'],
                ':descripcion' => $_REQUEST['descripcion'],
                ':direccion' => $_REQUEST['compra'],
                ':venta' => $_REQUEST['venta'],
                ':stock' => $_REQUEST['stock']
            ]);

            echo "Producto dado de alta correctamente.";
            $conexion = null;
            header('Location: index.php');
        }
    }
    ?>
    <p>Ya puede volver a la <a href='index.php'>página principal</a>.</p>
</body>

</html>