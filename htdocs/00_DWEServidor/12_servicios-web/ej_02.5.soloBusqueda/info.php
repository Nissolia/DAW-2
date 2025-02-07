<!-- https://metmuseum.github.io/ -->
<?php
if (isset($_POST['search'])) {
    // por si la persona mete espacios y que podamos buscarlo
    $query = urlencode($_POST['search']);
    $apiUrl = "https://collectionapi.metmuseum.org/public/collection/v1/search?q=$query";

    $Respuesta = file_get_contents($apiUrl);
    $data = json_decode($Respuesta, true);

    $artworks = [];
    if (!empty($data['objectIDs'])) {
        $objId = array_slice($data['objectIDs'], 0, 10); // Limitar a 5 resultados
        foreach ($objId as $id) {
            $artworkUrl = "https://collectionapi.metmuseum.org/public/collection/v1/objects/$id";
            $artworkRespuesta = file_get_contents($artworkUrl);
            $artworkData = json_decode($artworkRespuesta, true);
       
            if ($artworkData) {
                $artworks[] = $artworkData;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Obras - The Met Museum</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Buscar Obras en <a href="https://metmuseum.github.io/" target="_blank">The Met Museum</a></h2>
    <form method="post">
        <input type="text" name="search" placeholder="Ingrese un nombre..." required>
        <input class="boton" type="submit" value="Buscar">
    </form>


    <?php if (!empty($artworks)) { ?>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Artista</th>
                <th>Año</th>
            </tr>
            <?php foreach ($artworks as $artwork) { ?>
                <tr>
                    <td>
                        <!-- imagen que indique que no está la imagen -->
                        <?php if (!empty($artwork['primaryImageSmall'])) { ?>
                            <img src="<?= $artwork['primaryImageSmall'] ?>" alt="Imagen de la obra">
                        <?php } else if (count($artwork['additionalImages']) > 0) {
                            // si hay mas de un array en este apartado sale este apartado
                            foreach ($artwork['additionalImages'] as $images => $img) {
                                echo "  <img src='" . $img . "' alt='Imagen adicional'>";
                            }
                        } else {

                            echo " <i class='fa-solid fa-image'></i>";
                            // echo "  <img class='noImg' src='noImg.png' alt='No hay imagen disponible'>";
                        } ?>
                    </td>

                    <td>
                        <?php
                        if ($artwork['title'] == "") {
                            echo $artwork['title'];
                        } else {
                            echo "<i class='fa-solid fa-circle-exclamation'></i>";
                        }
                        ?>

                    </td>
                    <td>
                        <?php
                        if ($artwork['artistDisplayName'] == "") {
                            echo $artwork['artistDisplayName'];
                        } else {
                            echo "Desconocido";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($artwork['objectDate'] == "") {
                            echo $artwork['objectDate'];
                        } else {
                            echo "<i class='fa-solid fa-circle-exclamation'></i>";
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    <script src="https://kit.fontawesome.com/e521eb14dd.js" crossorigin="anonymous"></script>
</body>

</html>