<?php // Inicio de sesión
session_start();
if (!isset($_SESSION['abierta'])) {
    //empezamos la sesion en falso
    $_SESSION['abierta'] = false;
}
if (!isset($_SESSION['suma'])) {
    //empezamos array de suma
    $_SESSION['suma'] = 0;
}
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <!-- Establece un control de acceso mediante nombre de usuario y contraseña para el ejercicio 1 de esta relación.
Realiza una nueva versión del ejercicio1, de modo que si lo cargamos sin la sesión iniciada nos redirija a la
página de login, y en caso contrario muestre el ejercicio normalmente, también debemos incluir un botón
“cerrar sesión” para cerrar la sesión del usuario y volver a la página de login.
Al cargar la página de login, si la sesión está iniciada redirige automáticamente a la página del ejercicio1 y si
no, mostrará el formulario de identificación con usuario y contraseña. -->


<!-- se unucua sesion para acceder al ejercicio 1,
 se puede cerrar sesion una vez que el usuario  -->
    <?php
if (isset($_REQUEST['cerrar'])) {
    $_SESSION['abierta']= false;
   header("Location: ej04-01-php");
}else{
    $_SESSION['abierta']= true;
    ?>
        <h1>Buenas</h1>
        <form action="ej04-ej01.php" method="post">
            <label for="usuario"> Usuario:</label>
            <input type="text" name="usuario"><br>
            <input type="submit" value="Iniciar sesion">
        </form>
    <?php

}
    ?>

</body>

</html>