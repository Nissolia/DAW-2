<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../View/style.css">
</head>
<body>
    <h1>Perfil del usuario: <?= $_SESSION['usuario'] ?></h1>
    <form action="../Controller/perfil.php" method="post">
        <input type="submit" name="cerrarSesion" value="Cerrar sesión">
        <input type="submit" name="volverIndex" value="Página principal">
    </form> <br>
    <form action="" method="post">
        Subir una imagen: <br> <input type="file" name="">
        <input type="submit" value="Aceptar">
    </form>

    <hr>
    <!-- y aqui se ven las imagenes y se pone "likes acumulados y el numero" -->


    <!-- imagen del like -->
</body>

</html>