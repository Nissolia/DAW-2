<?php
require_once 'config.php'; // Archivo de configuración con las credenciales de la base de datos

sleep(1); // Simula un retardo para pruebas de rendimiento

try {
    // Conexión PDO con manejo de errores
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre;charset=$db_charset", $db_usuario, $db_contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si ocurre un error de conexión, mostrar mensaje
    die("Error en la conexión: " . $e->getMessage());
}

// Recuperar el ID de la comunidad autónoma desde el parámetro GET
$comunidad_id = isset($_GET['cod']) ? ($_GET['cod']) : 0;
$provincias = [];

// Verificar si el parámetro 'cod' es válido
if ($comunidad_id <= 0) {
    echo "<provincias><mensaje>ID de comunidad no válido o no especificado</mensaje></provincias>";
    exit;
}

// Obtener las provincias de la comunidad autónoma seleccionada
$query = $conexion->prepare("SELECT id, nombre FROM provincias WHERE comunidad = ?");
$query->execute([$comunidad_id]);

// Recoger las provincias en un array
while ($fila = $query->fetch(PDO::FETCH_OBJ)) {
    $provincias[] = [
        'id' => $fila->id,
        'nombre' => $fila->nombre
    ];
}

// Verifica si se obtuvieron provincias
if (count($provincias) === 0) {
    echo "<provincias><mensaje>No se encontraron provincias para esta comunidad</mensaje></provincias>";
    exit;
}

// Crear el XML usando SimpleXMLElement
$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?>\n<provincias></provincias>");

// Añadir las provincias al XML
foreach ($provincias as $provincia) {
    $item = $xml->addChild('provincia');
    $item->addChild('id', $provincia['id']);
    $item->addChild('nombre', $provincia['nombre']);
}

// Configurar el encabezado para indicar que la respuesta es XML
header('Content-Type: application/xml; charset=utf-8');

// Imprimir el XML generado
echo $xml->asXML();
?>
