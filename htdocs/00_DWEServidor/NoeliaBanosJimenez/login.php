<?php
include_once 'Email.php';
include_once 'libreria.php';
if (session_status() === PHP_SESSION_NONE) session_start();
//creamos la sesion de error
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = "";
}
////////////////////////////////////////////////////////////////
usuariosFichero('emails.txt');
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}
usuariosFichero("emails.txt");
if (!isset($_SESSION['emisores'])) {

  $_SESSION['emisores'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
</head>

<body>
    <!-- se muestra si no se inicia la sesion -->
    <h1>Inicie sesion</h1>
    <form action="index.php" method="post">
        <select name="usuarioElegido">
        <?php
          foreach ($_SESSION['emisores'] as $key => $value) {
              echo " <option value='".$value."'>$value</option>";
          }
          ?>
        </select>
        <input type="submit" value="Elegir usuario">
    </form>
    <br>
    <?php
    $_SESSION['error'] ?>
    <hr>
    <h1>Registrar usuario nuevo</h1>
    <form action="index.php" method="post">
        Usuario: <input type="text" name="usuarioRegistrado">
        <input type="submit" value="Registro nuevo usuairo">
    </form>
    <hr>
</body>

</html>