<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Factura de Compra</h1>

    <?php
    if (isset($data['factura']) && !empty($data['factura'])) { 
    ?>
        <div class="factura">
            <p>La factura ha sido generada correctamente.</p>
            <p>Ruta del archivo: <?= ($data['factura']) ?></p>
        </div>
    <?php 
    } else if (isset($data['error']) && !empty($data['error'])) { 
    ?>
        <div class="error">
            <p><?= ($data['error']) ?></p>
        </div>
    <?php 
    } else { 
    ?>
        <p class="error">No se encontró la factura. Por favor, vuelve a intentarlo.</p>
    <?php 
    } 
    ?>

    <a class="boton" href="../index.php">Volver a la tienda</a>
</body>

</html>
