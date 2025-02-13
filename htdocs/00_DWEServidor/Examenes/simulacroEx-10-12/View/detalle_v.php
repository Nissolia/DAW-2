<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Fotografía</title>
    <link rel="stylesheet" href="../View/style.css">
</head>
<body>
    <?php if ($data['fotografia']) { ?>
        <!-- Mostrar la imagen -->
        <img src="../View/imagen/<?= ($data['fotografia']->getImagen()) ?>" alt="Imagen">

        <!-- Mostrar el autor -->
        <?php if ($data['autor']) { ?>
            <h3>Autor: <?= ($data['autor']->getNombre()) ?></h3>
        <?php } ?>
    <?php } else { ?>
        <p>No se encontró la fotografía.</p>
    <?php } ?>

    <hr>

    <!-- Mostrar usuarios que han dado like -->
    <h2>Usuarios que le han dado like</h2>
    <?php if (!empty($data['usuarios'])) { ?>
        <ul>
            <?php foreach ($data['usuarios'] as $usuario) { ?>
                <li><?= ($usuario->getNombre()) ?></li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Nadie ha dado like aún.</p>
    <?php } ?>
    
    <hr>

    <!-- Botón para volver a la página principal -->
    <form action="../index.php" method="post">
        <input type="submit" value="Página principal">
    </form>
</body>
</html>
