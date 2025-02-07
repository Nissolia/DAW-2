<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados Lotería</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .verde {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    // Verificar si se ha enviado el formulario y si la serie ha sido enviada
    if (isset($_POST['serie'])) {
        
        // Número de serie ingresado por el usuario
        $numSerie = $_POST['serie'];

        // Generar 6 números aleatorios únicos para el PC
        $numPc1 = rand(1, 49);
        do {
            $numPc2 = rand(1, 49);
        } while ($numPc2 == $numPc1);
        do {
            $numPc3 = rand(1, 49);
        } while ($numPc3 == $numPc1 || $numPc3 == $numPc2);
        do {
            $numPc4 = rand(1, 49);
        } while ($numPc4 == $numPc1 || $numPc4 == $numPc2 || $numPc4 == $numPc3);
        do {
            $numPc5 = rand(1, 49);
        } while ($numPc5 == $numPc1 || $numPc5 == $numPc2 || $numPc5 == $numPc3 || $numPc5 == $numPc4);
        do {
            $numPc6 = rand(1, 49);
        } while ($numPc6 == $numPc1 || $numPc6 == $numPc2 || $numPc6 == $numPc3 || $numPc6 == $numPc4 || $numPc6 == $numPc5);
        $seriePc = rand(1, 999);
        // Inicializar variables para contar aciertos y ganancias
        $aciertos = 0;
        $ganancias = 0;

        // Comprobar coincidencias con los números seleccionados por el usuario
        for ($i = 1; $i <= 49; $i++) {
            if (isset($_POST[$i])) {
                if ($i == $numPc1 || $i == $numPc2 || $i == $numPc3 || $i == $numPc4 || $i == $numPc5 || $i == $numPc6) {
                    $aciertos++;
                }
            }
        }

        // Calcular ganancias según el número de aciertos
        if ($aciertos == 4) {
            $ganancias = 0; // Dinero devuelto
        } elseif ($aciertos == 5) {
            $ganancias = 30;
        } elseif ($aciertos == 6) {
            $ganancias = 100;
        }

        // Mostrar números seleccionados por el usuario
        echo "<h1>Números seleccionados por el usuario:</h1>";
        echo "<table class='table'><th class='td'>Números</th>";

        for ($i = 1; $i <= 49; $i++) {
            if (isset($_POST[$i])) {
                $coincidencia = ($i == $numPc1 || $i == $numPc2 || $i == $numPc3 || $i == $numPc4 || $i == $numPc5 || $i == $numPc6);
                echo "<td class='td " . ($coincidencia ? 'verde' : '') . "'>$i</td>";
            }
        }

        echo "<td class='td'> <p>Serie: $seriePc</p></td>";
        echo "</tr></table>";

        // Mostrar los números generados por el ordenador
        echo "<h1>Números generados por el PC:</h1>";
        echo "<table class='table'><th class='td'>Números</th>";

        // Utilizamos la misma lógica para mostrar los números generados por el PC
        for ($j = 1; $j <= 6; $j++) {
            // Variable para acceder a los números generados
            $numPc = ${"numPc$j"};
            // Comprobar coincidencia
            $coincidencia = false;
            for ($k = 1; $k <= 49; $k++) {
                if (isset($_POST[$k]) && $k == $numPc) {
                    $coincidencia = true;
                    break;
                }
            }
            echo "<td class='td " . ($coincidencia ? 'verde' : '') . "'>$numPc</td>";
        }
        $serie = $_REQUEST['serie'];
        echo "<td class='td'> <p>Serie: $serie</p></td>";

        echo "</tr></table>";

        // Mostrar los aciertos y las ganancias
        echo "<h1>Resultados:</h1>";
        echo "<p>Has tenido <strong>$aciertos</strong> aciertos.</p>";
        echo "<p>Has ganado: <strong>$ganancias euros</strong></p>";
        
    } else {
        // Si no se ha enviado la serie o no se han seleccionado números, mostrar mensaje de error
        echo "<h1>Datos incorrectos. No se ha recibido la serie o no se han seleccionado suficientes números.</h1>";
    }
    ?>
</body>

</html>
