<?php
require_once 'DB.php';

$codEstado = 400;
$mensaje = 'Solicitud incorrecta';
$metodo = $_SERVER['REQUEST_METHOD'];
$devolver = [];

// Verificar si el token está presente
if (!isset($_REQUEST['token'])) {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode(['mensaje' => 'Acceso denegado: Token no proporcionado']);
    exit;
}

$token = $_REQUEST['token'];
$conexion = TiendaBD::connectDB();

// Validar el token en la base de datos
$consultaToken = $conexion->prepare("SELECT * FROM clientes WHERE token = ?");
$consultaToken->execute([$token]);
$cliente = $consultaToken->fetch();

if (!$cliente) {
    header("HTTP/1.1 403 Forbidden");
    echo json_encode(['mensaje' => 'Token inválido']);
    exit;
}

// Incrementar el número de peticiones del cliente
$conexion->prepare("UPDATE clientes SET peticiones = peticiones + 1 WHERE token = ?")
        ->execute([$token]);

// Manejar las solicitudes
if ($metodo == 'GET') {
    if (isset($_REQUEST['nombre'])) {
        // Buscar productos por nombre
        $nombre = "%" . $_REQUEST['nombre'] . "%";
        $consulta = $conexion->prepare("SELECT nombre, precio, url_imagen FROM productos WHERE nombre LIKE ?");
        $consulta->execute([$nombre]);
        $devolver['productos'] = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } elseif (isset($_REQUEST['precio_min']) && isset($_REQUEST['precio_max'])) {
        // Buscar productos por rango de precio
        $precioMin = $_REQUEST['precio_min'];
        $precioMax = $_REQUEST['precio_max'];
        $consulta = $conexion->prepare("SELECT nombre, precio, url_imagen FROM productos WHERE precio BETWEEN ? AND ?");
        $consulta->execute([$precioMin, $precioMax]);
        $devolver['productos'] = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    if (empty($devolver['productos'])) {
        $mensaje = "SIN RESULTADOS";
        $codEstado = 404;
    } else {
        $mensaje = "OK";
        $codEstado = 200;
    }
} else {
    $mensaje = "Método no permitido";
    $codEstado = 405;
}

// Responder al cliente
header("HTTP/1.1 $codEstado $mensaje");
header('Content-Type: application/json');
echo json_encode($devolver);
