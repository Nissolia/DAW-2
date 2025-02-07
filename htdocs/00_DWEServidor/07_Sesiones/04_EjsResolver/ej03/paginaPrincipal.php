<!-- -----------------------------------------------------
 en detalle podemos añadir a la cesta
 se le puede añadir una página de añadir un producto nuevo y modificar su información
 administraicon x contraseña y usuario para el admin
 ----------------------------------------------------- -->
 <?php
session_start();
$cantidadProductos = 0;

// iniciamos el carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
   
    // comprobamos si existe una cookie con el carrito
    if (isset($_COOKIE['carrito'])) {
        // recuperar el carrito desde la cookie si existe
        $_SESSION['carrito'] = unserialize($_COOKIE['carrito']);
    } else {
        // iniciamos cookie si no existe
        setcookie("carrito", serialize($_SESSION['carrito']), strtotime("+2 days"));
    }
}

// calcular la cantidad de productos en el carrito para poder mostrarlo luego en la parte inferior
foreach ($_SESSION['carrito'] as $producto) {
    $cantidadProductos += $producto['cantidad'];
}

// iniciamos el catalogo de productos si es la primera vez que se reinicia la página
if (!isset($_SESSION['catalogo'])) {
    $_SESSION['catalogo'] = [
        [
            'nombre' => 'EasySMX X05 Mando PC Inalambrico',
            'precio' => 29.99,
            'imagen' => 'img/mando.jpg',
            'detalle' => 'Disfrute de un control de joystick mejorado con nuestros cuatro sensores de efecto Hall...',
        ],
        [
            'nombre' => 'Cello C1924SH TV de 19"',
            'precio' => 129.99,
            'imagen' => 'img/pantalla.jpg',
            'detalle' => 'Este televisor no es inteligente...',
        ],
        [
            'nombre' => 'Yosoo Mini Teclado Español Portátil',
            'precio' => 16.13,
            'imagen' => 'img/teclado.jpg',
            'detalle' => 'Intrínsecamente duradero, resistente y duradero...',
        ],
        [
            'nombre' => 'Logitech G300s',
            'precio' => 31.27,
            'imagen' => 'img/raton.jpg',
            'detalle' => 'Con un diseño versátil y una forma compacta...',
        ],
    ];
}

// añadimos un producto al carrito comprobando que existe el código y la cantidad
if (isset($_POST['comprar']) && isset($_POST['codigo']) && isset($_POST['cantidad'])) {
    $codigo = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];
// comprobamos que la cantidad es valida
    if ($cantidad > 0) {
        if (isset($_SESSION['carrito'][$codigo])) {
            // si el producto ya está en el carrito aumentamos la cantidad
            $_SESSION['carrito'][$codigo]['cantidad'] += $cantidad;
        } else {
            // si no está el producto en el carrito lo añadimos
            $producto = $_SESSION['catalogo'][$codigo];
            $_SESSION['carrito'][$codigo] = [
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'cantidad' => $cantidad
            ];
        }

        // guardar el carrito actualizado en la cookie
        setcookie("carrito", serialize($_SESSION['carrito']), strtotime("+1 day"));

        // mirar la cantidad de articulos en el carrito con un foreach
        $cantidadProductos = 0;
        foreach ($_SESSION['carrito'] as $producto) {
            $cantidadProductos += $producto['cantidad'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <tr>
            <td class="tabla titulo_tabla" colspan="3"><h2>Tienda</h2></td>
            <!-- Mostrar la cantidad de productos en la cesta -->
            <td class="tabla subtitulo_tabla cesta">
                <?php
                if ($cantidadProductos == 0) {
                    echo "La cesta<br>no tiene productos";
                } else {
                    echo "<a href='cesta.php'>La cesta tiene<br>" . $cantidadProductos . " productos.</a>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="tabla subtitulo_tabla">Producto</td>
            <td class="tabla subtitulo_tabla">Precio</td>
            <td class="tabla subtitulo_tabla">Imagen</td>
            <td class="tabla subtitulo_tabla"></td>
        </tr>

        <?php
        // Mostrar productos en el catálogo
        foreach ($_SESSION['catalogo'] as $i => $producto) {
            echo "<tr>";
            echo "<td class='producto_tabla'>" . $producto['nombre'] . "</td>";
            echo "<td class='producto_tabla'>" . $producto['precio'] . "€</td>";
            echo "<td class='producto_tabla picture'><a href='detalle.php?codigo=$i'><img src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "'></a></td>";
            echo "<td class='producto_tabla'>
                    <form action='paginaPrincipal.php' method='post'>
                        <input type='hidden' name='codigo' value='" . $i . "'>
                        <input type='number' name='cantidad' value='1' min='1' required>
                        <input class='boton' type='submit' name='comprar' value='Añadir al carrito'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
