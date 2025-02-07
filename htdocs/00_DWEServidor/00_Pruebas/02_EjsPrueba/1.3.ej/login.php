<?php 
if(session_status() === PHP_SESSION_NONE) session_start();
if (isset($_COOKIE['usuario'])) {
   $_SESSION['usuarioActivo'] = $_COOKIE['usuario'];
   header('Location: index.php');
}
if(!isset($_SESSION['error'])){
    $_SESSION['error']= "";
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
    <h1>Inicio de sesion</h1>
    <!-- se muestra si no se ha iniciado sesion -->
    <form action="comprobacion.php" method="post">
     Usuario: <input type="text" name="usuario"><br>
     Contraseña: <input type="password" name="contrasena">
     <input type="hidden" name="inicioSesion" value="true" >
      <input type="submit" value="Enviar">
    </form>
    <p style="color: red;">   <?php echo $_SESSION['error']; ?></p>
 <form action="registro.php">
    <input type="submit" value="Registrarse">
 </form>
</body>
</html>