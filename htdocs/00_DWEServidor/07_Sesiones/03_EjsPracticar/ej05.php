<?php
// Inicio de sesión
session_start();

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Procesar adición o eliminación de productos en el carrito
if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        // Eliminar producto del carrito
        unset($_SESSION['carrito'][$codigo]);
    } else {
        // Añadir al carrito o incrementar cantidad
        if (isset($_SESSION['carrito'][$codigo])) {
            $_SESSION['carrito'][$codigo]++;
        } else {
            $_SESSION['carrito'][$codigo] = 1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <style>
        body {
            font-family: Helvetica, sans-serif;
        }

        img {
            margin: 5px;
        }

        h2 {
            color: darkblue;
        }

        button {
            color: white;
            background-color: darkblue;
            padding: 8px;
            border: none;
            border-radius: 5px;
            margin: 5px;
        }

        .catalogo {
            width: 300px;
        }

        .carrito {
            width: 150px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .producto,
        .carrito {
            width: 45%;
            vertical-align: top;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Crea una tienda on-line sencilla con un catálogo de productos y
un carrito de la compra. Un catálogo de cuatro o cinco productos
será suficiente. De cada producto se debe conocer al menos la
descripción y el precio. Todos los productos deben tener una imagen 
que los identifique. Al lado de cada producto del catálogo deberá
aparecer un botón Comprar que permita añadirlo al carrito. Si el 
usuario hace clic en el botón Comprar de un producto que ya estaba 
en el carrito, se deberá incrementar el número de unidades de dicho 
producto. Para cada producto que aparece en el carrito, habrá un botón 
Eliminar por si el usuario se arrepiente y quiere quitar un producto 
concreto del carrito de la compra. A continuación se muestra una captura 
de pantalla de una posible solución. -->

    <!-- primero recorrer array y que se puedan ir añadiendo a una cesta 
tiene que estar en una sesion y todos los elementos estén ahí
    productos con saltos de linea, es una tabla con dos lineas no más-->
    <!-- codigo,(imagen > imagen, nombre >nombre,precio >precio, unidades) -->

    <!-- en el carrito solo se mete el código que se hara asociativo para que sea
 el indice y la cantidad es el valor -->
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
                    ],
                    [
                        'nombre' => 'Pen-Touche Medium',
                        'precio' => 17,
                        'imagen' => 'img-05/penmedio.jpg',
                    ],
                    [
                        'nombre' => 'Pluma Estilográfica LÉMAN Azul Alpino Fino',
                        'precio' => 700,
                        'imagen' => 'img-05/lemanazul.png',
                    ],
                    [
                        'nombre' => 'Pluma Caligráfica Sakura',
                        'precio' => 10,
                        'imagen' => 'img-05/plumacali.jpg',
                    ],
                ];

                foreach ($catalogo as $index => $items) {
                    echo "<div style='margin-bottom: 20px;'>";
                    echo "<img class='catalogo' src='" . $items['imagen'] . "' alt='" . $items['nombre'] . "'><br>";
                    echo "<strong>" . $items['nombre'] . "</strong><br>";
                    echo "Precio: " . $items['precio'] . " €<br><br>";
                    echo "<form action='' method='post'>";
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
                        $producto = $catalogo[$indice];
                        $subtotal = $producto['precio'] * $cantidad;
                        $total += $subtotal;

                        echo "<div style='margin-bottom: 20px;'>";
                        echo "<img class='carrito' src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "'><br>";
                        echo "<strong>" . $producto['nombre'] . "</strong><br>";
                        echo "Precio: " . $producto['precio'] . " €<br>";
                        echo "Unidades: $cantidad<br><br>";
                        echo "Subtotal: " . $subtotal . " €<br>";
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='codigo' value='$indice'>";
                        echo "<input type='hidden' name='accion' value='eliminar'>";
                        echo "<button type='submit'>Eliminar</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                    echo "<p><strong>Total: " . $total . " €</strong></p>";
                } else {
                    echo "<p>El carrito está vacío.</p>";
                    echo "<p><strong>Total: " . $total . " €</strong></p>";
                }
                ?>
            </td>
        </tr>
    </table>
</body>

</html>