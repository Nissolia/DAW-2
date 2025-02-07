<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (isset($_COOKIE['usuario'])) {
    $_SESSION['usuarioActivo'] = $_COOKIE['usuario'];
    header('Location: index.php');
}
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = "";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!-- se muestra si no se ha iniciado sesion -->
     <h1>Registro</h1>
    <form action="comprobacion.php" method="post">
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="contrasena">
        <input type="hidden" name="registrarSesion" value="true">
        <input type="submit" value="Registrarse">
    </form>
    <p style="color: red;"> <?php echo $_SESSION['error']; ?></p>

</body>

</html>