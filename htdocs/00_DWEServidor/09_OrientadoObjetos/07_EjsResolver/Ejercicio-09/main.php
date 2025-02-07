<?php
include_once 'Coche.php';
include_once 'CocheLujo.php';
session_start();

if (!isset($_SESSION['coches'])) {
    $_SESSION['coches'] = [];
}

// añadimos los coches creados a la sesión
if (isset($_REQUEST['matricula']) && isset($_REQUEST['modelo']) && isset($_REQUEST['precio'])) {
    // comprobamos si se ha pasado el suplemento de lujo
    if (isset($_REQUEST['suplementoLujo']) && $_REQUEST['suplementoLujo'] != "") {
        $suplemento = $_REQUEST['suplementoLujo'];
        $_SESSION['coches'][] = new CocheLujo($_REQUEST['matricula'], $_REQUEST['modelo'], $_REQUEST['precio'], $_REQUEST['suplementoLujo']);
    } else {
        $_SESSION['coches'][] = new Coche($_REQUEST['matricula'], $_REQUEST['modelo'], $_REQUEST['precio']);
    }
}
?>
<!-- Diseñar una página que permita crear coches de la clase Coche y vaya mostrando el listado de
     los mismos en una tabla, si el coche no es de lujo, en la celda del suplemento mostrará
     “No procede”. También semostrará en la cabecera de la página los datos del coche más caro -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario coches</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="#" method="post">
        Matricula: <input type="text" name="matricula" required><br>
        Modelo: <input type="text" name="modelo" required><br>
        Precio: <input type="number" name="precio" min="50" required><br>
        Suplemento de lujo: <input type="number" name="suplementoLujo"><br>
        <input type="submit" value="Crear coche">
    </form>

    <h2><?= Coche::masCaro(); ?></h2>

    <table>
        <tr class="theader">
            <td>Matricula</td>
            <td>Modelo</td>
            <td>Precio</td>
            <td>Suplemento</td>
        </tr>
        <?php
        if (isset($_SESSION['coches'])) {
            foreach ($_SESSION['coches'] as $coche) {
                echo $coche->imprimir();
            }
        }
        ?>
    </table>
</body>

</html>