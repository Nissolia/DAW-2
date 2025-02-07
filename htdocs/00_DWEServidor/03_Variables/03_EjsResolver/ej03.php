<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estilo aplicado</title>
    <?php
    $colorFondo = $_POST['colorFondo'];
    $colorTexto = $_POST['colorTexto'];
    $fuente = $_POST['fuente'];
    $alineacion = $_POST['alineacion'];
    $imagen = $_POST['imagen'];
    ?>
    <style>
        body {
            padding: 3em;
            <?php echo "background-color:$colorFondo;
            background-color:echo $colorFondo;
            font-family:  $fuente;
            text-align:  $alineacion;
            color:  $colorTexto;"

            ?>
        }

        .imagen {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>


    <h1>Estilo elegido</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem pariatur illo voluptate voluptates dignissimos, consequatur corrupti voluptatem tempore iure eveniet repellendus sunt adipisci, harum labore vitae consequuntur molestiae. Ipsam, repellendus.</p>

    <img src="<?php echo $imagen; ?>" alt="imagen" class="imagen">

    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem pariatur illo voluptate voluptates dignissimos, consequatur corrupti voluptatem tempore iure eveniet repellendus sunt adipisci, harum labore vitae consequuntur molestiae. Ipsam, repellendus.</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem pariatur illo voluptate voluptates dignissimos, consequatur corrupti voluptatem tempore iure eveniet repellendus sunt adipisci, harum labore vitae consequuntur molestiae. Ipsam, repellendus.</p>
</body>

</html>