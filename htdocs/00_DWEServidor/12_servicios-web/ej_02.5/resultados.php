<?php
session_start();
// Si no hay intentos o acertados en la sesión, redirigir al juego
if (!isset($_SESSION['intentos']) || !isset($_SESSION['acertados'])) {
    header('Location: index.php');
    exit();
}
// Recogemos los valores de los intentos y aciertos
$intentosRestantes = $_SESSION['intentos'];
$acertados = $_SESSION['acertados'];
// Finaliza la sesión una vez que se llega a la pag de resultados
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Juego</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
    <h2>Resultados del Juego</h2>
    <div class="resultados">
        
            <p class="intentos"><b>Intentos restantes:</b> <?= $intentosRestantes ?></p>
            <p class="acertados"><b>Acertados:</b> <?= $acertados ?></p>
            <hr>
            <p><b>¡Juego terminado!</b></p>
     
    </div>

    <a href="cargar_obras.php" class="boton">Volver a jugar</a>
</body>
</html>
