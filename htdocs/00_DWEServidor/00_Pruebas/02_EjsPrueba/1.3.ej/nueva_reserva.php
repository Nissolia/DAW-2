<?php
require_once 'reserva.php';
require_once 'libreria.php';
session_start();

if (!isset($_SESSION['usuarioActivo'])) {
    header('Location: login.php');
    exit();
}

if (!empty($_POST['sala']) && !empty($_POST['fechaHora'])) {
    $usuario = $_SESSION['usuarioActivo'];
    $fechaHora = strtotime($_POST['fechaHora']);
    $sala = $_POST['sala'];

    $reserva = new Reserva($usuario, $fechaHora, $sala);
    $_SESSION['reservas'][] = $reserva;

    añadirFichero($usuario, $reserva);
    header('Location: index.php');
    exit();
}

header('Location: index.php');
?>
