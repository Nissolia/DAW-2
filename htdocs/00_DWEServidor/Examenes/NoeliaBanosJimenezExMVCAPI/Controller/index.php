<?php
require_once '../Model/Incidencia.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();
$data['incidencias'] = Incidencia::getIncidenciasVisibles();

// nos pasa el usuario el nombre y lo comprobamos
if (isset($_REQUEST['usuario'])) {
    $comprobarUser = Usuario::getUsuarioByNombre(($_REQUEST['usuario']));
    // echo "<pre>";
    // print_r(Usuario::getUsuarioByNombre(($_REQUEST['usuario'])));
    // echo "</pre>";
    if ($_REQUEST['usuario'] == $comprobarUser->getNombre()) {
        $persona = Usuario::getUsuarioByNombre(($_REQUEST['usuario']));
        $_SESSION['usuario'] = $persona;
    } else {
        $nuevoUser = new Usuario(0, $_REQUEST['usuario'], 'user');
        $nuevoUser->insert();
        $_SESSION['usuario'] = $nuevoUser;
    }
}

if (isset($_REQUEST['descripcion'])) {
    $nuevaIncidencia = new Incidencia(null, $_REQUEST['descripcion'], $_SESSION['usuario']->getNombre());
    $nuevaIncidencia->insert();
}
if (!isset($_SESSION['usuario'])) {
    header('Location: ../Controller/login.php');
}
// mirar si la persona tiene id de admin
// echo "<pre>";
// print_r($_SESSION['usuario']);
// echo "</pre>";


if ($_SESSION['usuario']->getPerfil() == 'admin') {
    $data['esAdmin'] = true;
    // si recibo reparar he de cambiar el id del usuario
    if (isset($_REQUEST['reparar'])) {
        Usuario::cambioAdminIncidencias($_REQUEST['idIncidencia'], $_SESSION['usuario']->getId());
        $adIncidencia = Incidencia::getIncidenciaByAdmin($_SESSION['usuario']->getId());
        $adIncidencia->setEstado('REPARANDO');
        $adIncidencia->update();
    }
    if (isset($_REQUEST['soltar'])) {
        Usuario::cambioAdminIncidencias($_REQUEST['idIncidencia'], null);
        $adIncidencia = Incidencia::getIncidenciaByAdmin($_SESSION['usuario']->getId());
        $adIncidencia->setEstado('PENDIENTE');
        $adIncidencia->update();
    }
    if (isset($_REQUEST['finalizar'])) {
        $adIncidencia = Incidencia::getIncidenciaByAdmin($_SESSION['usuario']->getId());
        $adIncidencia->setEstado('RESUELTA');
        $adIncidencia->update();
    }
}

// Pasar los datos a la vista
include '../View/index_v.php';
