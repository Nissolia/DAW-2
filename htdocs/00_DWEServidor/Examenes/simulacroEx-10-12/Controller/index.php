<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cerrarSesion'])) {
    unset($_SESSION['usuario']);
    header('Location: index.php');
}

if (!isset($_SESSION['usuario']) && !isset($_REQUEST['volverIndex'])) {
    // Si el usuario no está logueado, redirige a login
    header('Location: login.php');
}

// Obtener las fotos disponibles
$fotos = Foto::getAll(); // Obtiene todas las fotos, incluyendo el autor

// Preparar los datos para pasar a la vista
$datos = [];
foreach ($fotos as $foto) {
    // Para cada foto, obtén el autor y el número de likes
    $autor = Usuario::getById($foto->getId_usuario()); // Obtener el autor de la foto
    $likesTotales = Like::countLikes($foto->getId()); // Contar los likes de la foto

    // Almacenar la información en un array asociativo
    $datos[] = [
        'foto' => $foto,
        'autor' => $autor,
        'likesTotales' => $likesTotales
    ];
}

// Pasar los datos a la vista
include '../View/index_v.php';
?>
