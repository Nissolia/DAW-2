<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario articulo</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Nuevo artículo</h1>
    <form action="../Controller/guardaArticulo.php" enctype="multipart/form-data"
        method="POST">
        <h3>Título</h3>
        <input type="text" size="40" name="titulo">
        <!-- <h3>Fecha</h3>
        <input type="date" name="fecha"> -->
        <br>
        <h3>Contenido</h3>
        <textarea name="contenido" cols="60" rows="6">
</textarea>
        <hr>
        <input class="botonV" type="submit" value="Aceptar">
    </form>
    <br>
    <a class="volverIndex" href="../index.php">Página principal</a>
</body>

</html>