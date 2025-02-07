<?php
require_once 'TiendaBD.php';

class Cesta
{
    private $id_cliente;
    private $cod_producto;
    private $cantidad;

    public function __construct($id_cliente = null, $cod_producto = "", $cantidad = "")
    {
        $this->cod_producto = $cod_producto;
        $this->id_cliente = $id_cliente;
        $this->cantidad = $cantidad;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getCod_producto()
    {
        return $this->cod_producto;
    }
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    //    GET CESTA
    public static function getCesta()
    {

        $conexion = TiendaBD::connectDB();
        $seleccion = "SELECT * FROM cesta";
        $consulta = $conexion->query($seleccion);
        $productos = [];
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Cesta(
                $registro->cod_producto,
                $registro->id_cliente,
                $registro->cantidad
            );
            $conexion = null;
        }
    }
    public static function getCestaId($id_cliente)
    {
        $conexion = TiendaBD::connectDB();
        $seleccion = "SELECT * FROM cesta WHERE id_cliente = " . ($id_cliente);
        $consulta = $conexion->query($seleccion);
        $productos = [];
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Cesta(
                $registro->id_cliente,
                $registro->cod_producto,
                $registro->cantidad
            );
        }
        $conexion = null;
        return $productos;
    }

    // Agregar producto a la cesta (actualiza o inserta)
    public function agregarCesta()
    {
        $conexion = TiendaBD::connectDB();

        // Comprobar si ya existe en la cesta
        $consulta = $conexion->query("SELECT * FROM cesta WHERE id_cliente = {$this->id_cliente} AND cod_producto = {$this->cod_producto}");
        if ($consulta->rowCount() > 0) {
            // Actualizar la cantidad
            $conexion->query("UPDATE cesta SET cantidad = cantidad + {$this->cantidad} WHERE id_cliente = {$this->id_cliente} AND cod_producto = {$this->cod_producto}");
        } else {
            // Insertar nuevo registro
            $conexion->query("INSERT INTO cesta (id_cliente, cod_producto, cantidad) VALUES ({$this->id_cliente}, {$this->cod_producto}, {$this->cantidad})");
        }
        $conexion = null;
    }

    public static function vaciarCestaUsuario($id_cliente)
    {
        $conexion = TiendaBD::connectDB();
        $conexion->exec("DELETE FROM cesta WHERE id_cliente = " . ($id_cliente));
        $conexion = null;
    }

    public static function borrarProductoCesta($id_cliente, $cod_producto)
    {
        $conexion = TiendaBD::connectDB();

        // Comprobar la cantidad actual del producto en la cesta
        $consulta = $conexion->query("SELECT cantidad FROM cesta WHERE id_cliente = $id_cliente AND cod_producto = $cod_producto");
        $producto = $consulta->fetchObject();

        if ($producto) {
            if ($producto->cantidad > 1) {
                // Si la cantidad es mayor a 1, solo reducir la cantidad
                $conexion->query("UPDATE cesta SET cantidad = cantidad - 1 WHERE id_cliente = $id_cliente AND cod_producto = $cod_producto");
            } else {
                // Si la cantidad es 1 o menos, eliminar el producto completamente
                $conexion->query("DELETE FROM cesta WHERE id_cliente = $id_cliente AND cod_producto = $cod_producto");
            }
        }
        $conexion = null;
    }

    public static function procesarCompra($id_cliente)
    {
        $conexion = TiendaBD::connectDB();

        // Obtener la cesta del usuario específico
        $cesta = self::getCestaId($id_cliente); // Llama al método para obtener la cesta por ID de cliente

        // Inicializar variables para el total de la factura
        $factura = "Factura para el cliente ID: $id_cliente\n\n";
        $totalSinIVA = 0; // Acumula el total antes del IVA
        $iva = 0;         // Se calculará más adelante
        $totalConIVA = 0; // Total final con IVA

        foreach ($cesta as $item) {
            $cod_producto = $item->getCod_producto();
            $cantidad = $item->getCantidad();

            // Obtener el producto de la base de datos
            $consulta = $conexion->query("SELECT nombre, stock, precio FROM productos WHERE codigo = $cod_producto");
            $producto = $consulta->fetchObject();

            if ($producto) {
                if ($producto->stock >= $cantidad) {
                    // Actualizar stock
                    $nuevoStock = $producto->stock - $cantidad;
                    $conexion->exec("UPDATE productos SET stock = $nuevoStock WHERE codigo = $cod_producto");

                    // Calcular el subtotal del producto
                    $subtotal = $producto->precio * $cantidad;

                    // Añadir detalles del producto a la factura
                    $factura .= "Producto: {$producto->nombre} | Cantidad: $cantidad | Precio Unitario: " . number_format($producto->precio, 2) . " | Subtotal: " . number_format($subtotal, 2) . "\n";

                    // Sumar al total sin IVA
                    $totalSinIVA += $subtotal;
                } else {
                    // Si no hay suficiente stock, incluir un mensaje en la factura
                    $factura .= "Producto: {$producto->nombre} | Cantidad solicitada: $cantidad | **Stock insuficiente**\n";
                }
            }
        }

        // Calcular el IVA (21% en este caso) y el total con IVA
        $iva = $totalSinIVA * 0.21; // IVA del 21%
        $totalConIVA = $totalSinIVA + $iva;

        // Añadir los totales a la factura
        $factura .= "\n----------------------------------\n";
        $factura .= "Total sin IVA: " . round($totalSinIVA, 2) . "\n";
        $factura .= "IVA (21%): " . round($iva, 2) . "\n";
        $factura .= "Total con IVA: " . round($totalConIVA, 2) . "\n";
        $factura .= "----------------------------------\n";

        // Vaciar la cesta del usuario
        self::vaciarCestaUsuario($id_cliente);

        // Crear la carpeta 'Facturas' si no existe
        $carpetaFacturas = 'Facturas';
        if (!is_dir($carpetaFacturas)) {
            mkdir($carpetaFacturas, 0777, true);
        }

        // Guardar la factura en un archivo dentro de la carpeta
        $archivoFactura = "$carpetaFacturas/factura_cliente_{$id_cliente}_" . time() . '.txt';
        file_put_contents($archivoFactura, $factura);

        $conexion = null;
        // Retornar la ubicación del archivo
        return $archivoFactura;
    }

    // Contar los productos en la cesta de un cliente
    public static function contarObjetosEnCesta($id_cliente)
    {
        $conexion = TiendaBD::connectDB();
        $consulta = $conexion->query("SELECT SUM(cantidad) AS conteo FROM cesta WHERE id_cliente = $id_cliente");  // Usamos query
        $fila = $consulta->fetchObject();
        $conexion = null;
        return $fila->conteo;
    }
}
