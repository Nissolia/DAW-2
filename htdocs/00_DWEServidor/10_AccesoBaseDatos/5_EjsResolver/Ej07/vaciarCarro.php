<?php
session_start();

if (isset($_REQUEST['vaciar'])) {
   // Limpiar el archivo carrito.txt
file_put_contents('carrito.txt', '');  // Sobrescribe el archivo con un contenido vacío

// Redirigir al usuario a la página principal después de vaciar el carrito

}
header('Location: paginaPrincipal.php');
exit;
?>
