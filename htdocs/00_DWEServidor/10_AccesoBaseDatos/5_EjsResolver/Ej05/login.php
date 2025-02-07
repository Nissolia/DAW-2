<?php
// Iniciar sesión
session_start();

// Comprobar si se ha enviado el formulario de login
if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Comprobar si las credenciales son correctas
    if ($usuario === 'admin' && $contrasena === '123') {
        $_SESSION['usuario'] = 'admin';
        $_SESSION['rol'] = 'admin'; // Establecer el rol como administrador
        header('Location: confirmarSesion.php'); // Redirigir a la página de confirmación
    } else {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = 'cliente'; // Establecer el rol como cliente
        header('Location: confirmarSesion.php'); // Redirigir a la página de confirmación
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Iniciar sesión</h1>

    <form action="" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <input type="submit" name="login" value="Iniciar sesión">
    </form>
</body>
</html>
