<?php
function obtenerObrasPorQuery()
{
    $array = array("japanese", "venus", "jesus", "omori", "guido", "Massimiliano");
    $query = urlencode($array[array_rand($array)]);

    // API para obtener objetos
    $apiUrl = "https://collectionapi.metmuseum.org/public/collection/v1/search?q=$query&hasImages=true";
    $respuesta = @file_get_contents($apiUrl);
    if ($respuesta === FALSE) {
        return [];
    }

    $data = json_decode($respuesta, true);
    $obras = [];

    if (!empty($data['objectIDs'])) {
        $objectIDs = array_slice($data['objectIDs'], 0, 20);
        foreach ($objectIDs as $id) {
            $objectUrl = "https://collectionapi.metmuseum.org/public/collection/v1/objects/$id";
            $respObject = @file_get_contents($objectUrl);
            if ($respObject === FALSE) continue;

            $artworkDetails = json_decode($respObject, true);

            if ("" != ($artworkDetails['primaryImageSmall']) && "" != ($artworkDetails['title']) 
            && "" != ($artworkDetails['artistDisplayName'])) {
                $obras[] = $artworkDetails;
            }
        }
    }
    return $obras;
}
