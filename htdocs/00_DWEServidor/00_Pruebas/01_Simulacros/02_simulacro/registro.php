<?php
if(session_status() === PHP_SESSION_NONE) session_start();
// para guardar la informacion de 
if (isset($_REQUEST['usuario']) && (isset($_REQUEST['contrasena']))) {
    $archivo = fopen("usuarios.txt", "a");
    fputs($archivo, ($_REQUEST['usuario'] . "," . $_REQUEST['contrasena']));
    fclose($archivo);
} ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <h1>REGISTRO NUEVA CUENTA DE USUARIO</h1>
    <h3>Introduce tus datos para registrar la cuenta</h3>
    <form action="inicio.php" method="post">
        USUARIO: <input type="text" name="usuario"><br>
        CONTRASEÑA: <input type="password" name="contrasena"><br> <input type="submit" value="Aceptar">
    </form>
   <a href="inicio.php">Página principal </a>
 
  
</body>

</html>