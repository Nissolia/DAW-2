<?php
header("Content-Type: application/json");
require_once "conexion.php"; // Archivo para conectar a la BD

$conn = conectarDB(); // Conexión a la base de datos

// Verificar si se recibió un token en la petición
if (!isset($_SERVER['HTTP_TOKEN'])) {
    echo json_encode(["error" => "Token no proporcionado"]);
    exit;
}

$token = $_SERVER['HTTP_TOKEN'];

// Verificar que el token es válido
$query = $conn->query("SELECT * FROM clientes WHERE token = '$token'");
$cliente = $query->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
    echo json_encode(["error" => "Token inválido"]);
    exit;
}

// Contar la petición del cliente
$conn->query("UPDATE clientes SET peticiones = peticiones + 1 WHERE token = '$token'");

// Construcción de la consulta dinámica
$sql = "SELECT nombre, precio, imagen FROM productos WHERE 1=1";

if (!empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $sql .= " AND nombre LIKE '%$nombre%'";
}

if (!empty($_GET['min_precio']) && !empty($_GET['max_precio']) && $_GET['min_precio'] <= $_GET['max_precio']) {
    $min_precio = $_GET['min_precio'];
    $max_precio = $_GET['max_precio'];
    $sql .= " AND precio BETWEEN $min_precio AND $max_precio";
}

// Ejecutar la consulta con query()
$query = $conn->query($sql);
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);

// Enviar respuesta en JSON
echo json_encode($resultados);
?>
