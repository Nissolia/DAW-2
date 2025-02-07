<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // Arrays, cada uno con 20 numeros dentro de sí
    for ($i = 0; $i < 20; $i++) {
        $numero[$i] = rand(0, 100);
        $cubo[$i] = pow($numero[$i], 3);
        $cuadrado[$i] = pow($numero[$i], 2);
    }
    ?>
    <table class='table'>
        <tr>
            <th class="td">Número</th>
            <th class="td">Cuadrado</th>
            <th class="td">Cubo</th>
        </tr>
        <?php
        
        foreach ($numero as $i => $n) {
            echo "<tr>";
            echo "<td class='td'> $n </td>";
            echo "<td class='td'> $cuadrado[$i] </td>";
            echo "<td class='td'> $cubo[$i] </td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
</body>

</html>