<?php
function pedirConexion($bd)
{
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=" . $bd . ";charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "<h1 style='color:red;'>No se ha podido establecer conexión con el servidor de bases de datos.</h1><br>";
        die("Error: " . $e->getMessage());
    }
    return $conexion;
}

// Función para recorrer una tabla
function recorrerTabla($conexion, $tabla)
{
    $consulta = $conexion->query("SELECT * FROM " . $tabla);
    while ($fila = $consulta->fetchObject()) {
        echo '<br>' . $fila->dni;
    }
}

// Función para contar filas de una consulta
function contarFilas($consulta)
{
    return $consulta->rowCount();
}

// Función para cerrar conexión
function cerrarConexion($conexion)
{
    $conexion = null;
}

// Función para ejecutar operaciones de inserción, actualización o eliminación
function ejecutarOperacion($conexion, $sql)
{
    try {
        $conexion->exec($sql);
        echo "Operación realizada con éxito.<br>";
    } catch (PDOException $e) {
        echo "Error al ejecutar la operación: " . $e->getMessage();
    }
}

// Función para insertar un nuevo producto
function insertarRegistro($conexion, $nombre, $precio, $detalle, $imagen)
{
    $insercion = "INSERT INTO productos (nombre, precio, imagen, detalle) 
                  VALUES ('$nombre', '$precio', '$imagen', '$detalle')";
    $conexion->exec($insercion);
}

// Función para eliminar un producto
function eliminarRegistro($conexion, $id)
{
    $delete = "DELETE FROM productos WHERE id='$id'";
    $conexion->exec($delete);
}

?>
