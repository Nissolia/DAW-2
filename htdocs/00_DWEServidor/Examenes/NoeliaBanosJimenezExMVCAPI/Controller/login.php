<?php
require_once '../Model/Incidencia.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: ../Controller/login.php');
}

// Pasar los datos a la vista
include '../View/login_v.php';
?>
