<?php // Inicio de sesión
session_start();
if (!isset($_SESSION['numeros'])) {
    //empezamos array de numeros
    $_SESSION['numeros'] = 0;
    $_SESSION['contador'] = 0;
    $_SESSION['contadorImpar'] = 0;
    $_SESSION['sumaImpar'] = 0;
    $_SESSION['mayorPar'] = PHP_INT_MIN;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <!-- Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y nos diga
cuantos números se han introducido, la media de los impares y el mayor de los pares. El número negativo sólo
se utiliza para indicar el final de la introducción de datos pero no se incluye en el cómputo. Utiliza sesiones. -->
    <h1>Ejercicio 2</h1>
    <form action="" method="post">
        Introduce un número y acabaremos con un negativo: <br>
        <input type="number" name="nums"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_REQUEST['nums'])) {

        if (($_REQUEST['nums']) < 0) {
            // si numero es negativo
            echo "Se han introducido " . $_SESSION['contador'] . " numeros.<br>";
            $mediaImpar =  $_SESSION['sumaImpar'] / $_SESSION['contadorImpar']."<br>";
            echo "Media de los impares: " . $mediaImpar."<br>";
            echo "El mayor de los pares es: " . $_SESSION['mayorPar']."<br>";
            session_destroy();
        } else {
            // numero positivo
            $_SESSION['contador']++;
            if ($_REQUEST['nums'] % 2 == 1) { //si es impar
                $_SESSION['contadorImpar']++;
                $_SESSION['sumaImpar'] += $_REQUEST['nums'];
            } else {
                if ($_REQUEST['nums'] >  $_SESSION['mayorPar']) {
                    $_SESSION['mayorPar'] = $_REQUEST['nums'];
                }
            }
            // $_SESSION['numeros'] += $_REQUEST['nums'];
        }
    }
    ?>
</body>

</html>