<?php
include_once 'Email.php';
include_once 'libreria.php';
if (session_status() === PHP_SESSION_NONE) session_start();
////////////////////////////////////////
// si es dado el boton de destacar
if (isset($_REQUEST['destacar'])) {
    foreach ($_SESSION['usuarios'] as $index => $value) {
        if ($value->getEmisor() == $_SESSION['usuarioActivo']) {
            $value->destacarAsunto();
        }
    }
    actualizarFichero();
}
// si es dado el boton de retrasar
if (isset($_REQUEST['retrasar'])) {
    foreach ($_SESSION['usuarios'] as $index => $value) {
        if ($value->getEmisor() == $_SESSION['usuarioActivo']) {
            $value->retrasarEnvio();
        }
    }
    actualizarFichero();
}
header('Location: index.php');
