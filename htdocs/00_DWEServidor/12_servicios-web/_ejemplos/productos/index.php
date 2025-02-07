<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <h1>Consulta de la API productos</h1>
    <div class="contenedor">
        <form action="peticion.php" method="post">
            <h2>Filtro por nombre</h2>
            Nombre <input type="text" name="nombre">
            <input type="submit" name="filtraNombre" value="Filtrar">
        </form>
        <hr>
        <form action="peticion.php" method="post">
            <h2>Filtro por precio:</h2>
            Mínimo <input type="number" name="min" required>
            Máximo <input type="number" name="max" required>
            <input type="submit" name="filtraPrecio" value="Filtrar">
        </form>
        <hr>
        <form action="peticion.php" method="post">
            <h2>Insertar nuevo producto:</h2>
            Nombre <input type="text" name="nombre" required>
            Precio <input type="number" name="precio" required>
            Stock <input type="number" name="stock" required> <br><br>
            <input type="submit" name="insertar" value="Insertar">
        </form>
        <hr>
        <form action="peticion.php" method="POST">
            <h2>Borrar producto:</h2>
            Nombre <input type="text" name="nombre" required>
            <input type="submit" name="borrar" value="Borrar">
        </form>
        <hr>
        <form action="peticion.php" method="POST">
            <h2>Añadir stock:</h2>
            Nombre <input type="text" name="nombre" required>
            Añadir <input type="number" name="cantidad" require> Unidades
            <input type="submit" name="stock" value="Añadir">
        </form>
        <hr>
    </div>
</body>