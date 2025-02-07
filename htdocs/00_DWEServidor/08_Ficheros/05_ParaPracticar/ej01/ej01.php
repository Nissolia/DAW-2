<!-- Una función (tipo procedimiento, no hay valor devuelto) denominada 
 escribirTresNumeros que reciba tres números
enteros como parámetros y proceda a escribir dichos números en tres líneas 
en un archivo denominado
datosEjercicio.txt. Si el archivo no existe, debe crearlo.
3 nums de fichero - nombre fichero
ver un fichero
carga el txt compreto, lo muestra
-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 1</title>
</head>

<body>
    <h2>Escribe tres números en un fichero</h2>
    <!-- Formulario para escribir los tres números -->
    <form action="" method="post">
        <label>Número 1: </label>
        <input type="number" name="num[]" required><br>
        <label>Número 2: </label>
        <input type="number" name="num[]" required><br>
        <label>Número 3: </label>
        <input type="number" name="num[]" required><br>

        <label>Nombre del fichero (sin extensión txt): </label>
        <input type="text" name="nombreFichero" required><br>
        <input type="submit" name="guardar" value="Guardar">
    </form>

    <br>
    <h2>Ver un fichero</h2>
    <!-- Formulario para ver el contenido de un fichero -->
    <form action="" method="post">
        <label>Nombre del fichero (sin extensión): </label>
        <input type="text" name="verFichero"><br>
        <input type="submit" name="ver" value="Aceptar">
    </form>
    <?php
    // Función para escribir tres números en un archivo
    function escribirNumeros($numeros, $nombreArchivo) {
        $archivo = $nombreArchivo . ".txt";

        // Abrir el archivo en modo de escritura (si no existe, lo crea)
        $fichero = fopen($archivo, 'w');
        if (!$fichero) {
            echo "<p>No se pudo abrir el archivo para escribir.</p>";
            return;
        }

        // Escribir los números en el archivo, cada uno en una línea
        foreach ($numeros as $numero) {
            fputs($fichero, $numero . PHP_EOL);
        }

        // Cerrar el archivo después de escribir
        fclose($fichero);

        echo "<p>Se guardaron los números en el archivo: $archivo</p>";
    }

    // Función para ver el contenido de un archivo
    function verFichero($nombreArchivo) {
        $archivo = $nombreArchivo . ".txt";

        if (file_exists($archivo) && is_readable($archivo)) {
            // Abrir el archivo en modo de lectura
            $fichero = fopen($archivo, 'r');
            if (!$fichero) {
                echo "<p>No se pudo abrir el archivo para leer.</p>";
                return;
            }

            // Leer y mostrar el contenido del archivo
            echo "<h3>Contenido del archivo $archivo:</h3><pre>";
            while ($linea = fgets($fichero)) {
                echo $linea;
            }
            echo "</pre>";

            // Cerrar el archivo después de leer
            fclose($fichero);
        } else {
            echo "<p>El archivo no existe o no es legible.</p>";
        }
    }

    // Manejo de formulario de guardar
    if (isset($_REQUEST['guardar'])) {
        // Obtener los números y el nombre del archivo
        $numeros = isset($_REQUEST['num']) ? $_REQUEST['num'] : [];
        $nombreFichero = isset($_REQUEST['nombreFichero']) ? trim($_REQUEST['nombreFichero']) : '';

        // Validar que se hayan recibido tres números
        if (count($numeros) === 3 && file_exists($nombreFichero)) {
            escribirNumeros($numeros, $nombreFichero);
        } else {
            echo "<p>Error: Asegúrate de ingresar tres números y un nombre de archivo válido.</p>";
        }
    }

    // Manejo de formulario de ver fichero
    if (isset($_REQUEST['ver'])) {
        // Obtener el nombre del archivo a mostrar
        $nombreFichero = trim($_REQUEST['verFichero'] ?? '');

        if (!empty($nombreFichero)) {
            verFichero($nombreFichero);
        } else {
            echo "<p>Por favor, ingresa el nombre del archivo para ver su contenido.</p>";
        }
    }
    ?>
</body>

</html>