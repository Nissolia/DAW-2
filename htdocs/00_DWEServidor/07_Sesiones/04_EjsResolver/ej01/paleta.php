<?php
session_start();

// Si no existen colores en la sesión, redirigir a la página principal
if (!isset($_SESSION['colores'])) {
    header('Location: index.php');
    exit;
}

// Función para destruir la sesión y generar una nueva paleta
if (isset($_POST['destruir_sesion'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paleta de Colores</title>
    <style>
        body {
            text-align: center;
            background-color: <?= $_REQUEST['color_fondo'] ?>;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        button {
            font-weight: bold;
            border: none;
            padding: 15px;
            border-radius: 10px;
            margin: 5px;
        }

        button:hover {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
        }

        .click {

            width: 70px;
            height: 70px;
        }

        table {
            justify-content: center;
            display: flex;
        }
    </style>
</head>

<body>
    <h1>Paleta de Colores Generados</h1>

    <!-- Tabla con los colores generados -->
    <table>
        <?php
        $colores = $_SESSION['colores'];
        $fila = '';
        $contador = 0;

        foreach ($colores as $color) {
            if ($contador % 5 == 0) {
                if ($fila != '') {
                    echo "<tr>$fila</tr>";
                }
                $fila = '';
            }
            $fila .= "<td>
            <form method='post' style='margin: 0; padding: 0;'>
            <input type='hidden' name='color_fondo' value='$color'>
            <button class='click' style='background-color: $color' type='submit' name='cambiarColor' value='$color'></button>
                        </form>
                      </td>";
            $contador++;
        }
        if ($fila != '') {
            echo "<tr>$fila</tr>";
        }
        ?>
    </table>

    <br>

    <!-- Botones para volver a la página principal o destruir la sesión -->
    <form action="index.php" method="post">
        <button type="submit">Volver a la página principal</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="destruir_sesion">Destruir la sesión (crear nueva paleta)</button>
    </form>
</body>

</html>