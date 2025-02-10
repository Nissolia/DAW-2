<?php
// Configuración
// $api_url = "http://localhost//00_DWEServidor/12_servicios-web/ej7_3/Servidor/servicio.php"; // URL del servicio
$api_url = "D:/Noelia/dev/htdocs/00_DWEServidor/12_servicios-web/ej7_3/Servidor/servicio.php"; // URL del servicio

$token = "abc123"; // Token del cliente (debe estar registrado en la BBDD)

// Recoger parámetros de búsqueda del formulario
$params = [];
if (!empty($_GET['nombre'])) {
    $params['nombre'] = $_GET['nombre'];
}
if (!empty($_GET['min_precio'])) {
    $params['min_precio'] = $_GET['min_precio'];
}
if (!empty($_GET['max_precio'])) {
    $params['max_precio'] = $_GET['max_precio'];
}

// Construir la URL solo con los parámetros que están definidos
$url = $api_url . '?' . http_build_query($params);

// Realizar la solicitud solo si hay filtros seleccionados
$resultados = [];
if (!empty($params)) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Token: $token"]);
    $response = curl_exec($ch);
    curl_close($ch);

    $resultados = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Productos - Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { margin: 20px auto; width: 50%; }
        label { font-weight: bold; }
        input, button { margin: 5px; padding: 10px; width: 80%; max-width: 300px; }
        table { width: 60%; margin: 20px auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
        img { max-width: 100px; }
    </style>
</head>
<body>

    <h1>Buscar Productos</h1>
    <form method="GET">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre">
        <br>
        
        <label for="min_precio">Precio Mínimo:</label>
        <input type="number" id="min_precio" name="min_precio" min="0">
        <br>

        <label for="max_precio">Precio Máximo:</label>
        <input type="number" id="max_precio" name="max_precio" max="99999">
        <br>

        <button type="submit">Buscar</button>
    </form>

    <?php if (!empty($resultados) && !isset($resultados['error'])): ?>
        <h2>Resultados</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
            <?php foreach ($resultados as $producto): ?>
                <tr>
                    <td><?= ($producto['nombre']) ?></td>
                    <td><?= ($producto['precio']) ?> €</td>
                    <td><img src="<?= ($producto['imagen']) ?>" alt="Imagen del producto"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (!empty($resultados['error'])): ?>
        <p style="color: red;"><strong>Error:</strong> <?= ($resultados['error']) ?></p>
    <?php elseif (!empty($_GET)): ?>
        <p>No se encontraron productos.</p>
    <?php endif; ?>

</body>
</html>
