<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>

<body>
    <?php
    //Variables y como funcionan
    $var1 = "Esto es una variable";
    // Se concatena con puntos
    echo '<h1>' . $var1 . "</h1>";
    // **************************************
    // TIPOS DE DATOS:
    // Hay: Num, boleano, decimales, nulos...
    // Entero (int/integer)
    $entero = 99;
    // Decimales
    $decimales = 2.4;
    // Cadenas (String)
    $cadena = "Soy un string";
    // Booleanos
    $bool = true;
    // null
    $nulo = null;
    //array - coleccion de datos
    //objetos

    // **************************************
    //Esto dice que tipo de dato tiene dentro
    echo gettype($entero);
    // **************************************
    //Muestra que dato tiene, de donde viene, si es string la longitud
    var_dump($cadena);
    ?>
</body>

</html>