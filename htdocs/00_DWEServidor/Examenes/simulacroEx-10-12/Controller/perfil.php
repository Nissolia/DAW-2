<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cerrarSesion'])) {
    unset($_SESSION['usuario']);
}

if (!isset($_SESSION['usuario']) || isset($_REQUEST['volverIndex'])) {
    header('Location: index.php');
}



// Carga la vista de listado
include '../View/perfil_v.php';
