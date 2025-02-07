<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Cambiado</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- El formunario ha de estar asi -->
    <h2>Introduce varios numeros:</h2>
    <form action="ej2_recibeCambiado.php" method="post">
        <?php
        for ($i = 1; $i <= 20; $i++) {
            echo "Numero $i: <input class='input' type='number' name='numeros[]'><br>";
        }
        ?>
        <input class="boton" type="submit" value="Enviar datos">
    </form>

</body>

</html>