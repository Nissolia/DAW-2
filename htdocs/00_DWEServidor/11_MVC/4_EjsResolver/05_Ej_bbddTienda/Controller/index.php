<?php
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if(session_status() === PHP_SESSION_NONE) session_start();

// Comprobar si el usuario está autenticado
if (!isset($_SESSION['usuarioSesion'])) {
    if (!isset($_SESSION['errorSesion'])) {
        $_SESSION['errorSesion'] = "Debe iniciar sesión.";
    }
} else {
    // Redirigir según el rol
    $usuarioSesion = $_SESSION['usuarioSesion'];
    if ($usuarioSesion->getRol() == 'cliente') {
        header('Location: ../Controller/c_listaProductos.php');
    } else if ($usuarioSesion->getRol() == 'admin') {
        header('Location: ../Controller/a_listaProductos.php');
    }
}
include '../View/index_v.php';
