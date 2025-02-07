<?php
include_once 'libreria.php';
// primero de todo pedimos la conexion con la base de datos
$conexion = pedirConexion("cliente","banco");
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
        $dni = $_REQUEST['dni'];
        // Comprueba si ya existe un cliente con el DNI introducido
        $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni =$dni");


        if ($consulta->rowCount() > 0) {
            // Esta parte en la que existe ya un cliente sí funciona
    ?>
            Ya existe un cliente con DNI <?= $_REQUEST['dni'] ?><br>

    <?php
        } else {
            // Inserción usando una consulta preparada
            if (isset($_REQUEST['nombre']) && isset($_REQUEST['dirección']) && isset($_REQUEST['telefono']) && isset($_REQUEST['telefono'])&&  isset($_REQUEST['dni'])){
                if ($_REQUEST['nombre'] == "" || $_REQUEST['dirección'] == "" || $_REQUEST['telefono'] == "") {
                } else {
                    $insert = "INSERT into cliente (dni, nombre, dirección, telefono) values nombre=\"$_REQUEST[nombre]\",
                    dirección=\"$_REQUEST[dirección]\", telefono=\"$_REQUEST[telefono]\" WHERE
                    dni=\"$_SESSION[dni]\"";
                    $consulta = $conexion->query($insert);
                }

            }

             
            echo "Cliente dado de alta correctamente.";
            $conexion = null;
            header('Location: index.php');
        }
    }
    ?>
    <p>Ya puede volver a la <a href='index.php'>página principal</a>.</p>
</body>

</html>