<?php
session_start();

// Si no existe una cookie de productos, inicializar los productos por defecto
if (!isset($_COOKIE['catalogo'])) {
    // Productos por defecto
    $catalogoxDefecto = [
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

    // Guardamos los productos predeterminados en la cookie
    setcookie('catalogo', serialize($catalogoxDefecto), time() + 3600 * 24);  // Guardamos la cookie por 24 horas
    $catalogo = $catalogoxDefecto;  // Asignamos los productos predeterminados a la variable catalogo
} else {
    // Recuperamos los productos de la cookie
    $catalogo = unserialize($_COOKIE['catalogo']);
}

// Mostrar productos

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda La Estilográfica</title>
    <link rel="stylesheet" href="css/ej09.css">
</head>
<body>
    <h1>Tienda on-line <i>La Estilográfica</i></h1>
    
    <div class="productos">
        <h2>Productos</h2>
        <?php
        // Mostrar productos con botones de eliminación y modificación
        foreach ($catalogo as $index => $producto) {
            echo "<div class='producto'>";
            echo "<img class='catalogo' src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "'><br>";
            echo "<strong>".$producto['nombre']."</strong><br>";
            echo "Precio: ".$producto['precio']." €<br>";

            // Botón para eliminar producto
            echo "<form action='' method='post' style='display:inline-block;'>";
            echo "<input type='hidden' name='accion' value='eliminar'>";
            echo "<input type='hidden' name='codigo' value='$index'>";
            echo "<button type='submit'>Eliminar</button>";
            echo "</form>";

            // Botón para modificar producto
            echo "<form action='' method='post' style='display:inline-block;'>";
            echo "<input type='hidden' name='accion' value='modificar'>";
            echo "<input type='hidden' name='codigo' value='$index'>";
            echo "Nuevo nombre: <input type='text' name='nombre' value='".$producto['nombre']."'><br>";
            echo "Nuevo precio: <input type='number' name='precio' value='".$producto['precio']."'><br>";
            echo "<button type='submit'>Modificar</button>";
            echo "</form>";

            echo "</div>";
        }
        ?>
    </div>

    <!-- Botón para restablecer los productos por defecto -->
    <form action="" method="post">
        <button type="submit" name="restablecer">Restablecer productos por defecto</button>
    </form>

    <!-- Botón para gestionar productos -->
    <a href="ej09_administrar.php"><button>Administrar productos</button></a>
</body>
</html>
