<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej.4 Llamar</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
    </style>
</head>
<body>
    <?php
    // Recibir los datos enviados
    if (isset($_POST['bloque']) && isset($_POST['piso'])) {
        $bloque = $_POST['bloque'];
        $piso = $_POST['piso'];

        echo "<h1>Has llamado al Bloque $bloque, Piso $piso</h1>";
    } else {
        echo "<h1>Error: No se recibieron datos.</h1>";
    }
    ?>
    <h2 class="boton"><a href="ej04-inicio.php">Volver a la Tabla</a></h2>
</body>
</html>
