<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Usuario.php';

//Si recibimos 'cerrar' cerramos la sesión del usuario
if (isset($_REQUEST['cerrar'])) {
    unset ($_SESSION['usuario']);
}
//Si la sesion está iniciada redirige a index.php
if (isset($_SESSION['usuario'])) {
    header("location: ../Controller/index.php");
}
$data['mensaje']="";
//Si recibimos usuario y contraseña comprobamos para inciar sesión
if (isset($_REQUEST['usuario'],$_REQUEST['pass'])) {
    if ($usuario=Usuario::comprobar($_REQUEST['usuario'],$_REQUEST['pass'])){
        $_SESSION['usuario']=$usuario->getNombre();
        $_SESSION['id_usuario']=$usuario->getid();
        header("location: ../Controller/index.php");
        exit();
    }else {
        $data['mensaje']="Usuario o contraseña incorrectos";
    }
}
//carga la vista con el listado de productos
include '../View/login_V.php';

//Función que comprueba el stock de los productos en la cesta 
// y actualiza la cantidad de productos en la cesta si no hay stock suficiente
