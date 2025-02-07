<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combinación generada</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table {
            margin-left: auto;
            margin-right: auto;
        }

        
    </style>
</head>

<body>
    <!-- Diseñar una web para jugar a la lotería primitiva.
    En un formulario se pedirá introducir la combinación de 6
    números entre 1 y 49 y el número de serie entre 1 y 999.
    Mostrar la combinación generada y la introducida por
    el usuario en dos filas de una tabla. -->
    <h1>Combinación generada</h1>

    <?php
    // Numeros del jugador
    $u_n1 = $_REQUEST['n1'];
    $u_n2 = $_REQUEST['n2'];
    $u_n3 = $_REQUEST['n3'];
    $u_n4 = $_REQUEST['n4'];
    $u_n5 = $_REQUEST['n5'];
    $u_n6 = $_REQUEST['n6'];
    $u_serie = $_REQUEST['serie'];
    // Numeros de la máquina
    $pc_n1 = rand(1, 49);
    $pc_n2 = rand(1, 49);
    $pc_n3 = rand(1, 49);
    $pc_n4 = rand(1, 49);
    $pc_n5 = rand(1, 49);
    $pc_n6 = rand(1, 49);
    $pc_serie = rand(1, 999);
    ?>
    <table class="table">
        <tr>
            <td class="vacio td"></td>
            <td class="td2">N1</td>
            <td class="td2">N2</td>
            <td class="td2">N3</td>
            <td class="td2">N4</td>
            <td class="td2">N5</td>
            <td class="td2">N6</td>
            <td class="td2">Serie</td>
        </tr>
        <tr>
            <td class="td2">Tus números:</td>
            <td class="td"><?= $u_n1 ?></td>
            <td class="td"><?= $u_n2 ?></td>
            <td class="td"><?= $u_n3 ?></td>
            <td class="td"><?= $u_n4 ?></td>
            <td class="td"><?= $u_n5 ?></td>
            <td class="td"><?= $u_n6 ?></td>
            <td class="td"><?= $u_serie ?></td>

        </tr>
        <tr>
            <td class="td2">Números ganadores:</td>
            <td class="td"><?= $pc_n1 ?></td>
            <td class="td"><?= $pc_n2 ?></td>
            <td class="td"><?= $pc_n3 ?></td>
            <td class="td"><?= $pc_n4 ?></td>
            <td class="td"><?= $pc_n5 ?></td>
            <td class="td"><?= $pc_n6 ?></td>
            <td class="td"><?= $pc_serie ?></td>

        </tr>

    </table>
</body>

</html>