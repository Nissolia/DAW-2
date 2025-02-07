<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej.4 Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="ej04-llamar.php" method="post">
        <table class='table'>
            <!-- Encabezados de la tabla -->
            <tr>
                <th>Bloque</th>
                <th>Piso</th>
                <th>Acción</th>
            </tr>
            <?php
            // Generar filas de la tabla
            for ($i = 1; $i <= 10; $i++) {
                for ($j = 1; $j <= 7; $j++) {
                    echo "<tr>";
                    echo "<td class='td'>Bloque $i</td>";
                    echo "<td class='td'>Piso $j</td>";
                    echo "<td class='td'>
                            <button type='submit' name='bloque' value='$i' class='boton'>Llamar</button>
                            <input type='hidden' name='piso' value='$j'>
                          </td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </form>
</body>
</html>
