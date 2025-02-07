<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Retirar stock</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <div class="rellenarDatos">
        <h1>Retirar stock</h1>
        
        

        <form action="../Controller/quitarStock.php" method="post">
            <p>Introduce la cantidad que quieras retirar del producto: <b> <?= $data['producto']->getNombre() ?></b></p>
            <input type="number" name="retirar" min="1" required>
            <input type="hidden" name="id" value="<?= $data['producto']->getCodigo() ?>">
            <input class="boton eliminar" type="submit" value="Retirar">
        </form>
        <a href="../Controller/index.php">Volver a la página principal</a>
    </div>
</body>

</html>
