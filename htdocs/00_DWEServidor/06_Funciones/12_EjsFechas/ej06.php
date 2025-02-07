<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej 6</title>
</head>
<body>
    <!-- Ejercicio 6 -->
    <h2>Ejercicio 6: Día de la semana después de ciertos días</h2>
    <form action="" method="post">
        Días a añadir: <input type="number" name="dias" ><br>
        Meses a añadir: <input type="number" name="meses" ><br>
        Años a añadir: <input type="number" name="años" ><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    if (isset($_POST['dias']) && isset($_POST['meses']) && isset($_POST['años'])) {
        $dias = $_POST['dias'];
        $meses = $_POST['meses'];
        $años = $_POST['años'];

        $nuevaFecha = strtotime("+$dias days +$meses months +$años years");
        $diaSemanaNueva = date("l", $nuevaFecha);
        $diasEnEspanol = [
            'Sunday' => 'Domingo',
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado'
        ];
        echo "Fecha actual: ".date("d/m/Y")."<br>";
        echo "Fecha modificada: ".date("d/m/Y", $nuevaFecha)."<br>";
        echo "El día de la semana será: " . $diasEnEspanol[$diaSemanaNueva] . "<br>";
    }
    ?>
</body>
</html>