<?php

$db_host = "localhost";
$db_nombre = "examen_ajax_prevision";
$db_usuario = "root";
$db_contraseña = "";
$db_charset = "utf8";

try {
    // Crear una nueva conexión PDO usando las variables del archivo de configuración
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre;charset=$db_charset", $db_usuario, $db_contraseña);
    // Configurar el modo de error de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("Error en la conexión: " . $e->getMessage());
}

$vec = [];

$consulta = $conexion->query("SELECT id, nombre FROM localidades");
while ($reg = $consulta->fetchObject()) {
    $vec[] = $reg;
}

// $vec contiene un array de objetos Periferico

// var_dump($vec);die();

// Añadimos la cabecera de tipo JSON
header('Content-Type: application/json; charset=utf-8');
print json_encode($vec);  // json_encode convierte un array en formato JSON

?>