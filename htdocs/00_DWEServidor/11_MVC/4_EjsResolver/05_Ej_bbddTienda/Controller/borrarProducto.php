<?php
require_once '../Model/Productos.php';

if (isset($_REQUEST['id'])) {
    // Obtener el ID del producto a eliminar
    $data['idEliminar'] = $_REQUEST['id'];

    // Incluir la vista para confirmar la eliminación
    include '../View/borrarProducto_v.php';
} else {
    // Si no se ha recibido un ID válido, redirigir al inicio
    header('Location: ../index.php');
    exit();
}

