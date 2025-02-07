<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotería Primitiva</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Lotería Primitiva</h1>
    <form action="ej07-proceso.php" method="POST">
        <table class="table">
            <!-- Creamos las filas de la tabla -->
            <?php
            $num = 1;
            for ($i = 0; $i < 7; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 7; $j++) {
                    echo "<td class='td'><input type='checkbox' name='$num'> $num</td>";
                    $num++;
                }
                echo "</tr>";
            }
            ?>
        </table>
        
        <label for="serie">Número de Serie:</label>
        <input class="input" type="text" name="serie" id="serie" required>

        <button class="boton" type="submit">Enviar</button>
    </form>
</body>

</html>
