<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Realiza un programa que escoja al azar 10 cartas de la baraja española
    y que diga cuántos puntos suman según el juego de la brisca. Emplea
    un array asociativo para obtener los puntos a partir del nombre de la
    figura de la carta. Asegúrate de que no se repite ninguna carta, igual
    que si las hubieras cogido de una baraja de verdad. -->

    <?php
    // definir los palos y las cartas con puntos
    $palos = ["oros", "espadas", "copas", "bastos"];
    $puntos = [1 => 11, 3 => 10, 12 => 4, 11 => 3, 10 => 2];
    // crear un array para todas las cartas
    $baraja = [];
    foreach ($palos as $palo) {
        for ($i = 1; $i <= 12; $i++) {
            // si la carta tiene puntos asignados, los añadimos, de lo contrario 0 puntos
            $baraja[] = [
                "carta" => $i,
                "palo" => $palo,
                "puntos" => isset($puntos[$i]) ? $puntos[$i] : 0
            ];
        }
    }
    // seleccionar 10 cartas al azar
    $indiceSeleccionados = array_rand($baraja, 10);
    // calcular la suma de los puntos
    $sumaPuntos = 0;
    // mostramos las cartas por pantalla
    echo "<h1>Cartas seleccionadas y puntos:</h1>";
    foreach ($indiceSeleccionados as $indice) {
        // obtener la carta usando un índice
        $carta = $baraja[$indice];
        echo "La carta es: {$carta['carta']} de {$carta['palo']} - Puntos: {$carta['puntos']}<br>";
        $sumaPuntos += $carta['puntos'];
    }
    // mostrar la suma total de los puntos
    echo "<h3>Total de puntos: $sumaPuntos</h3>";
    ?>

</body>

</html>