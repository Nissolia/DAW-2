<?php
include_once 'DadoPoker.php';
session_start();
// iniciamos el contador de tiradas
if (!isset($_SESSION['totalTiradas'])) {
    $_SESSION['totalTiradas'] = 0;
}

if (!isset($_SESSION['dados'])) {
    $_SESSION['dados'] = [];
    for ($i = 0; $i < 5; $i++) {
        $_SESSION['dados'][] = new DadoPoker();
    }
}

// miramos si el formulario ha sido enviado y si se quiere tirar los dados
if (isset($_POST['tirarDados'])) {
    // creamos un array para los dados

    for ($i = 0; $i < 5; $i++) {
        if (isset($_REQUEST[$i])) {
            $_SESSION['dados'][$i]->tira;
        }
    }
    // obtenemos los resultados de las tiradas
    $resultados = [];
    foreach ($_SESSION['dados'] as $index => $dado) {
        $resultados[] = "Dado " . ($index + 1) . ": " . $dado->nombreFigura();
    }
    // inccrementamos las tiradas totales
    $_SESSION['totalTiradas'] += 5;
    // obtenemos el número total de tiradas desde la sesión
    $totalTiradas = $_SESSION['totalTiradas'];
}
?>
<!-- elegir los dados que tiras con checkbox -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Dados de Poker</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Juego de Dados de Poker</h1>
    <p>Haz clic en el botón para tirar los 5 dados de poker</p>

    <!-- Formulario para interactuar -->
    <form method="POST" action="Main.php">
        <button type="submit" name="tirarDados">Tirar los dados</button>


        <?php if (isset($resultados)) {
            echo "<div class='resultados'>";

            // Comienza la tabla
            echo "<table border='1'>";  // Añadí el atributo `border='1'` para una tabla con bordes visibles

            // Fila con el encabezado
            echo "<tr><th colspan='5'><h3>Tirada actual:</h3></th></tr><tr>";
            foreach ($resultados as $resultado) {
                echo "<td>$resultado</td>";
            }
            echo "</tr><tr>";
            for ($i = 0; $i < 5; $i++) {
                echo "<td><input type='checkbox' name='dado$i'></td>";
            }
            echo "</tr><tr><td colspan='5'><p><strong>Total de tiradas: </strong>$totalTiradas</p></td></tr>";

            // Cierra la tabla
            echo "</table></div>";
        } ?>
    </form>
</body>

</html>