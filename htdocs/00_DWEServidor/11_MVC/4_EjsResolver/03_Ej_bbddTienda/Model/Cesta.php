<?php
require_once 'TiendaBD.php';

class Cesta
{
    private $id;
    private $codigo_producto;
    private $cantidad;

    public function __construct($codigo_producto, $cantidad)
    {
        $this->codigo_producto = $codigo_producto;
        $this->cantidad = $cantidad;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getCodigo_producto()
    {
        return $this->codigo_producto;
    }


    public function getCantidad()
    {
        return $this->cantidad;
    }
    public static function getCesta()
    {
        $conexion = TiendaBD::connectDB();
        $consulta = "SELECT c.codigo_producto, p.nombre, p.precio, c.cantidad 
                     FROM cesta c 
                     JOIN productos p ON c.codigo_producto = p.id";  // Aquí cambiamos 'p.codigo' por 'p.id'
        $resultado = $conexion->query($consulta);
        $cesta = [];
        while ($fila = $resultado->fetchObject()) {
            $cesta[] = $fila;
        }
        return $cesta;
    }

    public static function obtenerCesta()
    {
        $conexion = TiendaBD::connectDB();
        $consulta = "SELECT c.codigo_producto, p.nombre, p.precio, c.cantidad 
                     FROM cesta c 
                     JOIN productos p ON c.codigo_producto = p.codigo";
        $resultado = $conexion->query($consulta);
        $cesta = [];
        while ($fila = $resultado->fetchObject()) {
            $cesta[] = $fila;
        }
        return $cesta;
    }

    public function agregarCesta()
    {
        $conexion = TiendaBD::connectDB();
        $codigo_producto = intval($this->codigo_producto);
        $cantidad = intval($this->cantidad);

        // Verificar si el producto ya está en la cesta
        $consulta = "SELECT cantidad FROM cesta WHERE codigo_producto = $codigo_producto";
        $resultado = $conexion->query($consulta);

        if ($resultado->rowCount() > 0) {
            // Producto ya en la cesta, actualizar cantidad
            $registro = $resultado->fetchObject();
            $nuevaCantidad = $registro->cantidad + $cantidad;
            $actualizacion = "UPDATE cesta SET cantidad = $nuevaCantidad WHERE codigo_producto = $codigo_producto";
            $conexion->exec($actualizacion);
        } else {
            // Producto no en la cesta, insertar nuevo registro
            $insercion = "INSERT INTO cesta (codigo_producto, cantidad) VALUES ($codigo_producto, $cantidad)";
            $conexion->exec($insercion);
        }
    }


    public static function vaciarCesta()
    {
        $conexion = TiendaBD::connectDB();
        $conexion->exec("DELETE FROM cesta");
    }

    public static function borrarProductoCesta($codigo_producto)
    {
        $conexion = TiendaBD::connectDB();
        $conexion->exec("DELETE FROM cesta WHERE codigo_producto = $codigo_producto");
    }

    public static function procesarCompra()
    {
        $conexion = TiendaBD::connectDB();
        $cesta = self::obtenerCesta();
        $factura = "Factura:\n";

        foreach ($cesta as $item) {
            $codigo_producto = $item->codigo_producto;
            $cantidad = $item->cantidad;

            // Obtener el producto de la base de datos
            $consulta = "SELECT stock FROM productos WHERE codigo = $codigo_producto";
            $resultado = $conexion->query($consulta);
            $producto = $resultado->fetchObject();

            if ($producto->stock >= $cantidad) {
                // Actualizar stock
                $nuevoStock = $producto->stock - $cantidad;
                $conexion->exec("UPDATE productos SET stock = $nuevoStock WHERE codigo = $codigo_producto");

                // Añadir a la factura
                $factura .= "Producto: {$item->nombre} | Cantidad: $cantidad | Precio unitario: {$item->precio}\n";
            }
        }

        self::vaciarCesta(); // Vaciar la cesta

        // Crear archivo de factura
        $archivoFactura = 'factura_' . time() . '.txt';
        file_put_contents($archivoFactura, $factura);

        // Retornar la ubicación del archivo
        return $archivoFactura;
    }
    public static function contarObjetosEnCesta($id)
    {
        $conexion = TiendaBD::connectDB();
        $consulta = "SELECT COUNT(*) as total FROM cesta WHERE codigo_producto = $id";
        $resultado = $conexion->query($consulta);
        $fila = $resultado->fetchObject();
        return $fila->total;
    }


}
