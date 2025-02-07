<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción). Utiliza
un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra en español y
dará la correspondiente traducción en inglés. -->
    <h1>Mini Diccionario Español-Inglés</h1>

    <form method="POST">
        <label for="palabra">Introduce una palabra en español:</label>
        <input class="input" type="text" id="palabra" name="palabra" required>
      <br>  <input class="boton" type="submit" value="Traducir">
    </form>
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

    // Comprobar si se ha enviado el formulario
    if (isset($_REQUEST['palabra'])) {
        $palabra = $_REQUEST['palabra']; 
        // Convertir la palabra ingresada en minúsculas para evitar problemas de mayúsculas/minúsculas
        $palabra = strtolower($palabra);

        // Verificar si la palabra está en el diccionario
        if (array_key_exists($palabra, $diccionario)) {
            echo "<h1>Traducción:</h1>";
            echo "<p><strong>$palabra</strong> en inglés es <strong>{$diccionario[$palabra]}</strong>.</p>";
        } else {
            echo "<h2>Traducción no encontrada</h2>";
            echo "<p>La palabra <strong>$palabra</strong> no está en el diccionario.</p>";
        }
    }
    ?>
</body>


</body>

</html>