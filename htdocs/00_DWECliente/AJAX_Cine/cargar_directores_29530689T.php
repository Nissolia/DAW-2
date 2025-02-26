<?php
$mysqli = new mysqli("localhost", "root", "", "examen_ajax_cine");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$query = "SELECT CodiDirec, Nombre FROM directores";
$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $directores[] = array("CodiDirec" => $row["CodiDirec"], "Nombre" => $row["Nombre"]);
    }
}

$mysqli->close();

echo json_encode($directores);
