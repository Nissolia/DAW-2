<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_REQUEST['numeros'])) { //esto es si se ha enviado
        $numeros = $_REQUEST['numeros'];

        // Mostramos el orden normal del array
        echo "<h1>Orden normal: </h1>";
        foreach ($numeros as $elemento) {
            echo " " . $elemento;
        }

        // Tomo el ultimo valor para guardarlo
        $aux = $numeros[count($numeros) - 1];
        //Guardamos el primer valor automáticamente
        $aux2 = $numeros[0];
        for ($i = 0; $i < count($numeros); $i++) {
            if ($i == 0) {
                // En la primera iteración, reemplazo con el último valor
                $numeros[0] = $aux;
            } else {
                // Guardo el valor actual para moverlo al índice siguiente en la próxima iteración
                $prev = $aux2;
                //guardamos el valor actual en el auxiliar
                $aux2 = $numeros[$i];
                //damos el valor anterior al que tenemos en el bucle
                $numeros[$i] = $prev;
            }
        }

        // Mostramos el orden modificado
        echo "<h1>Orden modificado: </h1>";
        foreach ($numeros as $elemento) {
            echo " " . $elemento;
        }
    } else {
    ?>
        <form action="ej3.php" method="POST">
            <?php
            for ($i = 0; $i < 15; $i++) {
                echo "Numero ",$i+1,": <input class='input' type='number' name='numeros[]'><br>";
            }
            ?>
            <input class="boton" type="submit" value="Enviar datos">
        </form>
    <?php
    } ?>
</body>

</html>