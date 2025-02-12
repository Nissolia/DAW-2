<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() === PHP_SESSION_NONE) session_start();
// APARTADO PRINCIPAL DEL INDEX SIN INICIO DE SESION   
// Obtiene todas las fotografías
$data['fotografias'] = Foto::getFotos();
$data['likes'] = Like::getLikes();
// para calcular el conteo de 
$data['conteoLikes'] = [];
$data['usuarios'] = [];
// calculamos los likes
$data['idFoto'] = [];
$idFoto = 0;
$idUsuario = 0;
$data['nombreUsuario'] = [];
$data['controlIndex'] = 0;
$indexLikes = 0;
$indexUser = 0;
foreach ($data['fotografias'] as $foto) {
    $data['idFoto'][] = $foto->getId();
    $idFoto = $foto->getId();
    $idUsuario = $foto->getId_usuario();
    $indexLikes = 0;
    foreach ($data['likes'] as $like) {
        // conteo likes va añadido con el id de la foto para pode ver cuantos likes tiene una foto
        $data['conteoLikes'][$indexLikes] = $like->contarLikes($idFoto);
        $arrayUsuarios = Usuario::getUsuarios();
        $indexUser = 0;
        foreach ($arrayUsuarios as $user) {
            if ($user->getId() == $idUsuario) {
                $data['nombreUsuario'][$indexUser] = $user->getNombre();
            }
            $indexUser++;
        }
        $indexLikes++;
    }
    $data['controlIndex']++;
}
$data['controlIndex'] = 0;
// si el usuario está en la sesion
if (isset($_SESSION['usuario'])) {
}
// Carga la vista de listado
include '../View/index_v.php';
