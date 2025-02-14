<?php
header("Content-Type: application/json;charset=utf-8");

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fotografias";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    header("HTTP/1.1 500 Internal Server Error");
    die(json_encode(["mensaje" => "Conexión fallida: " . $conn->connect_error]));
}

// Función para consultar fotos por autor
function consultarFotosPorAutor($autor, $conn) {
    $stmt = $conn->prepare("SELECT nombre_archivo, url, likes FROM fotos WHERE id_autor = (SELECT id FROM autores WHERE nombre = ?)");
    $stmt->bind_param("s", $autor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fotos = [];
        while($row = $result->fetch_assoc()) {
            $fotos[] = [
                'nombre' => pathinfo($row['nombre_archivo'], PATHINFO_FILENAME),
                'url' => $row['url'],
                'likes' => $row['likes']
            ];
        }
        header("HTTP/1.1 200 OK");
        echo json_encode($fotos);
    } else {
        header("HTTP/1.1 404 Not Found");
        echo json_encode(["mensaje" => "No se encontraron fotos para el autor especificado."]);
    }
    $stmt->close();
}

// Función para modificar el autor de una foto
function modificarAutorFoto($id_foto, $id_usuario, $conn) {
    $stmt = $conn->prepare("UPDATE fotos SET id_autor = ? WHERE id = ?");
    $stmt->bind_param("ii", $id_usuario, $id_foto);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("HTTP/1.1 200 OK");
        echo json_encode(["mensaje" => "Autor de la foto actualizado correctamente."]);
    } else {
        header("HTTP/1.1 404 Not Found");
        echo json_encode(["mensaje" => "No se encontró la foto o el autor especificado."]);
    }
    $stmt->close();
}

// Manejo de las solicitudes
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['autor'])) {
    consultarFotosPorAutor($_GET['autor'], $conn);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_ID_FOTO']) && isset($_SERVER['HTTP_ID_USUARIO'])) {
    modificarAutorFoto($_SERVER['HTTP_ID_FOTO'], $_SERVER['HTTP_ID_USUARIO'], $conn);
} else {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(["mensaje" => "Solicitud no válida."]);
}

$conn->close();
?>