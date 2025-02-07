<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        p,
        input {
            display: inline;
        }
    </style>
</head>

<body>
    <!-- Se puede hacer con uno nada más -->
    <h1>Generador de Apuesta para la Primitiva</h1>
    <form method="post" action="ej01-imprimir.php">
        <?php
        for ($i = 0; $i < 6; $i++) {
            echo "<p>Número $i:</p>";
            echo "<input type='number' id='num$i' name='num[]' min='1' max='49'><br><br>";
        }
        ?>
        <p>Número de serie:</p>
        <input type="number" name="serie" min="1" max="999"><br><br>

        <p>Título de la combinación:</p>
        <input type="text" name="titulo"><br><br>

        <input type="submit" name="generar" value="Generar combinación">
    </form>


</body>

</html>