<?php 
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start(); // Iniciar la sesión si no está iniciada

// Si existe la sesión
if (isset($_SESSION['usuarioSesion'])) {
    // Eliminar la variable específica de la sesión
    unset($_SESSION['usuarioSesion']); 
     // Redirigir al index
    header('Location: ../index.php');
    // Finalizar el script después de la redirección
    exit(); 
}
?>
