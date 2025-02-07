<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Juego de Traducción</h1>

    <?php
    // Definir el mini diccionario español-inglés
    $diccionario = [
        "hola" => "hello",
        "adiós" => "goodbye",
        "por favor" => "please",
        "gracias" => "thank you",
        "sí" => "yes",
        "no" => "no",
        "buenos días" => "good morning",
        "buenas noches" => "good night",
        "¿cómo estás?" => "how are you?",
        "bien" => "well",
        "mal" => "bad",
        "perro" => "dog",
        "gato" => "cat",
        "casa" => "house",
        "libro" => "book",
        "comida" => "food",
        "agua" => "water",
        "escuela" => "school",
        "trabajo" => "work",
        "amigo" => "friend"
    ];

    // Seleccionar 5 palabras aleatorias
    if (!isset($_POST['palabrasSeleccionadas'])) {
        // Si no se han seleccionado aún, seleccionar 5 palabras aleatorias
        $palabrasSeleccionadas = array_rand($diccionario, 5);
    } else {
        // Si ya se seleccionaron palabras, recuperarlas
        $palabrasSeleccionadas = explode(',', $_POST['palabrasSeleccionadas']);
    }

    // Comprobar si se han enviado respuestas
    if (isset($_POST['traducciones'])) {
        $respuestasCorrectas = 0;
        $respuestasIncorrectas = 0;

        echo "<h2>Resultados:</h2>";
        echo "<table class='table'>";
        echo "<tr ><th class='td'>Palabra en Español</th><th class='td'>Traducción Ingresada</th><th class='td'>Traducción Correcta</th><th class='td'>Resultado</th></tr>";

        // Recorrer las palabras seleccionadas para verificar las respuestas
        foreach ($palabrasSeleccionadas as $palabraEspañol) {
            // Verificar si la traducción de la palabra fue enviada
            if (isset($_POST['traducciones'][$palabraEspañol])) {
                $traduccionIngresada = $_POST['traducciones'][$palabraEspañol];
                $traduccionCorrecta = $diccionario[$palabraEspañol];

                // Comparar la traducción ingresada con la correcta
                if (strtolower(($traduccionIngresada)) === strtolower($traduccionCorrecta)) {
                    $respuestasCorrectas++;
                    echo "<tr><td class='td' > $palabraEspañol</td><td class='td' > $traduccionIngresada</td><td class='td' > $traduccionCorrecta</td><td class='td' style='color: green;'>Correcto</td></tr>";
                } else {
                    $respuestasIncorrectas++;
                    echo "<tr><td class='td' > $palabraEspañol</td><td class='td' > $traduccionIngresada</td><td class='td' > $traduccionCorrecta</td><td class='td' style='color: red;'>Incorrecto</td></tr>";
                }
            }
        }

        echo "</table class='table'>";
        echo "<p>Respuestas correctas: $respuestasCorrectas</p>";
        echo "<p>Respuestas incorrectas: $respuestasIncorrectas</p>";
    } else {
        // Mostrar el formulario para ingresar traducciones
        echo '<form method="POST">';
        echo '<h2>Traduce las siguientes palabras:</h2>';

        // Mostrar las palabras seleccionadas y un campo de texto para la traducción
        foreach ($palabrasSeleccionadas as $palabraEspañol) {
            echo "<p><strong>$palabraEspañol</strong> : <input class='input' type='text' name='traducciones[$palabraEspañol]' required></p><br>";
        }

        // Guardar las palabras seleccionadas en un campo oculto
        echo "<input class='input' type='hidden' name='palabrasSeleccionadas' value='" . implode(',', $palabrasSeleccionadas) . "'>";
        echo "<input class='boton' type='submit' value='Enviar respuestas'>";
        echo '</form>';
    }
    ?>

</body>

</html>
