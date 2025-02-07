<?php
session_start();
include_once 'libreria.php';

// Verificar si se ha recibido el código del producto
if (isset($_POST['codigo'])) {
    // Crear conexión a la base de datos
    $conexion = pedirConexion("tienda");

    // Obtener el producto con el código proporcionado
    $codigo = $_POST['codigo'];
    $stmt = $conexion->prepare("SELECT * FROM productos WHERE id = :codigo");
    $stmt->bindParam(':codigo', $codigo);
    $stmt->execute();
    $producto = $stmt->fetchObject();

    if ($producto) {
        // Guardar el producto en el carrito (archivo)
        $carrito = file_get_contents('carrito.txt');
        $carrito .= $producto->id . "\n";  // Agregar el producto al carrito
        file_put_contents('carrito.txt', $carrito);  // Guardar los cambios en el archivo

        // Redirigir al usuario a la página principal
        header('Location: paginaPrincipal.php');
    }

    // Cerrar la conexión a la base de datos
    $conexion = null;
}
?>
