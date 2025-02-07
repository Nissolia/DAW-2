<?php // Inicio de sesión
session_start();
if (!isset($_SESSION['suma'])) {
    //empezamos array de suma
    $_SESSION['suma'] = 0;
    $_SESSION['contador'] = 0;
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <!-- Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras su suma no
supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado, el contador de los
números introducidos y la media. Utiliza sesiones.
 -->
    <?php
    // se usa esto para que no se muestre el formulario al mostrar el resultado
    $fin  = false;
    ?>

    <?php
    if (isset($_REQUEST['nums'])) {
        if ($_SESSION['suma'] <= 10000) {
            // di es inferior a 10000
            $_SESSION['suma'] += $_REQUEST['nums'] ;
            $_SESSION['contador']++;

        } else {
            // si el num es superior
            $_SESSION['suma'];
            $_SESSION['contador'];
            $media =  $_SESSION['suma'] /  $_SESSION['contador'];
           
            echo "<h2>· El total de numeros introducidos son: ".  $_SESSION['contador'] ."</h2>";
            echo "<h2>· La suma total es: ".  $_SESSION['suma'] ."</h2>";
            echo "<h2>· La media es: $media </h2>";
            $fin = true;
            session_destroy();
        }
    }

    if (!$fin) {
    ?>
        <h1>Ejercicio 3</h1>
        <form action="" method="post">
            Introduce un número y acabara al sumar en total +10000: <br>
            <input type="number" name="nums"><br>
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>
</body>

</html>