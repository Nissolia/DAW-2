<?php
require_once 'config.php'; // Incluir el archivo de configuración
require_once 'Hueso.php'; // Incluir la clase hueso


try {
    // Crear una nueva conexión PDO usando las variables del archivo de configuración
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre;charset=$db_charset", $db_usuario, $db_contraseña);
    // Configurar el modo de error de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("Error en la conexión: " . $e->getMessage());
}

$vec = []; 

$consulta = $conexion->query("SELECT id,nombre_web,descripcion FROM huesos");

while ($reg = $consulta->fetchObject()) {
  $vec[] = new Hueso($reg->id, $reg->nombre_web, $reg->descripcion);
}

// Crear la estructura XML usando SimpleXMLElement
$xmlstr = "<?xml version='1.0' encoding='UTF-8'?>\n".
          "<huesos></huesos>";
$xml = new SimpleXMLElement($xmlstr);

foreach ($vec as $hueso) {
    $item = $xml->addChild('hueso');
    $item->addChild('id', $hueso->id);
    $item->addChild('nombre_web', $hueso->nombre_web);
    $item->addChild('descripcion', $hueso->descripcion);
}

// Configurar el encabezado para XML
header('Content-Type: application/xml; charset=utf-8');
// Imprimir el XML generado
print $xml->asXML();
?>
