<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <h2>Calculadora multiplicadora</h2>
    <form action="Ej_01.php" method="post">
        Pon el primer número: <input type="numero" name=N1>
        Pon el segundo número: <input type="numero" name=N2>
        <input type="submit" value="Multiplicar">
    </form>

    <?php
    $num1 = $_REQUEST['N1'];
    $num2 = $_REQUEST['N2'];

    echo "La multiplicacion de $num1 y $num2 es " . $num1 + $num2;
    ?>
</body>

</html>