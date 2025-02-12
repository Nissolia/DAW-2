<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$id = $_REQUEST['id'];
if (isset($_REQUEST['id'])) {
    $data['fotografias'] = Foto::getFotoById($_REQUEST['id']);
} else {
    header('Location: index.php');
}
// imagen, autor / usuarios que le han dado like / volver pag principal

// Carga la vista de listado
include '../View/detalle_v.php';
