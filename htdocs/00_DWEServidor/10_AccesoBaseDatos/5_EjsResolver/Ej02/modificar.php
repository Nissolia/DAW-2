<?php
include_once 'libreria.php';
if (session_status() === PHP_SESSION_NONE) session_start();
// primero de todo pedimos la conexion con la base de datos
$tabla = "cliente";
$bd = "banco";
$conexion = pedirConexion($tabla, $bd);
if (isset($_REQUEST['dni'])) {
    $_SESSION['dni'] = $_REQUEST['dni'];
}
?>
<!-- sesion pag actual, num paginas los registros que han que mostrar
 se puede ir mostrando con un for en la parte superior
 seguro que queires borrar -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">ç
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta cliente</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_REQUEST['modificar'])) {
        // Comprueba si ya existe un cliente con el DNI introducido
        $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni=" . $_SESSION['dni']);

        if ($consulta->rowCount() == 1) {
            // Esta parte en la que existe ya un cliente sí funciona

            if (isset($_REQUEST['nombre']) && isset($_REQUEST['dirección']) && isset($_REQUEST['telefono'])) {

                echo "Se ha modificado: " . $_REQUEST['nombre'];
                if ($_REQUEST['nombre'] == "" || $_REQUEST['dirección'] == "" || $_REQUEST['telefono'] == "") {
                } else {
                    $update = "UPDATE cliente SET nombre=\"$_REQUEST[nombre]\",
                    dirección=\"$_REQUEST[dirección]\", telefono=\"$_REQUEST[telefono]\" WHERE
                    dni=\"$_SESSION[dni]\"";
                    $consulta = $conexion->query($update);
                }
            } else {
    ?>
                <form action="altaClienteFormulario.php" method="post">

                    <input type="text" name="nombre" placeholder="Nombre"><br>
                    <input type="text" name="dirección" placeholder="Dirección"><br>
                    <input type="number" name="telefono" placeholder="Teléfono"><br>
                    <input class="nuevoCliente" type="submit" value="Nuevo cliente">
                </form>


    <?php
            }
        } else {

            $conexion = null;
            header('Location: index.php');
        }
    }
    ?>
    <p>Ya puede volver a la <a href='index.php'>página principal</a>.</p>
</body>

</html>