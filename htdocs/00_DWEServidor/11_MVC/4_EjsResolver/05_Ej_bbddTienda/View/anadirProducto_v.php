<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario nuevo producto</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Nuevo producto</h1>
    <form action="../Controller/crearProducto.php" method="POST">
        Nombre:
        <input type="text" name="nombre">
        <br>
        Precio:
        <input type="number" name="precio">
        <br> Stock:
        <input type="number" name="stock">
        <br> Imagen
        <input type="text" name="imagen">
        <hr>
        <input class="boton anadir" type="submit" value="Aceptar">
    </form> <br>
    <a href="../index.php">Página principal</a>
</body>

</html>