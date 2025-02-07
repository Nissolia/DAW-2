<?php
function cargarProductosDesdeArchivo($archivo) {
    $productos = [];

    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lineas as $indice => $linea) {
            // ignorar la cabecera en la primera línea si tiene columnas de texto
            if ($indice === 0 && str_contains($linea, 'codigo,nombre,precio,imagen,detalle')) {
                continue;
            }

            $datos = str_getcsv($linea); // Separar por comas
            // Validar que la línea tenga las 5 columnas necesarias
            if (count($datos) === 5) {
                $productos[$datos[0]] = [
                    'nombre' => $datos[1],
                    'precio' => (float)$datos[2],
                    'imagen' => $datos[3],
                    'detalle' => $datos[4],
                ];
            } else {
                // error si alguna línea no tiene el formato esperado
                error_log("Formato inválido en línea: $linea");
            }
        }
    } else {
        error_log("El archivo $archivo no existe.");
    }

    return $productos;
}

function cargarCatalogo($archivo) {
    $productos = [];
    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
        foreach ($lineas as $linea) {
            list($nombre, $precio, $imagen, $detalle) = explode('|', $linea);
            $productos[] = [
                'nombre' => $nombre,
                'precio' => (float) $precio,
                'imagen' => $imagen,
                'detalle' => $detalle,
            ];
        }
    }
    return $productos;
}

function guardarCatalogo($archivo, $productos) {
    $contenido = [];
    foreach ($productos as $producto) {
        $contenido[] = implode('|', $producto);
    }
    file_put_contents($archivo, implode(PHP_EOL, $contenido));
}
?>
