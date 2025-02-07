<!-- Una función denominada obtenerSuma (tipo función, devolverá un valor numérico) que reciba una ruta de archivo
como parámetro, lea los números existentes en cada línea del archivo, y devuelva la suma de todos esos números. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  <h2>Sube un archivo de texto con números</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="archivo">Selecciona el archivo de texto (con números en cada línea):</label>
        <input type="file" name="archivo" id="archivo" required><br><br>

        <input type="submit" value="Calcular Suma">
    </form>

    <?php
    // Función para leer el archivo y calcular la suma de los números
    function obtenerSumaDesdeArchivo($archivo) {
        // Comprobar si el archivo es válido
        if (file_exists($archivo)) {
            // Leer todo el contenido del archivo en un array, cada línea es un elemento
            $contenido = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            // Inicializar la variable de suma
            $suma = 0;

            // Recorrer cada línea del archivo y sumar los valores
            foreach ($contenido as $linea) {
                // Asegurarse de que la línea sea numérica
                if (is_numeric(trim($linea))) {
                    $suma += trim($linea); // Sumar el número
                }
            }

            return $suma; // Devolver la suma total
        } else {
            return "El archivo no existe o no es válido.";
        }
    }

    // Comprobar si se ha enviado un archivo
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['archivo'])) {
        // Obtener el archivo subido
        $rutaArchivo = $_FILES['archivo']['tmp_name'];

        // Llamar a la función para obtener la suma desde el archivo
        $sumaTotal = obtenerSumaDesdeArchivo($rutaArchivo);

        // Mostrar el resultado
        if (is_numeric($sumaTotal)) {
            echo "<p>La suma de los números en el archivo es: $sumaTotal</p>";
        } else {
            echo "<p>Error: $sumaTotal</p>";
        }
    }
    ?>
</body>
</html>