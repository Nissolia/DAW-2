<?php
$mysqli = new mysqli("localhost", "root", "", "examen_ajax_cine");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$codiDirec = $_POST['CodiDirec'];

$query = "SELECT Titulo, Año, Productora FROM films WHERE Director = $codiDirec";
$resultado = $mysqli->query($query);

while ($reg = mysqli_fetch_array($resultado)) {
    $vec[] = $reg;
}

header("Content-Type: text/xml");
$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$xml .= "<peliculas>\n";
foreach ($vec as $reg) {
    $xml .= "<pelicula>\n";
    $xml .= "<titulo>" . $reg['Titulo'] . "</titulo>\n";
    $xml .= "<año>" . $reg['Año'] . "</año>\n";
    $xml .= "<productora>" . $reg['Productora'] . "</productora>\n";
    $xml .= "</pelicula>\n";
}

$xml .= "</peliculas>\n";

$mysqli->close();

echo $xml;