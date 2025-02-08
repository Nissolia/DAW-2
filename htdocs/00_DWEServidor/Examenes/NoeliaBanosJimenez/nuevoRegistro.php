<!-- usuarioRegistrado -->
<?php
if (session_status() === PHP_SESSION_NONE) session_start();
//  si se nos ha pasado usuario registrado ejecutamos los comandos si no se vuelve a la pag principal
if (isset($_REQUEST['usuarioRegistrado'])) {
    // miramos en la sesion de los usuarios
    foreach ($_SESSION['usuarios'] as $key => $value) {
        // tenemos el emisor y comprobamos que no se repita
        if (!in_array($value->getEmisor(), $_SESSION['emisores'])) { //si no existe en sesion lo añadimos
            // guardamos los emisores en una sesion para usarlo en el session y donde corresponda
            $_SESSION['usuarioActivo'] = $_REQUEST['usuarioRegistrado'];
            header('Location: index.php');
        }else{
            $_SESSION['error'] = "<h3 style='color:red;'>Ese nombre de usuario ya existe</h3>";
        }
    }
} 
header('Location: login.php');


?>