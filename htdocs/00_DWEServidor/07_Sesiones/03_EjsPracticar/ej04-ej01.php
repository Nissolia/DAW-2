<?php // Inicio de sesión
session_start();
if (!isset($_SESSION['abierta'])) {
    header("Location: ej04-01-php");
}
if (!isset($_SESSION['suma'])) {
    //empezamos array de suma
    $_SESSION['suma'] = 0;
}
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <!-- Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. A
    priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado de introducir
    los datos cuando meta un número negativo. Utiliza sesiones. -->
    <?php
    // se usa esto para que no se muestre el formulario al mostrar el resultado
    $fin  = false;

    ?>
    <?php
    if (isset($_REQUEST['nums'])) {
        if (($_REQUEST['nums']) < 0) {
            // numero es negativo
            $suma = 0;
            $media = $_SESSION['suma'] / ($_SESSION['contador']);
            echo "<h2>· La media es: $media </h2>";
            $fin = true;
        } else {
            // numero positivo
            $_SESSION['contador']++;
            $_SESSION['suma'] += $_REQUEST['nums'];
        }
    }

    if (!$fin) {
    ?>
        <h1>Ejercicio 1</h1>
        <form action="" method="post">
            Introduce un número y pon un negativo si quieres que se calcule la media: <br>
            <input type="number" name="nums"><br>
            <input type="submit" value="Enviar">
        </form>
    <?php
    }

    ?>
    <br><br>
    <form action="" method="post">
        <input type="submit" name="cerrar" value="Cerrar Sesión">
    </form>
</body>

</html>