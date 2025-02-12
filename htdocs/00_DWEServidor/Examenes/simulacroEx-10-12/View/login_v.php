<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Inicie sesión o registre un usuario nuevo</h1>
    <!-- hay que hacer comprobación del usuario -->
    <form action="../Controller/login.php" method="post">
        Usuario:<input type="text" name="usuario"> <br>
        <input type="submit" name="acceso" value="Acceso usuario">
        <input type="submit" name="registro" value="Registro usuario">
    </form>
    <?php
    echo  $data['error']; ?>
</body>

</html>