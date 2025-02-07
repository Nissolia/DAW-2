<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listado de ofertas</title>
    <link rel="stylesheet" href="../Content/estilo.css">

</head>

<body>
    <h1>Pizzeria Peachepe</h1>
    <a href="../Controller/nuevaOferta.php">Nueva oferta</a>
    <hr>
    <?php
    foreach ($data['ofertas'] as $oferta) {
    ?>
        <h3><?= $oferta->getTitulo() ?></h3>
        <img src="../View/images/<?= $oferta->getImagen() ?>" width="400"><br>
        <p><?= $oferta->getDescripcion() ?></p>
        <a class="boton" href="../Controller/borraOferta.php?id=<?= $oferta->getId() ?>">Borrar</a>
    <?php
    }
    ?>
</body>

</html>