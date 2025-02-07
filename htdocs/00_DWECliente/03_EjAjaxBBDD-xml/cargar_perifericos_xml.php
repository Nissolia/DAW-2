<?php
require_once 'config.php'; // Incluir el archivo de configuración
require_once 'Periferico.php'; // Incluir la clase Periferico

sleep(2);

try {
    // Crear una nueva conexión PDO usando las variables del archivo de configuración
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre;charset=$db_charset", $db_usuario, $db_contraseña);
    // Configurar el modo de error de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("Error en la conexión: " . $e->getMessage());
}

$vec = []; 

$consulta = $conexion->query("SELECT codigo, descripcion, precio,descuento FROM perifericos");

while ($reg = $consulta->fetchObject()) {
  $vec[] = new Periferico($reg->codigo, $reg->descripcion, $reg->precio, $reg->descuento);
}


// Crear la estructura XML usando SimpleXMLElement
$xmlstr = "<?xml version='1.0' encoding='UTF-8'?>\n".
          "<perifericos></perifericos>";
$xml = new SimpleXMLElement($xmlstr);

foreach ($vec as $periferico) {
    $item = $xml->addChild('periferico');
    $item->addChild('codigo', $periferico->codigo);
    $item->addChild('descripcion', $periferico->descripcion);
    $item->addChild('precio', $periferico->precio);
    $item->addChild('descuento', $periferico->descuento);
}

// Configurar el encabezado para XML
header('Content-Type: application/xml; charset=utf-8');
// Imprimir el XML generado
print $xml->asXML();
?>
