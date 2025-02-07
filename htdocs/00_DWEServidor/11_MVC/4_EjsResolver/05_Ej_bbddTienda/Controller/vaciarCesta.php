<?php
require_once '../Model/Usuario.php';
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SESSION['usuarioSesion']->getRol() == 'cliente') {

    $idCliente = $_SESSION['usuarioSesion']->getId();
    //  nueva cesta y la vaciamos con el id del cliente
    $cesta = new Cesta();
    $cesta->vaciarCestaUsuario($idCliente);
}
header('Location: ../index.php');
