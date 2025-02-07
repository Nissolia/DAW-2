<?php
session_start();
require 'libreria.php';  // Incluir la librería que ya tiene la función

// Obtener los departamentos de la API
$deptUrl = "https://collectionapi.metmuseum.org/public/collection/v1/departments";
$deptResponse = file_get_contents($deptUrl);
if ($deptResponse === false) {
    die('Error al obtener los departamentos de la API.');
}
$departmentsData = json_decode($deptResponse, true);
$departments = [];
if (!empty($departmentsData['departments'])) {
    $departments = $departmentsData['departments'];
}

// Procesar el formulario: se recibe el departmentId seleccionado
$selectedDepartmentId = isset($_POST['department']) ? intval($_POST['department']) : null;
$filteredArtists = [];

if ($selectedDepartmentId !== null) {
    // Obtener las obras para el departamento seleccionado (usando el query "painting")
    $artworks = obtenerObrasPorDepartamento($selectedDepartmentId, "painting");
    
    // Agrupar las obras por artista (para que cada artista aparezca solo una vez)
    $artists = [];
    foreach ($artworks as $artworkId) {
        $workUrl = "https://collectionapi.metmuseum.org/public/collection/v1/objects/" . $artworkId;
        $workResponse = @file_get_contents($workUrl);
        if ($workResponse !== false) {
            $workData = json_decode($workResponse, true);
            
            // Verificar que la obra tenga un nombre de artista y título
            if (isset($workData['artistDisplayName']) && !empty($workData['artistDisplayName']) && isset($workData['title']) && !empty($workData['title'])) {
                $artist = trim($workData['artistDisplayName']);
                if (!empty($artist)) {
                    if (!isset($artists[$artist])) {
                        $artists[$artist] = [];
                    }
                    $artists[$artist][] = $workData;
                }
            }
        }
    }

    // Filtrar para quedarnos solo con los artistas que tengan al menos 4 obras
    foreach ($artists as $artistName => $works) {
        if (count($works) >= 4) {
            $filteredArtists[$artistName] = $works;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Artistas por Departamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Buscar Artistas por Departamento</h1>

    <!-- Formulario para seleccionar el departamento -->
    <form method="post" action="">
        <label for="department">Selecciona el departamento: </label>
        <select name="department" id="department" required>
            <option value="">Seleccione un departamento</option>
            <?php foreach ($departments as $dept): ?>
                <option value="<?php echo $dept['departmentId']; ?>" <?php if (isset($selectedDepartmentId) && $selectedDepartmentId == $dept['departmentId']) echo "selected"; ?>>
                    <?php echo $dept['displayName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Buscar Artistas</button>
    </form>

    <?php if ($selectedDepartmentId !== null): ?>
        <?php if (empty($filteredArtists)): ?>
            <p style="text-align:center;">No se encontraron artistas con al menos 4 obras en este departamento.</p>
        <?php else: ?>
            <?php foreach ($filteredArtists as $artistName => $works): ?>
                <div class="artist">
                    <h2><?php echo htmlspecialchars($artistName); ?> (<?php echo count($works); ?> obras)</h2>
                    <div class="works">
                        <?php foreach ($works as $work): ?>
                            <div class="work">
                                <!-- Verificamos si existe la imagen y si no, usamos una predeterminada -->
                                <img src="<?php echo isset($work['primaryImageSmall']) && !empty($work['primaryImageSmall']) ? $work['primaryImageSmall'] : 'default-image.jpg'; ?>" alt="<?php echo htmlspecialchars($work['title']); ?>">
                                <p><?php echo htmlspecialchars($work['title']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
