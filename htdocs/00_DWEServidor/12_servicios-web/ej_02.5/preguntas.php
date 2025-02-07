<?php
session_start();
require 'libreria.php';

// Inicializar variables de sesión
$defaults = [
    'acertados' => 0,
    'intentos' => 3,
    'titulos_usados' => [],
    'respuestaCorrecta' => null,
    'obras_disponibles' => [],
    'obraAnterior' => null,
    'seleccionadas' => [],
    'mostrarError' => null
];

foreach ($defaults as $key => $value) {
    if (!isset($_SESSION[$key])) $_SESSION[$key] = $value;
}

// Redirigir si no hay obras
if (empty($_SESSION['seleccionadas'])) {
    header('Location: cargar_obras.php');
    exit();
}

// Manejar selección del usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seleccion'])) {
    // Recuperar la respuesta correcta almacenada en la sesión
    $respuestaCorrecta = $_SESSION['respuestaCorrecta'];
    $esCorrecto = $_POST['seleccion'] == $respuestaCorrecta['objectID'];

    if ($esCorrecto) {
        $_SESSION['acertados']++;
        $_SESSION['titulos_usados'][] = trim($respuestaCorrecta['title']);
        $_SESSION['obraAnterior'] = $respuestaCorrecta;
    } else {
        $_SESSION['intentos']--;
        $_SESSION['mostrarError'] = $respuestaCorrecta;
    }

    // Preparar nueva ronda o redirigir
    if ($_SESSION['acertados'] >= 5 || $_SESSION['intentos'] <= 0) {
        header('Location: resultados.php');
        exit();
    }

    // Actualizar obras disponibles
    $_SESSION['obras_disponibles'] = array_filter($_SESSION['obras_disponibles'], function ($obra) {
        return !in_array(trim($obra['title']), $_SESSION['titulos_usados']);
    });

    header('Location: preguntas.php');
    exit();
} else {
    // Generar nueva pregunta solo en solicitudes GET
    $_SESSION['respuestaCorrecta'] = $_SESSION['seleccionadas'][array_rand($_SESSION['seleccionadas'])];
}

// Mostrar información de la ronda anterior
$mostrarAnterior = $_SESSION['obraAnterior'] ?? null;
$mostrarError = $_SESSION['mostrarError'] ?? null;

// Limpiar datos anteriores después de mostrar
unset($_SESSION['obraAnterior']);
unset($_SESSION['mostrarError']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina la Obra</title>
    <link rel="stylesheet" href="style.css?v=1.0">

</head>

<body>
    <h1>Encuentra la obra del artista</h1>
    <h2>
        <span>Artista:</span> <?= $_SESSION['respuestaCorrecta']['artistDisplayName'] ?? 'Anónimo' ?><br>
        <span>Título:</span> <?= $_SESSION['respuestaCorrecta']['title'] ?? 'Sin título' ?>
    </h2>

    <div class="conteo">
        <p class="intentos"><b>Intentos restantes:</b> <?= $_SESSION['intentos'] ?></p>
        <p class="acertados"><b>Acertados:</b> <?= $_SESSION['acertados'] ?></p>
    </div>

    <?php if ($mostrarAnterior) { ?>
        <div class="acertado-box">
            <p>¡Correcto! Has acertado la obra:</p>
            <img src="<?= $mostrarAnterior['primaryImageSmall'] ?>"
                alt="<?= $mostrarAnterior['title'] ?>">
        </div>
    <?php
    } else if ($mostrarError) {
    ?>
        <div class="error-box">
            <p>¡Incorrecto! La respuesta correcta era:</p>
            <p><b><?= $mostrarError['title'] ?></b></p>
            <img src="<?= $mostrarError['primaryImageSmall'] ?>"
                alt="<?= $mostrarError['title'] ?>">
        </div>
    <?php }  ?>

    <div class="grid-container">
        <?php foreach ($_SESSION['seleccionadas'] as $obra) { ?>
            <form method="post" class="card">
                <figure>
                    <img src="<?= $obra['primaryImageSmall'] ?>"
                        alt="Imagen de la obra">
                </figure>
                <input type="hidden" name="seleccion" value="<?= $obra['objectID'] ?>">
                <input type="submit" class="boton" value="Seleccionar">
            </form>
        <?php } ?>
    </div>
</body>

</html>