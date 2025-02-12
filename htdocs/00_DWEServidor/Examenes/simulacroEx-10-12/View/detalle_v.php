<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <link rel="stylesheet" href="../View/style.css">
</head>

<body>
    <!-- imagen -->
    <img src="../View/imagen/<?=$data['fotografias']->getImagen()?>" alt="">
    <h3>Autor: </h3>
    <hr>
    <h2>Usuarios que le han dado like</h2>
    <hr>
    <form action="../index.php" method="post">
        <input type="submit" value="Página principal">
    </form>
</body>

</html>