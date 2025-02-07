<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Clase</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // si no esta este dato se reinicia todo
    if (!isset($_REQUEST['n'])) {
        $contador = 0;
        $cadena = "";
    } else {
        $contador = $_REQUEST['contador'];
        //esto para concatenarlo todo junto
        $cadena = $_REQUEST['cadena'] . "/" . $_REQUEST['n'];
        // si mete diez se empieza 
    }
        if ($contador == 10) {
            // quita el primer espacio
            $cadena = substr($cadena, 1);
            // aquí formamos el array que tenemos creado anteriormente
            $numeros = explode("/", $cadena);
            // Buscamos el mayor y el menor en un bucle
            $min = PHP_INT_MAX; // Le metemos el valor máximo
            $max = PHP_INT_MIN; // Le metemos el valor minimo
            //pasamos las variables para confirmar que son las menores
            foreach ($numeros as $n) {
                if ($n < $min) {
                    $min = $n;
                }
                if ($n > $max) {
                    $max = $n;
                }
            }
            //foreach para mostrar por pantalla
            foreach ($numeros as $n) {
                echo "<br>";
                echo $n;
                if ($min == $n) {
                    echo " (MIN)";
                }
                if ($n == $max) {
                    echo " (MAX)";
                }
            }
        } else {
    ?>
            <!-- El formunario ha de estar asi -->
            <form action="" method="post">
                Numero: <input class="input" type="number" name="n">
                <!-- hay que hacerlo así para que se pase el contador siempre que rellene el formulario -->
                <input type="hidden" name="contador" value="<?= ++$contador ?>">
                <input type="hidden" name="cadena" value="<?= $cadena ?>">
                <input class="boton" type="submit" value="Enviar datos">
            </form>
    <?php
        }
    
    ?>
</body>

</html>