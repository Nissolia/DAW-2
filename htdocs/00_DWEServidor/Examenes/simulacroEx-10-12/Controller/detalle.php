<?php 
// Incluir los modelos necesarios
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';

// Iniciar la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) session_start();

$data = [
    'fotografia' => null,
    'autor' => null,
    'usuarios' => []
];

// Verificar si se recibió un ID en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Obtener la fotografía por ID
    $foto = Foto::getFotoById($id);
    
    if ($foto) {
        $data['fotografia'] = $foto;

        // Obtener el autor de la fotografía
        $idUser = $foto->getId_usuario();
        $autor = Usuario::getUsuarioById($idUser);
        $data['autor'] = $autor ?: null; // Si no encuentra autor, será null

        // Obtener usuarios que han dado like
        $usuarios = Like::getUsuariosQueDieronLike($id);
        if (!empty($usuarios)) {
            $data['usuarios'] = $usuarios;
        }
    }
}

// Cargar la vista
include '../View/detalle_v.php';
