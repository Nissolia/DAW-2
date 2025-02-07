<?php
include_once 'Empleado.php';
session_start();

if (!isset($_SESSION['empleado'])) {
    $_SESSION['empleado'] = new Empleado("Jose García", 3100);
    $_SESSION['empleado'] = new Empleado("Josefa Martinez", 2500);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear empleado</title>
</head>

<body>
    <?php

    if (isset($_REQUEST['nombre']) && isset($_REQUEST['sueldo'])) {
        $_SESSION['empleado'] = new Empleado($_REQUEST['nombre'], $_REQUEST['sueldo']);
        echo "Se ha creado el empleado: " . $_REQUEST['nombre'];

        echo "<br><a href='ejEmpleado.php'>VOLVER</a>";
    } else {
    ?>

        <form action="" method="post">
            Nuevo empleado:
            <input type="text" name="nombre" placeholder="Nuevo empleado"><br>
            Sueldo:
            <input type="number" name="sueldo" placeholder="Sueldo">
            <input type="submit" value="Crear empleado">


        </form>

        <hr>
        <form action="" method="post">
            <select name="empleado" id="selectEmpleado">
                <?php
                for ($i = 0; $i < count($_SESSION['empleado']); $i++) {
                    echo "<option value=".$_SESSION['empleado'][$i]->getNombre().">".$_SESSION['empleado'][$i]->getNombre()."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Ver empleado">
        </form>


        <form action="" method="post">Ver impuestos de:
            <input type="text" placeholder="Inserta nombre">
            <input type="submit" value="Ver empleado">

            
        </form>
        <hr>
    <?php
    }


    // echo $pepe;
    // echo $pepe->pagaImpuesto();
    // echo $pepa;
    // echo $pepa->pagaImpuesto();
    ?>

</body>

</html>