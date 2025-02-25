<?php
require_once 'config.php';
require_once 'Lluvia.php';

sleep(2);

try {
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre;charset=$db_charset", $db_usuario, $db_contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

$datos = [];

$consulta = $conexion->query("SELECT mes, lluvia FROM lluvias");
while ($reg = $consulta->fetchObject()) {
    $datos[] = new Lluvia(null,$reg->mes, $reg->lluvia);
}

print json_encode($datos);  
header('Content-Type: application/json; charset=utf-8');
