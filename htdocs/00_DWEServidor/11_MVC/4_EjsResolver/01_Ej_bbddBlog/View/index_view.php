<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listado de articulos</title>
    <link rel="stylesheet" href="../View/estilo.css">

</head>

<body>
    <h1>Mi blog personal</h1>
    <a class="nuevo" href="../Controller/nuevoArticulo.php">Nuevo artículo</a>
    <hr>
    <?php
    foreach ($data['articulos'] as $articulo) {
    ?>
        <h3><?= $articulo->getTitulo() ?></h3>
        <p><?= $articulo->getContenido() ?></p>
        <!-- convertirla a entero y luego se formatea al formato español -->

        <p class="fecha"> <b> Fecha de modificación: </b> <?= $articulo->getFecha() ?></p>
        <a class="boton borrar" href="../Controller/borrarArticulo.php?id=<?= $articulo->getId() ?>">Borrar</a>
        <a class="boton modificar" href="../Controller/modificarArticulo.php?id=<?= $articulo->getId() ?>">Modificar</a>
        <hr>
    <?php
    }
    ?>
    <h2 class="footer"> ¡No te olvides de ver los posts!</h2>
</body>

</html>