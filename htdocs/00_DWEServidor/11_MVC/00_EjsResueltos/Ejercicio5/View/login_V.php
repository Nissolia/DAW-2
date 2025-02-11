<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Inicie sesión para entrar en la tienda</h1>
    <form action="../Controller/login.php" method="post">
        Usuario: <input type="text" name="usuario">
        Contraseña: <input type="text" name="pass">
        <input type="submit" value="ACEPTAR">
    </form>
    <h3 style="color: red;"><?= $data['mensaje'] ?></h3>
</body>
</html>