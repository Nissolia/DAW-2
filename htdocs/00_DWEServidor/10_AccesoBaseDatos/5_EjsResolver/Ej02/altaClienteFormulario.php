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
if (isset($_REQUEST['dni'])) {
    // Comprueba si ya existe un cliente con el DNI introducido
    $consulta = $conexion->prepare("SELECT dni FROM cliente WHERE dni = :dni");
    $consulta->execute([':dni' => $_REQUEST['dni']]);

    if ($consulta->rowCount() > 0) {
        // Esta parte en la que existe ya un cliente sí funciona
?>
        Ya existe un cliente con DNI <?= $_REQUEST['dni'] ?><br>
      
<?php
    } else {
        // Inserción usando una consulta preparada
        $insercion = $conexion->prepare(
            "INSERT INTO cliente (dni, nombre, dirección, telefono) VALUES (:dni, :nombre, :direccion, :telefono)"
        );
        
        $insercion->execute([
            ':dni' => $_REQUEST['dni'],
            ':nombre' => $_REQUEST['nombre'],
            ':direccion' => $_REQUEST['dirección'],
            ':telefono' => $_REQUEST['telefono']
        ]);

        echo "Cliente dado de alta correctamente.";
        $conexion = null;
        header('Location: index.php');
    }
    }
    ?>
    <p>Ya puede volver a la <a href='index.php'>página principal</a>.</p>
</body>

</html>
