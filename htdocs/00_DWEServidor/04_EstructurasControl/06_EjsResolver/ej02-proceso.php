<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combinación generada</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Combinación generada</h1>
    <!-- Solo comprobar el número solo de los que salen, solo la ganadora con los 6 num que salen
         poner los acertados, el número de aciertos y luego lo que se gana -->
    <?php

    // Números de la máquina
    $pc_n1 = rand(1, 49);
    $pc_n2 = rand(1, 49);
    $pc_n3 = rand(1, 49);
    $pc_n4 = rand(1, 49);
    $pc_n5 = rand(1, 49);
    $pc_n6 = rand(1, 49);
    $pc_serie = rand(1, 999);

    // Inicializar variables
    $saldo = 0;
    $numAcertados = "";  // Lista de números acertados
    $aciertos = 0;

    // Comparar los números generados por la máquina con los números enviados por el usuario (enviados vía formulario)
    if (isset($_REQUEST['n1'])) {
        $aciertos++;
        $numAcertados .= $pc_n1 . ", ";
    }
    if (isset($_REQUEST['n2'])) {
        $aciertos++;
        $numAcertados .= $pc_n2 . ", ";
    }
    if (isset($_REQUEST['n3'])) {
        $aciertos++;
        $numAcertados .= $pc_n3 . ", ";
    }
    if (isset($_REQUEST['n4'])) {
        $aciertos++;
        $numAcertados .= $pc_n4 . ", ";
    }
    if (isset($_REQUEST['n5'])) {
        $aciertos++;
        $numAcertados .= $pc_n5 . ", ";
    }
    if (isset($_REQUEST['n6'])) {
        $aciertos++;
        $numAcertados .= $pc_n6 . ", ";
    }

    // Mostrar números de la máquina en formato de tabla
    echo "<h2>Números de la máquina:</h2>";
    echo "<table class='table'>";
    echo "<tr>
        <td class=td>$pc_n1</td>
        <td class=td>$pc_n2</td>
        <td class=td>$pc_n3</td>
        <td class=td>$pc_n4</td>
        <td class=td>$pc_n5</td>
        <td class=td>$pc_n6</td> 
        
<td class=td><b>Nº  Serie:</b> $pc_serie</td>
      </tr>";
    echo "</table>";


    // Mostrar el resultado de los aciertos
    echo "<h2>Resultado:</h2>";
    if ($aciertos == 0) {
        echo "<p>Lo siento, no has acertado ningún número.</p>";
    } else {
        // Eliminar la última coma y espacio de la lista de números acertados
        $numAcertados = rtrim($numAcertados, ", ");
        echo "<p>¡Felicidades! Has acertado <strong>$aciertos</strong> número(s): $numAcertados.</p>";
    }
    ?>

</body>

</html>