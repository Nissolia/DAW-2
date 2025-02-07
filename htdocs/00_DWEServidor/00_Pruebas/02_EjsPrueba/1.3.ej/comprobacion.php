<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// nombre.rsv - primera linea contraseña
$_SESSION['error'] = "";
$terminacion = '.rsv';
$archivo = "";
// comprobar si existe: valido para ambos
$_REQUEST['contrasena'];
// si el usuario ha añadido el usuario 


if (isset($_REQUEST['inicioSesion'])) {
    if (isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena'])) {
        $archivo = $_REQUEST['usuario'] . $terminacion;
        if (file_exists($archivo)) {
            $contrasena = trim(file($archivo)[0]); // Obtén la primera línea y elimina espacios/saltos de línea
            if ($contrasena === $_REQUEST['contrasena']) { // Usa comparación estricta
                $_SESSION['error'] = "";
                header('Location: index.php');
                exit(); // Asegúrate de terminar el script después de redirigir
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
            }
        } else {
            $_SESSION['error'] = "El usuario no existe.";
        }
    }
}

// comprobamos el inicio de sesion
if (isset($_REQUEST['registrarSesion'])) {
    if (isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena'])) {
        $archivo = $_REQUEST['usuario'] . $terminacion;
        if (file_exists($archivo)) {
            $_SESSION['error'] = "Ya existe un usuario creado con ese nombre.";
        } else {
            $_SESSION['error'] = "";
            $newArchivo = fopen($archivo, "w");
            fputs($newArchivo, $_REQUEST['contrasena']);
            fclose($newArchivo);
            // creamos la cookiie del usuario
            setcookie("usuario", $_REQUEST['usuario'], time() + (7 * 24 * 60 * 60)); // 1 semana

        }
    }
}

// volvemos a la pagina anterior y si no existe nos vamos a la principal
if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: login.php');
}
exit(); // Detenemos el script después de redirigir