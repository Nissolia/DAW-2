<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 4</title>
</head>

<body>
    <!-- Ejercicio 4 -->
    <h2>Ejercicio 4: Formato de fecha en español</h2>
    <form action="" method="post">
        Fecha: <input type="date" name="fechaFormato" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST['fechaFormato'])) {
        $meses = ["","Enero", "Febrero", ];
        $fecha = $_POST['fechaFormato'];
        $fechaFormateada = date("j \d\e F \d\e Y", strtotime($fecha));
        echo "La fecha es: $fechaFormateada<br>";
        // $$dia de $meses[$mes] del $anio
    }
    ?>
</body>

</html>