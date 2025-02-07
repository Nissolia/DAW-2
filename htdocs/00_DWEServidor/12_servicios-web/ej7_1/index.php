<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor Euros ⇄ Pesetas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Conversor de Euros y Pesetas</h2>
    <form action="" method="GET">
        <label for="cantidad">Cantidad:</label>
        <input type="number" step="any" name="cantidad" required>
        <br>
        <label for="tipo">Convertir a:</label>
        <select name="tipo"> 
            <option value="euros">Pesetas → Euros</option>
            <option value="pesetas">Euros → Pesetas</option>
        </select>
        <br>
        <input class="boton" type="submit" value="Convertir">
    </form>
    <hr>
    <!-- cambiar esto -->
    <?php 
    if (isset($_GET['cantidad']) && isset($_GET['tipo'])) {
        $cantidad = ($_GET['cantidad']);
        $tipo = ($_GET['tipo']);
    
        echo json_encode(convertir($cantidad, $tipo));
    } ?>
</body>
</html>
