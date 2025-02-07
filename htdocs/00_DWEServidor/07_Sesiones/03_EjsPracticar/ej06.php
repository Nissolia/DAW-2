<?php
// Inicio de sesión
session_start();

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
if (!isset($_SESSION['catalogo'])) {
    $_SESSION['catalogo'] =  [
        [
            'nombre' => 'Kaweco dia negro',
            'precio' => 95.20,
            'imagen' => 'img-05/kwcon.jpg',
            'detalle' => 'Pluma estilográfica Kaweco DIA 2, diseño "vintage" inspirada en la colección DIA de los años 30. Estructura de latón recubierta de resina acrílica. Diseño clásico combinado con materiales y procesos modernos. Una pluma de cómodo agarre, con un tamaño mediano (13,5 cm.) incrementable con el capuchón puesto (15,5 cm.). Detalles dorados en plumín, anillos y clip.',
        ],
        [
            'nombre' => 'Pen-Touche Medium',
            'precio' => 17,
            'imagen' => 'img-05/penmedio.jpg',
            'detalle' => 'Rotulador multisuperficie negro de punta gruesa en forma de bala de 2mm resistente al agua. Muy opaco, perfecto para superficies oscuras en papel, cartón, metal, piedra, madera.',
        ],
        [
            'nombre' => 'Pluma Estilográfica LÉMAN Azul Alpino Fino',
            'precio' => 700,
            'imagen' => 'img-05/lemanazul.png',
            'detalle' => 'Caña redonda de latón lacado en azul alpino con barniz transparente mate con el logotipo Caran d`Ache y Swiss Made en el anillo clip y botón están chapados en plata y rodiados, con emblema Caran d`Ache - hexagonal azul alpin-, pluma de oro de 18 quilates, rodiada, pulida a mano.',
        ],
        [
            'nombre' => 'Pluma Caligráfica Sakura',
            'precio' => 10,
            'imagen' => 'img-05/plumacali.jpg',
            'detalle' => 'Pigma Calligrapher es una gran elección tanto para aficionados como para profesionales. Elimina las barreras de costo y los requisitos de equipo para los principiantes que apenas están aprendiendo sobre la caligrafía, y proporciona una alternativa fácil y rápida a los bolígrafos de caligrafía tradicionales para los profesionales. Disponible en 3 tamaños y 6 colores.',
        ],
    ];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <link rel="stylesheet" href="css/ej06.css">
</head>

<body>
    <!-- Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada uno de los
productos del catálogo deberá tener un botón Detalle que, al ser accionado, debe llevar al usuario a la vista de
detalle que contendrá una descripción exhaustiva del producto en cuestión. Se podrán añadir productos al
carrito tanto desde la vista de listado como desde la vista de detalle. -->
    <h1>Tienda on-line <i>La Estilográfica</i></h1>

    <table>
        <tr>
            <td class="producto">
                <h2>Productos</h2>
                <?php
                // Catálogo de productos
                $catalogo = [
                    [
                        'nombre' => 'Kaweco dia negro',
                        'precio' => 95.20,
                        'imagen' => 'img-05/kwcon.jpg',
                        'detalle' => 'Pluma estilográfica Kaweco DIA 2, diseño "vintage" inspirada en la colección DIA de los años 30. Estructura de latón recubierta de resina acrílica. Diseño clásico combinado con materiales y procesos modernos. Una pluma de cómodo agarre, con un tamaño mediano (13,5 cm.) incrementable con el capuchón puesto (15,5 cm.). Detalles dorados en plumín, anillos y clip.',
                    ],
                    [
                        'nombre' => 'Pen-Touche Medium',
                        'precio' => 17,
                        'imagen' => 'img-05/penmedio.jpg',
                        'detalle' => 'Rotulador multisuperficie negro de punta gruesa en forma de bala de 2mm resistente al agua. Muy opaco, perfecto para superficies oscuras en papel, cartón, metal, piedra, madera.',
                    ],
                    [
                        'nombre' => 'Pluma Estilográfica LÉMAN Azul Alpino Fino',
                        'precio' => 700,
                        'imagen' => 'img-05/lemanazul.png',
                        'detalle' => 'Caña redonda de latón lacado en azul alpino con barniz transparente mate con el logotipo Caran d`Ache y Swiss Made en el anillo clip y botón están chapados en plata y rodiados, con emblema Caran d`Ache - hexagonal azul alpin-, pluma de oro de 18 quilates, rodiada, pulida a mano.',
                    ],
                    [
                        'nombre' => 'Pluma Caligráfica Sakura',
                        'precio' => 10,
                        'imagen' => 'img-05/plumacali.jpg',
                        'detalle' => 'Pigma Calligrapher es una gran elección tanto para aficionados como para profesionales. Elimina las barreras de costo y los requisitos de equipo para los principiantes que apenas están aprendiendo sobre la caligrafía, y proporciona una alternativa fácil y rápida a los bolígrafos de caligrafía tradicionales para los profesionales. Disponible en 3 tamaños y 6 colores.',
                    ],
                ];

                // Procesar adición o eliminación de productos en el carrito
                if (isset($_REQUEST['codigo']) && isset($_REQUEST['accion'])) {
                    $codigo = $_REQUEST['codigo'];
                    if ($_REQUEST['accion'] === 'eliminar') {
                        unset($_SESSION['carrito'][$codigo]);
                    } else if ($_REQUEST['accion'] === 'comprar') {
                        $_SESSION['carrito'][$codigo] = ($_SESSION['carrito'][$codigo] ?? 0) + 1;
                    }
                }

                // Mostrar productos del catálogo
                foreach ($_SESSION['catalogo'] as $index => $producto) {
                    echo "<div style='margin-bottom: 20px;'>";
                    echo "<img class='catalogo' src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "'><br>";
                    echo "<strong>" . $producto['nombre'] . "</strong><br>";
                    echo "Precio: " . $producto['precio'] . " €<br><br>";

                    // Detail button
                    echo "<form action='ej06-detalle.php' method='post' style='display:inline-block;'>";
                    echo "<input type='hidden' name='codigo' value='$index'>";
                    echo "<button type='submit'>Detalle</button>";
                    echo "</form>";

                    // Add to cart button
                    echo "<form action='' method='post' style='display:inline-block;'>";
                    echo "<input type='hidden' name='accion' value='comprar'>";
                    echo "<input type='hidden' name='codigo' value='$index'>";
                    echo "<button type='submit'>Comprar</button>";
                    echo "</form>";

                    echo "</div>";
                }
                ?>
            </td>

            <td class="carrito">
                <h2>Carrito</h2>
                <?php


                $total = 0;
                if (!empty($_SESSION['carrito'])) {

                    foreach ($_SESSION['carrito'] as $indice => $cantidad) {
                        $producto = $_SESSION['catalogo'][$indice];
                        $subtotal = $producto['precio'] * $cantidad;
                        $total += $subtotal;

                        echo "<div style='margin-bottom: 20px;'>";
                        echo "<img class='carrito' src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "'><br>";
                        echo "<strong>" . $producto['nombre'] . "</strong><br>";
                        echo "Precio: " . $producto['precio'] . " €<br>";
                        echo "Unidades: $cantidad<br><br>";
                        echo "Subtotal: " . $subtotal . " €<br>";

                        // Remove button
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='codigo' value='$indice'>";
                        echo "<input type='hidden' name='accion' value='eliminar'>";
                        echo "<button type='submit'>Eliminar</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                    echo "<p class='total'>Total: " . $total . " €</strong></p>";
                } else {
                    echo "<p>El carrito está vacío.</p>";
                }
                ?>
            </td>
        </tr>
    </table>
</body>

</html>