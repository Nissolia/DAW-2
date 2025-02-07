<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        /* Estilo básico para la tabla del mosaico */
        table {
            border-collapse: collapse;
            background-image: url("img/loro.jpg");
          
        }
        td {
            width: 50px;
            height: 60px;
            border: 1px solid #000;
          
        }
    </style>
</head>

<body>
    <!-- Vamos a hacer el ejercicio de adivinar la imagen oculta del tema 3 más interesante.
     Para empezar, vamos a hacer el mosaico un poco más grande, de 10x10. Además
     la imagen no se va a dividir sino que formará parte del fondo de la tabla y para ocultar o mostrar cada parte del
mosaico, el fondo de cada celda será transparente u opaco. Cada vez que se pulse un cuadrado,
la parte de la imagen correspondiente a ese cuadrado se mostrará de manera definitiva, así que
cada vez se irán mostrando más partes de la imagen. Por último, para rematar y hacerlo todavía
más interesante, vamos a poner un límite en el número de cuadrados volteados, de modo que,
si no se adivina la imagen antes de superar ese límite, se mostrará un mensaje indicando que
ha perdido junto a la imagen completa. Si se acierta introduciendo el nombre correcto en la
caja de texto antes de superar el límite, también se indicará con un mensaje junto a la imagen
completa. Ayuda: La tabla con las partes visibles y no visibles de la imagen, se encuentra en una
única página que se recarga con cada pulsación, pero el resultado del juego tanto si ha ganado
como si ha perdido, se puede realizar en otra página distinta. Almacenar en un array la situación
de cada celda (vista u oculta) y pasar el array con la función serialize para mayor comodidad. -->
<!-- las que están ocultas son enlaces, de fondo de la tabla está la imagen
 oculto: background color grey
 visto blackground color transparent -->

<?php
    // Definir el límite de clics permitidos
    $limiteIntentos = 20;

    // Estado inicial del juego: celdas ocultas
    $mosaico = array_fill(0, 100, 0); // 100 celdas, todas ocultas (0)
    $intentos = 0; // Contador de intentos realizados
    $imagenAdivinada = false;

    // Recuperar estado si ya hay clics anteriores
    if (isset($_POST['mosaicoCodificado'])) {
        $mosaico = unserialize(base64_decode($_POST['mosaicoCodificado']));
        $intentos = $_POST['intentos'];
        $intentos++; // Incrementar los intentos al hacer clic en una celda

        // Verificar si ya se superó el límite de intentos
        if ($intentos > $limiteIntentos) {
            echo "<h2>¡Has perdido! Has superado el límite de intentos ($limiteIntentos).</h2>";
            echo "<img src='img/loro.jpg' alt='Imagen completa' style='width:500px'>";
           
        }

        // Revelar la celda seleccionada
        if (isset($_POST['seleccion'])) {
            $seleccion = $_POST['seleccion'];
            $mosaico[$seleccion] = 1; // Cambiar el estado de la celda a visible (1)
        }
    }

    // Codificar el mosaico para pasarlo entre solicitudes
    $mosaicoCodificado = base64_encode(serialize($mosaico));

    // Mostrar la tabla (mosaico)
    echo "<table>";
    $n = 0;
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            echo "<td style='";
            if ($mosaico[$n] != 1) {
            
                echo "background-color: gray;";
            }
            echo "'>";
            if ($mosaico[$n] == 0) {
                // Si la celda está oculta, permitir hacer clic para mostrarla
                echo "<form action='ej03.php' method='post' style='margin:0;'>";
                echo "<input type='hidden' name='seleccion' value='$n'>";
                echo "<input type='hidden' name='mosaicoCodificado' value='$mosaicoCodificado'>";
                echo "<input type='hidden' name='intentos' value='$intentos'>";
                echo "<input type='submit' style='width:100%; height:100%; background:none; border:none;'>";
                echo "</form>";
            }
            echo "</td>";
            $n++;
        }
        echo "</tr>";
    }
    echo "</table>";

    // Mostrar los intentos restantes
    echo "<p>Intentos realizados: $intentos. Intentos restantes: " . ($limiteIntentos - $intentos) . ".</p>";

    // Formulario para adivinar la imagen
    ?>
    <form action="ej03.php" method="post">
        <input type="hidden" name="mosaicoCodificado" value="<?php echo $mosaicoCodificado; ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <label for="adivinanza">¿Qué imagen crees que es?</label>
        <input type="text" name="adivinanza" id="adivinanza">
        <input type="submit" value="Adivinar">
    </form>

    <?php
    // Verificar si el jugador ha adivinado la imagen
    if (isset($_POST['adivinanza'])) {
        $respuesta = strtolower($_POST['adivinanza']);
        $solucion = "loro"; // Reemplaza esto con el nombre correcto de la imagen

        if ($respuesta === $solucion) {
            echo "<h2>¡Felicidades! Has adivinado la imagen correctamente.</h2>";
            echo "<img src='img/loro.jng' alt='Imagen completa' style='width:500px'>";
        } else {
            echo "<p>Respuesta incorrecta. Sigue intentándolo.</p>";
        }
    }
    ?>
</body>

</html>