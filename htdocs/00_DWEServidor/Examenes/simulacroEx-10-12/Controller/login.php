<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$data['error'] = "";
if (isset($_SESSION['usuario'])) {
    //  header('Location: #.php');  
}

if (isset($_REQUEST['usuario'])) {

    if (isset($_REQUEST['acceso'])) {
        $usuarios = Usuario::getUsuarios();
        foreach ($usuarios as $user) {
            if ($user->getNombre() == $_REQUEST['usuario']) {
                $_SESSION['usuario'] = $user->getNombre();
                header('Location: index.php');
            }
        }
        if (!isset($_SESSION['usuario'])) {
            $data['error'] = '<h3 style="color:red;">Este usuario no esta registrado.</h3>';
        }
    }
    if (isset($_REQUEST['registro'])) {
        $_SESSION['usuario'] = new Usuario(null, $_REQUEST['usuario']);
        header('Location: index.php');
    }
}
// Carga la vista de listado
include '../View/login_v.php';
