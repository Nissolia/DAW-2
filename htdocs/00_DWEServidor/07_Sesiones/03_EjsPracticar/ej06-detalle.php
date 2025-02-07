<?php
// Inicio de sesión
session_start();
if (isset($_REQUEST['codigo']) && isset($_SESSION['catalogo'][$_REQUEST['codigo']])) {
    $codigo = $_REQUEST['codigo'];
    $producto = $_SESSION['catalogo'][$codigo];
} else {
    echo "<p>Producto no encontrado.</p>";
    header("Location: ej06.php");
    exit;
}
// Inicializar carrito si no existe


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 Detalle</title>
    <link rel="stylesheet" href="css/ej06.css">
</head>
<!-- unidades de productos en el carrito -->

<body>
    <!-- Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada uno de los
productos del catálogo deberá tener un botón Detalle que, al ser accionado, debe llevar al usuario a la vista de
detalle que contendrá una descripción exhaustiva del producto en cuestión. Se podrán añadir productos al
carrito tanto desde la vista de listado como desde la vista de detalle. -->
    <h1>Detalle del producto</h1>
    <a class="boton" href="ej06.php"><button>Volver a la tienda</button></a>

    <div class='detalle'>
        <img src='<?php echo $producto["imagen"]; ?>' alt='<?php echo $producto["nombre"]; ?>'><br>
        <strong><?php echo $producto["nombre"]; ?></strong><br>
        Precio: <?php echo $producto["precio"]; ?> €<br><br>
        Unidades:
        <?php echo $producto["detalle"]; ?><br><br>

        <!-- Para mostrar el carrito -->
        <?php if (!isset($_SESSION['carrito'])) {
            echo "<p class='unidades' >No hay unidades de este producto.</p><br>";
        } else {
            echo "<p class='unidades' >Hay " . $_SESSION['carrito'][$codigo] . " unidades de este producto.</p><br>";
        }

        ?>

        <form action='ej06.php' method='post' style='display:inline-block;'>
            <pnput type='hidden' name='accion' value='comprar'>
                <pnput type='hidden' name='codigo' value='<?php echo $codigo; ?>'>
                    <button type='submit'>Comprar</button>
        </form>
    </div>

</body>

</html>