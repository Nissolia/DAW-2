<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php function comprobarFecha($dia, $mes, $anio)
    {
        if ($dia >= 1 && $dia <= 31) {
            if ($mes >= 1 && $mes <= 12) {
                if ($anio >= 1800 && $anio <= 2100) {
                    return true;
                }
            }
        }
        return false;
    }
    ?>
    <!-- Ejercicio 1 -->
    <h2>Ejercicio 1: Introducir una fecha</h2>
    <form action="" method="post">
        Día: <input type="number" name="dia" required><br>
        Mes: <input type="number" name="mes" required><br>
        Año: <input type="number" name="anio" required><br>
        Elije el formato:
        <select name="formato" id="formatoFecha" required>
            <option value="d-m-y">D-M-AA</option>
            <option value="m-d-Y">M-D-AAAA</option>
            <option value="y-d-m">AA-DD-MM</option>
            <option value="z">Día del año</option>
            <option value="t">Nº Días mes actual</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <hr>
    <?php
    if (isset($_POST['dia'], $_POST['mes'], $_POST['anio'])) {
        $formato = $_REQUEST['formato'];
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $anio = $_POST['anio'];

        // Validar fecha
        if (comprobarFecha($dia, $mes, $anio)) {
            $fechaCadena = strtotime("$anio-$mes-$dia");
            $fechaEntera = date($formato, $fechaCadena);
        } else {
            echo "Formato no válido";
        }
        echo $fechaEntera;
    } else {
        echo "Fecha no válida";
    }

    ?>
</body>

</html>