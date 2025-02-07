<?php
session_start();
include_once 'libreria.php'; // Incluye la conexión a la base de datos

// Crear la conexión a la base de datos
$conexion = pedirConexion("tienda");

// Obtener productos desde la base de datos
$consulta = $conexion->query("SELECT * FROM productos");

// Agregar producto
if (isset($_POST['agregar'])) {
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];  // Cambié 'detalle' por 'descripcion'

    // Consulta de inserción (uso de parámetros directos en la consulta)
    $insercion = "INSERT INTO productos (precio, imagen, descripcion) 
                  VALUES ('$precio', '$imagen', '$descripcion')";
    $conexion->query($insercion);
    header("Location: " . $_SERVER['PHP_SELF']); // Redireccionar para evitar reenvío de formulario
    exit();
}

// Eliminar producto
if (isset($_POST['eliminar'])) {
    $codigo = $_POST['eliminar'];
    // Consulta de eliminación
    $delete = "DELETE FROM productos WHERE id='$codigo'";
    $conexion->query($delete);
    header("Location: " . $_SERVER['PHP_SELF']); // Redireccionar para evitar reenvío de formulario
    exit();
}

// Modificar producto
if (isset($_POST['modificar'])) {
    $codigo = $_POST['id'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];

    // Consulta de modificación
    $update = "UPDATE productos 
               SET precio='$precio', imagen='$imagen', descripcion='$descripcion' 
               WHERE id='$codigo'";
    $conexion->query($update);
    header("Location: " . $_SERVER['PHP_SELF']); // Redireccionar para evitar reenvío de formulario
    exit();
}

// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Administrar Productos</h2>
    <a href="paginaPrincipal.php">Volver a la tienda</a>
    <table>
        <tr>
            <th class="tabla titulo_tabla">Precio</th>
            <th class="tabla titulo_tabla">Imagen</th>
            <th class="tabla titulo_tabla">Descripción</th> <!-- Cambié 'Detalle' por 'Descripción' -->
            <th class="tabla titulo_tabla">Acción</th>
        </tr>
        
        <?php 
        // Mostrar productos obtenidos de la base de datos
        while ($producto = $consulta->fetchObject()) {
            echo "<tr>";
            echo "<td class='producto_tabla'>" . $producto->precio . "€</td>";
            echo "<td class='producto_tabla'><img src='" . $producto->imagen . "' alt='" . $producto->descripcion . "' width='50'></td>";
            echo "<td class='producto_tabla'>" . $producto->descripcion . "</td>";
            echo "<td class='producto_tabla'>
                <form method='post'>
                    <input type='hidden' name='eliminar' value='" . $producto->id . "'>
                    <input class='boton' type='submit' value='Eliminar'>
                </form>
                <form method='post'>
                    <input type='hidden' name='id' value='" . $producto->id . "'>
                    <input type='text' name='precio' value='" . $producto->precio . "' required>
                    <input type='text' name='imagen' value='" . $producto->imagen . "' required>
                    <textarea name='descripcion' required>" . $producto->descripcion . "</textarea><br>
                    <input class='boton' type='submit' name='modificar' value='Modificar'>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <h3>Agregar Producto</h3>
    <form method="post">
        <label>Precio: <input type="number" name="precio" required></label><br>
        <label>Imagen URL: <input type="text" name="imagen" required></label><br>
        <label>Descripción: <textarea name="descripcion" required></textarea></label><br> <!-- Cambié 'detalle' por 'descripcion' -->
        <input class="boton" type="submit" name="agregar">Agregar Producto</input>
    </form>
</body>
</html>
