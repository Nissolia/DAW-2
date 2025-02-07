<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar producto</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>

<body>
    <h1>Modificar producto</h1>
    <form action="../Controller/actualizarProducto.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['productoId']->getCodigo() ?>">
        Nombre
        <input type="text" name="nombre" placeholder="<?=$data['productoId']->getNombre() ?>" value="<?= $data['productoId']->getNombre() ?>">
      <br>
        Precio
        <input type="number" name="precio" placeholder="<?=$data['productoId']->getPrecio() ?>" value="<?= $data['productoId']->getPrecio() ?>">
        <br> Stock
        <input type="number" name="stock" placeholder="<?=$data['productoId']->getStock() ?>" value="<?= $data['productoId']->getStock() ?>">
        <br>  Imagen
        <input type="text" name="imagen" placeholder="<?=$data['productoId']->getImagen() ?>" value="<?= $data['productoId']->getImagen() ?>">
        <hr>
        <input class="boton anadir" type="submit" value="Aceptar">
    </form>    <br>
    <a  href="../index.php">Página principal</a>
</body>

</html>
