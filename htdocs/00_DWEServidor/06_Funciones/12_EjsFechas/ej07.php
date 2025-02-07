<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej 7</title>
</head>
<body>
     <!-- Ejercicio 7 -->
     <h2>Ejercicio 7: Calcular edad en una fecha futura</h2>
    <form action="" method="post">
        Fecha de nacimiento: <input type="date" name="fechaNacimiento" required><br>
        Fecha futura: <input type="date" name="fechaFutura" required><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    if (isset($_POST['fechaNacimiento'], $_POST['fechaFutura'])) {
        $fechaNacimiento = strtotime($_POST['fechaNacimiento']);
        $fechaFutura = strtotime($_POST['fechaFutura']);
        $edad = (int)(($fechaFutura - $fechaNacimiento) / (60 * 60 * 24 * 365.25));
        echo "La edad en la fecha futura será: " . $edad . " años<br>";
    }
    ?>
</body>
</html>