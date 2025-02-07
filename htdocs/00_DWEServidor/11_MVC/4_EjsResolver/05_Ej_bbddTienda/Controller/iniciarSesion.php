<?php
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar que se reciben usuario y contraseña
if (empty($_REQUEST['usuario']) || empty($_REQUEST['pass'])) {
    $_SESSION['errorSesion'] = "Debe proporcionar un usuario y contraseña.";
    header('Location: ../Controller/index.php');
    exit;
}

// Obtener los usuarios
$data['usuarios'] = Usuario::getUsuario();
$encontrado = false;

foreach ($data['usuarios'] as $usuario) {
    if (($_REQUEST['usuario'] == $usuario->getNombre()) && ($_REQUEST['pass'] == $usuario->getPass())) {
        $encontrado = true;

        if ($usuario->getRol() == 'cliente') {
            $_SESSION['errorSesion'] = "";
            $_SESSION['usuarioSesion'] = $usuario;
            header('Location: ../Controller/c_listaProductos.php');
            exit;
        } else if ($usuario->getRol() == 'admin') {
            $_SESSION['errorSesion'] = "";
            $_SESSION['usuarioSesion'] = $usuario;
            header('Location: ../Controller/a_listaProductos.php');
            exit;
        }else{
            $_SESSION['errorSesion'] = "Información incorrecta";
        }
    }
}

// Si no se encuentra el usuario
if (!$encontrado) {
    $_SESSION['errorSesion'] = "Esas credenciales están incorrectas.";
    header('Location: ../Controller/index.php');
}
