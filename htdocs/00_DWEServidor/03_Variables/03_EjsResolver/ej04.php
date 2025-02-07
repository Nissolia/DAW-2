<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diferencia de tiendas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table {
            margin-left: auto;
            margin-right: auto;
        }

        .td2 {
            background-color: rgbrgba(42, 42, 64, 0.8);
            color: white;
        }
    </style>
</head>

<body>
    <!-- Diseñar un desarrollo web simple con php que pida al usuario el
precio de un producto en tres establecimientos distintos denominados
“Tienda 1”, “Tienda 2” y “Tienda 3”.
Una vez se introduzca esta información se debe calcular y mostrar
el precio medio del producto en las tres tiendas. Mostrar
en la página resultado, una tabla con un título, el precio
en cada una de las tiendas, la media de los tres precios 
y la diferencia del precio de cada tienda con la media.
Combina celdas para que quede visualmente agradable. -->
<h1>Diferencia de tiendas</h1>
    <?php
    $t1 = $_REQUEST['t1'];
    $t2 = $_REQUEST['t2'];
    $t3 = $_REQUEST['t3'];

    $medio = round(($t1 + $t2 + $t3) / 3);
    $dif1 = round(($t1 - $medio), 2);
    $dif2 = round(($t2 - $medio), 2);
    $dif3 = round(($t3 - $medio), 2);

    ?>
    <table class="table">
        <tr>
            <td class="vacio td"> </td>
            <td class="td2">Tienda 1 </td>
            <td class="td2">Tienda 2 </td>
            <td class="td2">Tienda 3 </td>
        </tr>
        <tr>
            <td class="td2"> Precios: </td>
            <td class="td"> <?= $t1 ?></td>
            <td class="td"> <?= $t2 ?></td>
            <td class="td"> <?= $t3 ?></td>

        </tr>
        <tr>
            <td class="td2">Precio medio: </td>
            <td colspan="3" class="td"><?= $medio ?></td>
        </tr>
        <tr>
            <td class="td2">Diferencia:</td>
            <td class="td"><?= $dif1 ?></td>
            <td class="td"><?= $dif2 ?></td>
            <td class="td"><?= $dif3 ?></td>
        </tr>
    </table>


</body>

</html>