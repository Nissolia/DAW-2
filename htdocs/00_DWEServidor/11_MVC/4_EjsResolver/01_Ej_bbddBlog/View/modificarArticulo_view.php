<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Artículo</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <?php 
    
    ?>
    <h1>Modificar Artículo</h1>
    <form action="../Controller/actualizarArticulo.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?= $data['articuloId']->getId() ?>">
        <h3>Título</h3>
        <input type="text" size="40" name="titulo" placeholder="<?=$data['articuloId']->getTitulo() ?>" value="<?= $data['articuloId']->getTitulo() ?>">
    
        <h3>Contenido</h3>

        <textarea name="contenido" cols="60" rows="6"><?= $data['articuloId']->getContenido() ?></textarea>
        <hr>
        <input class="botonV" type="submit" value="Aceptar">
    </form>    <br>
    <a class="volverIndex" href="../index.php">Página principal</a>
</body>

</html>
