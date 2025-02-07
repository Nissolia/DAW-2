<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta de seguridad</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>
<body>
    <h2>¿Está seguro de borrar el producto?</h2>
    <form action="../Controller/eliminarProducto.php" method="post">
        <input type="hidden" name="id" value="<?= $data['idEliminar'] ?>">
        <input class="boton eliminar" type="submit" value="Eliminar">
    </form>
    <a href="../index.php">Página principal</a>
</body>
</html>
