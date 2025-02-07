<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion de sesion</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php

    // Comprobar si el usuario ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        echo "<p>No has iniciado sesión. Eres un cliente normal.</p>";
        exit;
    }

    // Comprobar el rol del usuario
    if ($_SESSION['rol'] === 'admin') {
        echo "<h1>Bienvenido, Administrador</h1>";
        echo "<p>Como administrador, tienes acceso completo a la gestión de productos y más funcionalidades.</p>";
        // Aquí podrías agregar enlaces a las funciones de administración
        echo '<a href="administrarProductos.php">Administrar productos</a>';
    } else {
        echo "<h1>Bienvenido, Cliente</h1>";
        echo "<p>Estás como cliente normal, no tienes acceso a funciones administrativas.</p>";
        // Aquí podrías agregar enlaces para clientes
        echo '<a href="index.php">Volver a la tienda</a>';
    }
    ?>

</body>

</html>