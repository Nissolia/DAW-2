<?php require_once 'TiendaBD.php';
class Productos
{
    private $codigo;
    private $nombre;
    private $precio;
    private $imagen;
    private $stock;
    // construct
    function __construct($codigo = "", $nombre = "",  $precio = "", $imagen = "", $stock = "")
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->stock = $stock;
    }
    // getters
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getStock()
    {
        return $this->stock;
    }
    // funciones de mysql
    public function insert()
    {
        $conexion = TiendaBD::connectDB();
        $insercion = "INSERT INTO productos (codigo,nombre,precio, imagen, stock) 
        VALUES (null,'$this->nombre', '$this->precio','$this->imagen', '$this->stock')";
        $conexion->exec($insercion);
        $conexion = null;
    }
    public function update()
    {
        $conexion = TiendaBD::connectDB();
        $actualizacion = "UPDATE productos 
                          SET nombre = '$this->nombre',
                              precio = '$this->precio',
                              imagen = '$this->imagen',
                              stock = '$this->stock' 
                          WHERE codigo = '$this->codigo'";
        $conexion->exec($actualizacion);
        $conexion = null;
    }


    public function delete()
    {
        $conexion = TiendaBD::connectDB();
    
        // Eliminar las entradas en la tabla 'cesta' que hacen referencia a este producto
        $borradoCesta = "DELETE FROM cesta WHERE cod_producto = '$this->codigo'";
        $conexion->query($borradoCesta);
    
        // Eliminar el producto de la tabla 'productos'
        $borradoProducto = "DELETE FROM productos WHERE codigo = '$this->codigo'";
        $conexion->query($borradoProducto);
        $conexion = null;
    }
    
    public static function getProductos()
    {
        $conexion = TiendaBD::connectDB();
        $seleccion = "SELECT * FROM productos";
        $consulta = $conexion->query($seleccion);
        $productos = [];
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Productos(
                $registro->codigo,
                $registro->nombre,
                $registro->precio,
                $registro->imagen,
                $registro->stock
            );
        }
        $conexion = null;
        return $productos;
    }
    public static function getProductosByCodigo($codigo)
    {
        $conexion = TiendaBD::connectDB();
        $seleccion = "SELECT * FROM productos WHERE codigo=\"" . $codigo . "\"";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $productos = new Productos(
                $registro->codigo,
                $registro->nombre,
                $registro->precio,
                $registro->imagen,
                $registro->stock
            );
            $conexion = null;
            return $productos;
        } else {
            $conexion = null;
            return false;
        }
    }
    // Reponemos productos del stock
    public function reponer($numero)
    {
        if ($numero > 0) {
            $conexion = TiendaBD::connectDB();
            // Tomamos el producto correspondiente al codigo
            $producto = Productos::getProductosByCodigo($this->codigo);

            if ($producto) { // Valcodigoamos que el producto exista
                // Calculamos el nuevo stock y actualizamos el producto
                $nuevoStock = $producto->getStock() + $numero;
                $producto->stock = $nuevoStock;
                $producto->update();
            }
        }
        $conexion = null; // Cerramos la conexión
    }

    // Retiramos productos del stock
    public function vender($num)
    {
        if ($num > 0) {
            $conexion = TiendaBD::connectDB();
            // Tomamos el producto correspondiente al código
            $producto = Productos::getProductosByCodigo($this->codigo);
    
            if ($producto) { // Validamos que el producto exista
                // Verificamos que haya suficiente stock
                if ($producto->getStock() >= $num) {
                    // Calculamos el nuevo stock
                    $nuevoStock = $producto->getStock() - $num;
                    // Actualizamos el stock directamente en la base de datos
                    self::actualizarStock($producto->getCodigo(), $nuevoStock); // Llamamos al método que actualiza el stock
                }
            }
            $conexion = null; // Cerramos la conexión
        }
    }
    

    // Añadir producto a la cesta conscodigoerando el stock
    public function anadirCarro($cantcodigoad, &$cesta)
    {
        if ($this->stock >= $cantcodigoad) {
            $cesta[$this->codigo] = isset($cesta[$this->codigo]) ? $cesta[$this->codigo] + $cantcodigoad : $cantcodigoad;
            return true;
        }
        return false; // No hay suficiente stock
    }

    // Procesar compra desde la cesta
    public static function procesarCompra(&$cesta)
    {
        $conexion = TiendaBD::connectDB();
        $factura = "Factura:\n";
        foreach ($cesta as $codigoProducto => $cantcodigoad) {
            $producto = self::getProductosByCodigo($codigoProducto);
            if ($producto && $producto->getStock() >= $cantcodigoad) {
                $nuevoStock = $producto->getStock() - $cantcodigoad;
                $producto->stock = $nuevoStock;
                $producto->update();

                $factura .= "Producto: {$producto->getNombre()} | Cantcodigoad: $cantcodigoad | Precio: {$producto->getPrecio()}\n";
            }
        }
        $cesta = []; // Vaciar la cesta

        // Crear archivo de factura
        $archivoFactura = 'factura_' . time() . '.txt';

        // Abrir el archivo en modo escritura ("w")
        if ($file = fopen($archivoFactura, "w")) {
            // Escribir la cabecera de la factura
            fputs($file, "Factura Generada:\n");
            fputs($file, "=================\n");

            // Escribir los detalles de la factura
            fputs($file, $factura . PHP_EOL);

            // Cerrar el archivo
            fclose($file);

            // Verificar si el archivo fue creado y es legible
            if (file_exists($archivoFactura) && is_readable($archivoFactura)) {
                // Redirigir al archivo creado
                header('Location: ' . $archivoFactura);
                exit();
            } else {
                echo "Error: No se pudo acceder al archivo generado.";
            }
        } else {
            echo "Error: No se pudo crear el archivo de factura.";
        }
        $conexion = null;
    }
    public static function actualizarStock($codigo, $nuevoStock)
    {
        $conexion = TiendaBD::connectDB();
        $consulta = "UPDATE productos SET stock = $nuevoStock WHERE codigo = $codigo";
        
        // Usamos query() directamente para ejecutar la consulta SQL
        $consultaDif = $conexion->query($consulta);
        $conexion = null;
        return $consultaDif;
    }
    
}
