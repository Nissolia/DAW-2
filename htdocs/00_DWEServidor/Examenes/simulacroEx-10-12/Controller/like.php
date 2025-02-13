<?php
require_once '../Model/Like.php';
require_once '../Model/Foto.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cerrarSesion'])) {
    unset($_SESSION['usuario']);
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['usuario'])) {
    // Si no hay sesión activa, redirige a login
    header('Location: login.php');
    exit();
}

if (isset($_REQUEST['id_foto'])) {
    $id_foto = $_REQUEST['id_foto'];
    $usuario = $_SESSION['usuario'];
    
    // Verificar si el usuario ya ha dado like a esta foto
    if (Like::hasUserLiked($id_foto, $usuario->getId())) {
        // Si ya le dio like, eliminar el like
        $like = new Like($id_foto, $usuario->getId());
        $like->delete();
    } else {
        // Si no le dio like, agregar el like
        $like = new Like($id_foto, $usuario->getId());
        $like->insert();
    }

    header('Location: index.php');
    exit();
}

?>
