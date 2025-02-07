<?php
// Libreria.php

function obtenerObrasPorDepartamento($departmentId, $query) {
    $url = "https://collectionapi.metmuseum.org/public/collection/v1/objects";
    $objectIDs = [];
    $page = 1;

    // Continuar buscando en la API hasta encontrar al menos 4 obras o hasta que no haya más resultados
    while (count($objectIDs) < 4) {
        $response = @file_get_contents($url . "?departmentIds=" . $departmentId . "&q=" . urlencode($query) . "&page=" . $page);
        if ($response === false) {
            die('Error al obtener los datos de la API.');
        }

        $data = json_decode($response, true);

        // Verificar que la API haya devuelto resultados válidos
        if (isset($data['objectIDs']) && !empty($data['objectIDs'])) {
            // Obtener los ID de las obras de la respuesta
            $objectIDs = array_merge($objectIDs, $data['objectIDs']);
        }

        // Si ya hemos encontrado al menos 4 obras, salimos del bucle
        if (count($objectIDs) >= 4) {
            break;
        }

        // Incrementamos la página para la siguiente búsqueda
        $page++;
    }

    // Devolver los primeros 4 ID de obras encontrados
    return array_slice($objectIDs, 0, 4);
}
