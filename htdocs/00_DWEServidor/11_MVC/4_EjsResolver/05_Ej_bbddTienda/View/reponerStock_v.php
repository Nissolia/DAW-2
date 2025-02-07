<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reponer stock</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <div class="rellenarDatos">
        <h1>Reponer stock</h1>
        <form action="../Controller/anadirStock.php" method="post">
            <p>Introduce la cantidad que quieras reponer del producto: <b> <?= $data['producto']->getNombre() ?></b></p>
            <input type="number" name="reponer" min="1" required>
            <input type="hidden" name="id" value="<?= $data['producto']->getCodigo() ?>">
            <input class="boton anadir" type="submit" value="Reponer">
        </form>
        <a href="../Controller/index.php">Volver a la página principal</a>
    </div>
</body>

</html>
