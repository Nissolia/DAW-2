<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();

$data = [
    'fotografias' => [],
    'autor' => [],
    'usuario' => []
];

// Verificar si se recibió un ID en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la fotografía por ID
    $data['fotografias'] = Foto::getFotoById($id);

    foreach ($data['fotografias'] as $foto) {
        $idUser = $foto->getId_usuario();

        // Obtener el autor de la fotografía
        $autor = Usuario::getUsuarioById($idUser);

        // Asegurarnos de que 'autor' sea un array de objetos, incluso si solo devuelve un objeto
        if (is_array($autor)) {
            $data['autor'] = $autor; // Si es un array, lo dejamos tal cual
        } else {
            $data['autor'] = [$autor]; // Si es un objeto, lo convertimos en un array con un solo objeto
        }
    }

    // Obtener usuarios que han dado like
    $data['likes'] = Like::getLikeById($id);
    foreach ($data['likes'] as $like) {
        $idUser = $like->getId_usuario();
        $usuario = Usuario::getUsuarioById($idUser);
        if ($usuario) {
            $data['usuario'][] = $usuario;
        }
    }
}

// Cargar la vista
include '../View/detalle_v.php';
