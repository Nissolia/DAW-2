<?php
session_start();

// función para crear un color en formato RGB
function generarColor(){
    $r = rand(0, 255); 
    $g = rand(0, 255);
    $b = rand(0, 255);
    // devuelve el formato en RGB
    return "rgb($r, $g, $b)";
}

// funcion para obtener el código en reverso, puramente estético
function invertirColor($color){
    $valoresRGB = explode(',', str_replace(['rgb(', ')'], '', $color));

    // valores de RGB estarán en el array valoresRGB
    $rInvertir = 255 - (int)$valoresRGB[0];
    $gInvertir = 255 - (int)$valoresRGB[1];
    $bInvertir = 255 - (int)$valoresRGB[2];
// devolvemos el formato en RGB
    return "rgb($rInvertir, $gInvertir, $bInvertir)";
}

// si le damos al formulario de añadir color se ejecuta esta parte
if (isset($_POST['añadir_color'])) {
    $nuevo_color = generarColor();
    // generamos el color y lo añadimos al array que tenemos de colores
    $_SESSION['colores'][] = $nuevo_color; 
    // ponemos el color en el fondo actual
    $color = $nuevo_color;
} else if (isset($_POST['mostrar_paleta'])) {
    //si el usuario le da al boton de mostrar paleta le dirige a paleta
    header('Location: paleta.php'); 
    exit;
} 
// miramos si ya existen los numeros en la sesion
if (!isset($_SESSION['colores'])) {
    //iniciamos el array si no existe el array
    $_SESSION['colores'] = []; 
} else {
    echo "<p>Colores creados: " . count($_SESSION['colores'])."</p>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        body {
            text-align: center;
            background-color: <?= isset($color) ? $color : 'rgb(255,255,255)'; ?>;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        button {
            background-color: <?= isset($color) ? invertirColor($color) : 'rgb(0,0,0)'; ?>;
            color: <?= isset($color) ? $color : 'rgb(255,255,255)'; ?>;
            font-weight: bold;
            border: none;
            padding: 15px;
            border-radius: 10px;
            margin: 5px;
        }

        button:hover {
            text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<!-- Crear una página principal con un botón 'Añadir color' para generar un color aleatorio que además se
establecerá como color de fondo de la página, cada vez que se pulsa irá generando un color nuevo (actualizando
el fondo), que se irán almacenando en un array de sesión. Habrá un segundo botón 'Mostrar paleta creada' que
dirige a una segunda página que mostrará una paleta con los colores generados. Esta paleta no es más que una
tabla con un máximo de 5 celdas por cada fila, y en cada celda se muestra un color de los generados. Debajo
de la tabla tendremos 2 botones uno para volver a la página principal y seguir añadiendo colores a la paleta y
otro para destruir la sesión y generar una paleta nueva. Además al pulsar en cada celda de la tabla el color de
fondo de la página cambiará al color de la celda pulsada.
 -->

<body>

    <!-- Botón para añadir un color aleatorio -->
    <form action="" method="post">
        <button type="submit" name="añadir_color">Añadir Color</button>
    </form>

    <!-- Botón para ver la paleta creada -->
    <form action="paleta.php" method="post">
        <button type="submit" name="mostrar_paleta">Mostrar Paleta Creada</button>
    </form>
</body>

</html>