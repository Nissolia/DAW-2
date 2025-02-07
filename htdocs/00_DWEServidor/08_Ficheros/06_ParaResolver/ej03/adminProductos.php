<?php
session_start();
include 'funcionesProductos.php';
// Ruta del archivo
$archivoProductos = 'productos.txt'; 
$productos = cargarProductosDesdeArchivo($archivoProductos); 
if (!is_array($productos)) {
    $productos = []; // Asegurarse de que sea un array
}

// Agregar producto
if (isset($_POST['agregar'])) {
    $nuevoProducto = [
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'imagen' => $_POST['imagen'],
        'detalle' => $_POST['detalle'],
    ];
    $catalogo[] = $nuevoProducto;
    guardarCatalogo($archivoProductos, $catalogo);
    $_SESSION['catalogo'] = $catalogo;
}

// Eliminar producto
if (isset($_POST['eliminar'])) {
    $indice = (int) $_POST['indice'];
    unset($catalogo[$indice]);
    $catalogo = array_values($catalogo); // Reindexar
    guardarCatalogo($archivoProductos, $catalogo);
    $_SESSION['catalogo'] = $catalogo;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Administrar Productos</h2>
    <a href="paginaPrincipal.php">Volver a la tienda</a>
    <h3>Productos actuales</h3>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Detalle</th>
            <th>Acción</th>
        </tr>
        
        <?php 
       echo "<table>";
       echo "<tr><th>Nombre</th><th>Precio</th><th>Imagen</th><th>Detalle</th><th>Acción</th></tr>";
       
       if (!empty($productos)) {
           foreach ($productos as $codigo => $producto) {
               echo "<tr>";
               echo "<td>" . $producto['nombre'] . "</td>";
               echo "<td>" . $producto['precio'] . "€</td>";
               echo "<td><img src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "' width='50'></td>";
               echo "<td>" . $producto['detalle'] . "</td>";
               echo "<td>
                   <form method='post'>
                       <input type='hidden' name='eliminar' value='$codigo'>
                       <input type='submit' value='Eliminar'>
                   </form>
               </td>";
               echo "</tr>";
           }
       } else {
           echo "<tr><td colspan='5'>No hay productos disponibles.</td></tr>";
       }
              echo "</table>";
               ?>
    </table>
    <h3>Agregar Producto</h3>
    <form method="post">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Precio: <input type="number" name="precio" required></label><br>
        <label>Imagen URL: <input type="text" name="imagen" required></label><br>
        <label>Detalle: <textarea name="detalle" required></textarea></label><br>
        <button type="submit" name="agregar">Agregar Producto</button>
    </form>
</body>
</html>
