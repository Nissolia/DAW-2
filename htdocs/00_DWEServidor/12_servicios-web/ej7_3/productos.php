<?php
require_once 'TiendaDB.php';

$codEstado = 400;
$mensaje = 'Solicitud incorrecta';
$metodo = $_SERVER['REQUEST_METHOD'];
$devolver = [];

// Conexión a la base de datos
$conexion = TiendaDB::connectDB();

// Validar token
if (!isset($_GET['token'])) {
    $codEstado = 401;
    $mensaje = "Token no proporcionado";
} else {
    $token = $_GET['token'];
    $query = $conexion->prepare("SELECT * FROM clientes WHERE token = ?");
    $query->execute([$token]);
    $cliente = $query->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        $codEstado = 403;
        $mensaje = "Token inválido";
    } else {
        // Actualizar el número de peticiones del cliente
        $conexion->prepare("UPDATE clientes SET peticiones = peticiones + 1 WHERE token = ?")->execute([$token]);

        if ($metodo == 'GET') {
            if (isset($_GET['nombre'])) {
                // Buscar productos por nombre
                $nombre = $_GET['nombre'];
                $stmt = $conexion->prepare("SELECT nombre, precio, imagen FROM productos WHERE nombre LIKE ?");
                $stmt->execute(["%$nombre%"]);
            } elseif (isset($_GET['min_precio']) && isset($_GET['max_precio'])) {
                // Buscar productos por rango de precios
                $min = $_GET['min_precio'];
                $max = $_GET['max_precio'];
                $stmt = $conexion->prepare("SELECT nombre, precio, imagen FROM productos WHERE precio BETWEEN ? AND ?");
                $stmt->execute([$min, $max]);
            } else {
                $codEstado = 400;
                $mensaje = "Parámetros incorrectos";
            }

            if (isset($stmt)) {
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($productos) {
                    $devolver['productos'] = $productos;
                    $codEstado = 200;
                    $mensaje = "OK";
                } else {
                    $codEstado = 404;
                    $mensaje = "No se encontraron productos";
                }
            }
        }
    }
}

// Enviar respuesta en formato JSON
header("HTTP/1.1 $codEstado $mensaje");
header('Content-Type: application/json');
echo json_encode($devolver);
?>
