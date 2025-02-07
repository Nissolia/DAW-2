
<!-- Crear una página que permita generar un archivo de texto con las líneas que se vallan escribiendo a través de un
formulario de manera indefinida, hasta que se pulse un botón terminar, y a continuación mostrar el contenido del
fichero completo en la página. -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar archivo de texto</title>
</head>

<body>
    <h2>Generar archivo de texto con líneas</h2>

    <!-- Formulario para ingresar texto en el archivo -->
    <form method="post">
        <label for="linea">Escribe una línea:</label><br>
        <input type="text" name="linea" required><br><br>
        <input type="submit" name="agregar" value="Agregar Línea">
    </form>

    <br>

    <!-- Botón para finalizar -->
    <form method="post">
        <input type="submit" name="terminar" value="Terminar y Ver Archivo">
    </form>

    <?php
    // Nombre del archivo donde se guardarán las líneas
    $archivo = "archivo_generado.txt";

    // Si se hace clic en "Agregar Línea", se guarda la nueva línea en el archivo
    if (isset($_REQUEST['agregar'])) {
        // Obtener la línea introducida por el usuario
        $linea = trim($_REQUEST['linea']);

        // Abrir el archivo en modo de escritura y agregar la línea
        $fichero = fopen($archivo, "a");
        if ($fichero) {
            fwrite($fichero, $linea . PHP_EOL);  // Escribir la línea con salto de línea
            fclose($fichero);
            echo "<p>Línea agregada al archivo.</p>";
        } else {
            echo "<p>Error al abrir el archivo.</p>";
        }
    }

    // Si se hace clic en "Terminar y Ver Archivo", se muestra el contenido del archivo
    if (isset($_REQUEST['terminar'])) {
        if (file_exists($archivo)) {
            // Leer el contenido completo del archivo
            $contenido = file_get_contents($archivo);
            echo "<h3>Contenido del archivo:</h3>";
            echo "<pre>$contenido</pre>";
        } else {
            echo "<p>No se ha generado el archivo aún.</p>";
        }
    }
    ?>
</body>

</html>
