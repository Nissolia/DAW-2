<?php
// Escribe aquí tu código
$db_host = "localhost";
$db_nombre = "examen_ajax_prevision";
$db_usuario = "root";
$db_contraseña = "";
$db_charset = "utf8";

try {
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre;charset=$db_charset", $db_usuario, $db_contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

if (isset($_GET['localidad']) && is_numeric($_GET['localidad'])) {
    $localidad = intval($_GET['localidad']);
    $vec = [];

    $consulta = $conexion->prepare("
    SELECT localidades.nombre AS localidad, prevision.hora, prevision.temperatura, prevision.icono, prevision.viento, prevision.velocidad, prevision.lluvias
    FROM prevision
    JOIN localidades ON prevision.idlocalidad = localidades.id
    WHERE prevision.idlocalidad = :localidad
");
    $consulta->bindParam(':localidad', $localidad, PDO::PARAM_INT);
    $consulta->execute();


    while ($reg = $consulta->fetchObject()) {
        $vec[] = $reg;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($vec);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => 'Parámetro localidad requerido y debe ser un número.']);
}


// try {
//     $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre;charset=$db_charset", $db_usuario, $db_contraseña);
//     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die ("Error en la conexión: " . $e->getMessage());
// }

// if (isset($_GET['localidad']) && is_numeric($_GET['localidad'])) {
//     $localidad = intval($_GET['localidad']);
//     $vec = [];
    
//     $consulta = $conexion->prepare("SELECT id, hora, temperatura, icono, viento, velocidad, lluvias FROM prevision WHERE idlocalidad = :localidad");
//     $consulta->bindParam(':localidad', $localidad, PDO::PARAM_INT);
//     $consulta->execute();
    
//     while ($reg = $consulta->fetchObject()) {
//         $vec[] = $reg;
//     }

//     header('Content-Type: application/json; charset=utf-8');
//     echo json_encode($vec);
// } else {
//     header('Content-Type: application/json; charset=utf-8');
//     echo json_encode(['error' => 'Parámetro localidad requerido y debe ser un número.']);
// }
