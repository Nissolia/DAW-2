<?php
// fondo de color
$bgcolor = 'white';
if (isset($_REQUEST['color'])) {
    $bgcolor = $_REQUEST['color'];
    setcookie("bgcolor", $bgcolor, strtotime("+ 3 days"));
} 
 if (isset($_COOKIE["bgcolor"])) {
    $bgcolor = $_COOKIE["bgcolor"];
}
// borrar cookies
if (isset($_REQUEST['borrarCookies'])) {
    unset($bgcolor);
    header('refresh:0');
}
?>
<!-- documento de html -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio de color</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: <?= $bgcolor ?>;
        }
    </style>
</head>

<body>
    <!-- Escribe un programa que guarde en una cookie el color de fondo
 (propiedad background-color) de una
página. Esta página debe tener únicamente algo de texto y un
formulario para cambiar el color. -->
<h2>Elige el color de fondo:</h2>
<form action="" method="post">
  <input type="color" name="color" value='<?= $bgcolor ?>'><br><br>
  <input type="submit" value="Aceptar">
</form>
</body>

</html>