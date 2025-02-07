<!-- Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa pedirá que el
usuario teclee la traducción al español de cada una de las palabras y comprobará si son correctas. Al final, el
programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. La aplicación debe tener una
opción para introducir los pares de palabras (inglés - español) que se deben guardar en cookies; de esta forma,
si de vez en cuando se dan de alta nuevas palabras, la aplicación puede llegar a contar con un número
considerable de entradas en el mini-diccionario. -->

<!-- listado, modificar palabra, eliminarla y todo eso -->
 <!-- modificar y eliminar, poner por defecto, eso en pagina a parte -->
<?php 
session_start();
if (!isset($_SESSION['diccionario'])) {
    // creamos el array del diccionario
    $_SESSION['diccionario'] = [
        "perro" => "dog",
        "gato" => "cat",
        "casa" => "house",
        "libro" => "book",
        "mesa" => "table",
        "cielo" => "sky",
        "mar" => "sea",
        "árbol" => "tree",
        "sol" => "sun",
        "estrella" => "star"
    ];
}

// si hay nuevo par de palabras, lo añadimos al diccionario en la sesión
if (isset($_REQUEST['nuevaEsp']) && isset($_REQUEST['nuevaIng'])) {
    $nuevaEsp = trim($_REQUEST['nuevaEsp']);
    $nuevaIng = trim($_REQUEST['nuevaIng']);
    // comprobamos que ambas palabras han sido enviadas
    if ($nuevaEsp && $nuevaIng) {
        $_SESSION['diccionario'][$nuevaEsp] = $nuevaIng;
    }
}

// tomamos 5 palabras aleatorias del array
$diccionario = $_SESSION['diccionario'];
$palabraAleatoria = array_rand($diccionario, 5);
// iniciamos el mensaje que saldrá por pantalla
$mensaje = '';
if (isset($_REQUEST['respuesta'])) {
//guardamos las respuestas del usuario
    $respuestaUser = $_REQUEST['respuesta'];
    $correctas = 0;

    foreach ($palabraAleatoria as $palabraEsp) {
        // confirmar si la clave existe antes de cambiar los valores
        if (isset($respuestaUser[$palabraEsp])) {
            //retiramos los espacios para poder comprobar como está todo
            $respuesta = trim($respuestaUser[$palabraEsp]);
            $traduccion = $diccionario[$palabraEsp];
            // si la respuestas es igual a la traduccion se da por correccta
            if (strtolower($respuesta) == strtolower($traduccion)) {
                $correctas++;
            }
        }
    }
$incorrectas = 5- $correctas;
    $mensaje = "Respuestas correctas: $correctas, Respuestas incorrectas: $incorrectas.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <h1>Mini-diccionario inglés-español</h1>

    <?php if ($mensaje) {
        //mensaje de las palabras correctas e incorrectas si mensaje tiene contenido
        echo " <p>$mensaje</p>";
    }
    ?>

    <!-- formulario de las palabras traducidas -->
    <form action="" method="post">
        <?php 
        foreach ($palabraAleatoria as $palabraEsp) {
            //mostramos las palabras para que la persona ponga la palabra en inglés
            echo "<label for='$palabraEsp'>" . ucfirst($palabraEsp) . ":</label>";
            echo "<input type='text' name='respuesta[$palabraEsp]'><br>";
        }
        ?>
        <input type="submit" value="Enviar respuestas">
    </form>
    <hr>

    <!-- formulario para nueva palabra -->
    <form action="" method="post">
        <input type="hidden" name="aniadir" value="true">
        <input type="submit" value="Añadir nueva palabra">
    </form>

    <?php 
    // muestra formulario si la persona le ha dado a añadir 
    if (isset($_POST['aniadir'])) {
        ?>
        <h2>Añadir nuevas palabras al diccionario</h2>
        <form action="" method="post">
            <label for="nuevaEsp">Palabra en español:</label>
            <input type="text" name="nuevaEsp" required>
            <br>
            <label for="nuevaIng">Palabra en inglés:</label>
            <input type="text" name="nuevaIng" required>
            <br>
            <input type="submit" value="Agregar palabra">
        </form>
        <?php
    }
    ?>
</body>
</html>
