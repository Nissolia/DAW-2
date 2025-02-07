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
    <h1>
        ¿Cuantas cartas quieres?
    </h1>
    <form action="ej10-modificado.php" method="post">
        <input class="input" type="number" name="numCartas">
        <input class="boton" type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_REQUEST['numCartas'])) {
        // definir los palos y las cartas con puntos
        $palos = ["oros", "espadas", "copas", "bastos"];
        $figura = [
            "as",
            "dos",
            "tres",
            "cuatro",
            "cinco",
            "seis",
            "siete",
            "sota",
            "caballo",
            "rey"
        ];
        $puntos = [
            "as" => 11,
            "dos" => 0,
            "tres" => 0,
            "cuatro" => 0,
            "cinco" => 0,
            "seis" => 0,
            "siete" => 0,
            "sota" => 2,
            "caballo" => 3,
            "rey" => 4
        ];
        // crear un array para todas las cartas
        $seleccionados = [];
        for ($i = 1; $i <= $_REQUEST['numCartas']; $i++) {
            do {
                // comprobamos que las figuras y los palos no se repitan en el array que ya tenemos creado
                $figura[$i] = $figura[rand(0, 9)];
                $palos[$i] = $palos[rand(0, 3)];
                $puntos[$figura[$i]];
            } while (in_array($figura[$i], $seleccionados) || in_array($palos[$i], $seleccionados));
            // si todo está correcto se guarda en el array
            $seleccionados[] = [
                "carta" =>   $figura[$i],
                "palo" =>  $palos[$i],
                "puntos" => $puntos[$figura[$i]]
            ];
        }
        // calcular la suma de los puntos
        $sumaPuntos = 0;
        // mostramos las cartas por pantalla
        echo "<h1>Cartas seleccionadas y puntos:</h1>";
        foreach ($seleccionados as $indice) {
            echo "La carta es: {$indice['carta']} de {$indice['palo']} - <b> Puntos:</b> {$indice['puntos']}<br>";
            $sumaPuntos += $indice['puntos'];
        }
        // mostrar la suma total de los puntos
        echo "<h3> <i> Total de puntos:</i> $sumaPuntos</h3>";
    }
    ?>

</body>

</html>