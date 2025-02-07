<?php
session_start();

// Si no existe una cookie de productos, inicializar los productos por defecto
if (!isset($_COOKIE['catalogo'])) {
    // Productos por defecto
    $default_catalogo = [
        [
            'nombre' => 'Kaweco dia negro',
            'precio' => 95.20,
            'imagen' => 'img-05/kwcon.jpg',
            'detalle' => 'Pluma estilográfica Kaweco DIA 2, diseño "vintage" inspirada en la colección DIA de los años 30.',
        ],
        [
            'nombre' => 'Pen-Touche Medium',
            'precio' => 17,
            'imagen' => 'img-05/penmedio.jpg',
            'detalle' => 'Rotulador multisuperficie negro de punta gruesa en forma de bala de 2mm resistente al agua.',
        ],
        [
            'nombre' => 'Pluma Estilográfica LÉMAN Azul Alpino Fino',
            'precio' => 700,
            'imagen' => 'img-05/lemanazul.png',
            'detalle' => 'Caña redonda de latón lacado en azul alpino con barniz transparente mate.',
        ],
        [
            'nombre' => 'Pluma Caligráfica Sakura',
            'precio' => 10,
            'imagen' => 'img-05/plumacali.jpg',
            'detalle' => 'Pigma Calligrapher es una gran elección tanto para aficionados como para profesionales.',
        ],
    ];

    // Almacenar en la sesión y en la cookie utilizando serialize
    $_SESSION['catalogo'] = $default_catalogo;
    setcookie('catalogo', serialize($default_catalogo), time() + 3600 * 24);  // Usamos serialize en lugar de json_encode
} else {
    // Recuperar los productos de la cookie usando unserialize
    $_SESSION['catalogo'] = unserialize($_COOKIE['catalogo']);  // Usamos unserialize en lugar de json_decode
}

// Agregar un nuevo producto
if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $detalle = $_POST['detalle'];

    $_SESSION['catalogo'][] = [
        'nombre' => $nombre,
        'precio' => $precio,
        'imagen' => $imagen,
        'detalle' => $detalle,
    ];

    // Actualizar la cookie utilizando serialize
    setcookie('catalogo', serialize($_SESSION['catalogo']), time() + 3600 * 24);  // Usamos serialize para guardar en la cookie
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="css/ej09.css">
</head>

<body>
    <h1>Administrar Productos</h1>

    <form action="" method="post">
        <h2>Agregar Producto</h2>
        Nombre: <input type="text" name="nombre"><br>
        Precio: <input type="number" name="precio"><br>
        Imagen: <input type="text" name="imagen"><br>
        Detalle: <textarea name="detalle"></textarea><br>
        <button type="submit" name="agregar">Agregar Producto</button>
    </form>

    <h2>Productos Agregados</h2>
    <ul>
        <?php
        // Mostrar los productos almacenados en la sesión
        foreach ($_SESSION['catalogo'] as $producto) {
            echo  $producto['nombre']."<br>";
            echo $producto['precio'] . " €<br>";
            echo "<img class='catalogo' src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "'> <br>";
            echo $producto['detalle'] . "<br><hr>";
        }
        ?>
    </ul>

</body>

</html>