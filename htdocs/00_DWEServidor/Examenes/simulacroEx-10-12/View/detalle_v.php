<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Fotografía</title>
    <link rel="stylesheet" href="../View/style.css">
</head>

<body>
    <?php if (!empty($data['fotografias'])) { ?>
        <?php foreach ($data['fotografias'] as $foto) { ?>
            <!-- Imagen -->
            <img src="../View/imagen/<?= $foto->getImagen() ?>" alt="Imagen">

            <!-- Autor -->
            <?php if (!empty($data['autor'])) { ?>
                <?php foreach ($data['autor'] as $user) { ?>
                    <h3>Autor: <?= $user->getNombre() ?></h3>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } else { ?>
        <p>No se encontró la fotografía.</p>
    <?php } ?>

    <hr>

    <!-- Usuarios que han dado like -->
    <h2>Usuarios que le han dado like</h2>
    <?php if (!empty($data['usuario'])) { 
        foreach ($data['usuario'] as $usuarios) { ?>
            <p><?= $usuarios->getNombre() ?></p>
    <?php } 
    } else {
        echo "<p>Nadie ha dado like aún.</p>";
    } ?>
    
    <hr>

    <!-- Botón para volver -->
    <form action="../index.php" method="post">
        <input type="submit" value="Página principal">
    </form>
</body>

</html>
