<!-- Una función denominada obtenerArrNum (tipo función, devolverá un array de valores numéricos) que reciba una
ruta de archivo como parámetro, lea los números existentes en cada línea del archivo, y devuelva un array cuyo
índice 0 contendrá el número existente en la primera línea, cuyo índice 1 contendrá el número existente en la
segunda línea y así sucesivamente (no usar la función file). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  <h2>Introduce el nombre de un archivo de texto con números</h2>
    <form method="post">
        <p>Introduce el nombre del archivo (ejemplo: archivo.txt):</p>
        <input type="text" name="nombreArchivo" required><br><br>

        <input type="submit" value="Calcular Suma y Guardar">
    </form>

    <?php
    // Función para leer los números de un archivo y devolver un array de valores numéricos
    function obtenerArrNum($archivo) {
        $numeros = [];

        // Comprobar si el archivo existe
        if (file_exists($archivo)) {
            // Abrir el archivo en modo lectura
            $fichero = fopen($archivo, 'r');
            if (!$fichero) {
                return "No se pudo abrir el archivo.";
            }

            // Leer el archivo línea por línea usando fgets
            while ($linea = fgets($fichero)) {
                // Verificar si la línea es numérica y agregarla al array
                if (trim($linea)) {
                    $numeros[] = trim($linea); 
                
                }
            }

            // Cerrar el archivo después de leerlo
            fclose($fichero);

            return $numeros; 
        } else {
            return "El archivo no existe o no es válido.";
        }
    }

    // Función para calcular la suma y guardar los números y la suma en el archivo
    function guardarSuma($archivo) {
        // Obtener los números del archivo
        $numeros = obtenerArrNum($archivo);

        if (is_array($numeros)) {
            $suma = array_sum($numeros); // Calcular la suma

            // Generar el contenido a guardar en el archivo
            $nuevoContenido = implode(PHP_EOL, $numeros) . PHP_EOL;
            $nuevoContenido .= "Suma total: " . $suma . PHP_EOL;

            // Abrir el archivo en modo escritura (sobrescribir el archivo existente)
            $ficheroEscritura = fopen($archivo, 'w');
            if (!$ficheroEscritura) {
                return "No se pudo abrir el archivo para escribir.";
            }

            // Escribir el nuevo contenido en el archivo usando fwrite
            fwrite($ficheroEscritura, $nuevoContenido);

            // Cerrar el archivo después de escribir
            fclose($ficheroEscritura);

            return "La suma de los números es: $suma. Los números y la suma se han guardado en '$archivo'.";
        } else {
            return $numeros; // Mensaje de error si no es un array
        }
    }

    // Procesar la solicitud del formulario
    if (isset($_REQUEST['nombreArchivo'])) {
        // Obtener el nombre del archivo ingresado por el usuario
        $nombreArchivo = trim($_REQUEST['nombreArchivo']);

        // Verificar si el archivo tiene la extensión .txt
        if (substr($nombreArchivo, -4) !== ".txt") {
            $nombreArchivo .= ".txt"; // Añadir la extensión .txt si no está presente
        }

        // Llamar a la función para obtener la suma y guardar el resultado
        $mensaje = guardarSuma($nombreArchivo);

        // Mostrar el mensaje con el resultado
        echo "<p>$mensaje</p>";
    }
    ?>
</body>
</html>