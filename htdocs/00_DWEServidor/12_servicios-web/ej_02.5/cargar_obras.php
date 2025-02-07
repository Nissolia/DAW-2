<?php
session_start();
require 'libreria.php';

// Inicializar la sesión si no está inicializada
if (!isset($_SESSION['titulos_usados'])) {
    // Inicializamos como un array vacío si no existe
    $_SESSION['titulos_usados'] = [];
}

while (empty($seleccionadas)) {

    // Verificar si las obras están en sesión
    if (!isset($_SESSION['obras_disponibles']) || empty($_SESSION['obras_disponibles'])) {
        // Si no hay obras disponibles en sesión, obtenerlas desde la APIte
        $_SESSION['obras_disponibles'] = obtenerObrasPorQuery();
    }

    // Filtrar para evitar repetir títulos
    $uniqueArtworks = [];
    foreach ($_SESSION['obras_disponibles'] as $obra) {
        // Verificar si la obra tiene el campo 'title' antes de intentar acceder a él
        if (isset($obra['title']) && !in_array(trim($obra['title']), $_SESSION['titulos_usados'])) {
            $uniqueArtworks[] = $obra;
        }
    }

    // Si hay menos de 4 obras válidas, resetear
    if (count($uniqueArtworks) < 4) {
        $_SESSION['obras_disponibles'] = [];
        $_SESSION['titulos_usados'] = [];
        header("Refresh:0");
        exit();
    }
    // Seleccionar 4 obras aleatorias
    $seleccionadas = array_slice($uniqueArtworks, 0, 6);
    // Guardar las obras seleccionadas en la sesión
    $_SESSION['seleccionadas'] = $seleccionadas;
}
// Redirigir a la página de preguntas
header("Location: preguntas.php");
exit();
