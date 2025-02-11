<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baraja</title>
    <style>
        img {
            width: 60px;
        }
    </style>
</head>

<body>
    <!-- Crea un servicio web que proporcione de forma aleatoria un mazo de cartas de la baraja española. Por la URL se
pasa el número de cartas que se quiere obtener y la aplicación provee el palo y la figura de cada una de las cartas.
Se supone que el mazo se obtiene de una baraja, por tanto, las cartas no se pueden repetir. Si el número que se pasa
en la URL es menor que 1 o mayor que 40, se debe devolver un error. -->
    <h1>Crear baraja de cartas</h1>
    <!-- <form action="../Servidor/crearBaraja.php"> -->
    <form action="" method="post">
        <input type="number" name="numero" min=1 max=40>
        <input type="submit" value="Crear baraja">
    </form>

    <?php

    if (isset($_REQUEST['numero'])) {
        $parametros =  '?numero=' . $_REQUEST['numero'];
        $conversion = @file_get_contents("http://localhost//00_DWEServidor/12_servicios-web/ej7_2/Servidor/crearBaraja.php" . $parametros);
        $respuesta = json_decode($conversion);
        echo "<br> Cabecera: " . $http_response_header[0] . "<br>";
        if ($http_response_header[0] == "HTTP/1.1 200 OK") {
            mostrarDatos($respuesta);

        }  }


    function mostrarEstado($cartas)
    {
        echo "STATUS: " . $cartas->codEstado;
        echo "<br>" . $cartas->mensaje;
    }
    function mostrarDatos($cartas)
    {
        if ($cartas->codEstado == 200) {
            echo "<hr style='margin-top:20px'>";
            echo "<table style='text-align:center; padding:10px;'><tr><th style='padding:10px'>Número</th><th style='padding:10px'>Palo</th></tr>";
            // Accedemos a la propiedad "baraja"
            foreach ($cartas->baraja as $carta) {
                echo "<tr><td style=' border-bottom:1px solid black; border collapse:collapse;'>" . $carta->numero  . "</td>";
                echo "<td style=' border-bottom:1px solid black; border collapse:collapse;'>" . $carta->palo . "</td></tr>";
            }
            echo "</table>";
        } else {
            mostrarEstado($cartas);
        }
    }
    ?>
</body>
</html>