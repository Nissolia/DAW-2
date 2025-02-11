<?php

// URL de la API
$apiUrl = 'http://tuservidor.com/api/productos.php'; // Cambia la URL por la correcta de tu servidor
$token = 'tu_token_aqui';  // El token que se va a enviar
$nombreProducto = 'camisa'; // Ejemplo de producto a buscar
$precioMin = 10;  // Precio mínimo
$precioMax = 50;  // Precio máximo

// Función para realizar la solicitud GET
function hacerSolicitudGET($url, $token, $params = []) {
    // Construir la URL con los parámetros
    $url .= '?token=' . urlencode($token);

    // Añadir parámetros adicionales si existen
    foreach ($params as $key => $value) {
        $url .= '&' . urlencode($key) . '=' . urlencode($value);
    }

    // Realizar la solicitud GET usando file_get_contents
    $respuesta = file_get_contents($url);

    // Verificar si hubo un error al obtener el contenido
    if ($respuesta === FALSE) {
        return null;
    }

    // Decodificar el JSON de la respuesta
    return json_decode($respuesta, true);
}

// Llamada a la API para buscar productos por nombre
$params = ['nombre' => $nombreProducto];  // Puedes enviar otros parámetros, como nombre, precio_min, precio_max
$response = hacerSolicitudGET($apiUrl, $token, $params);

// Mostrar la respuesta en la página
if ($response) {
    if (isset($response['productos'])) {
        echo "<h2>Productos encontrados:</h2>";
        echo "<ul>";
        foreach ($response['productos'] as $producto) {
            echo "<li><strong>Nombre:</strong> " . htmlspecialchars($producto['nombre']) . "<br>";
            echo "<strong>Precio:</strong> " . htmlspecialchars($producto['precio']) . "<br>";
            echo "<strong>Imagen:</strong> <img src='" . htmlspecialchars($producto['url_imagen']) . "' alt='" . htmlspecialchars($producto['nombre']) . "'><br><br></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron productos o hubo un error.</p>";
    }
} else {
    echo "<p>Hubo un problema al hacer la solicitud a la API.</p>";
}

// Llamada a la API para buscar productos por precio
$params = ['precio_min' => $precioMin, 'precio_max' => $precioMax];
$response = hacerSolicitudGET($apiUrl, $token, $params);

// Mostrar la respuesta en la página
if ($response) {
    if (isset($response['productos'])) {
        echo "<h2>Productos encontrados en el rango de precio:</h2>";
        echo "<ul>";
        foreach ($response['productos'] as $producto) {
            echo "<li><strong>Nombre:</strong> " . htmlspecialchars($producto['nombre']) . "<br>";
            echo "<strong>Precio:</strong> " . htmlspecialchars($producto['precio']) . "<br>";
            echo "<strong>Imagen:</strong> <img src='" . htmlspecialchars($producto['url_imagen']) . "' alt='" . htmlspecialchars($producto['nombre']) . "'><br><br></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron productos o hubo un error en el rango de precio.</p>";
    }
} else {
    echo "<p>Hubo un problema al hacer la solicitud a la API.</p>";
}

?>
