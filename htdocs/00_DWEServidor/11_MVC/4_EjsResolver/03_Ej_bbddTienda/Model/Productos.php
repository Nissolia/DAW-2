<?php require_once 'TiendaBD.php';
class Productos
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $stock;
    // construct
    function __construct($id = "", $nombre = "", $descripcion = "", $precio = "", $imagen = "", $stock = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->stock = $stock;
    }
    // getters
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getId()
    {
        return $this->id;
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
        $insercion = "INSERT INTO productos (nombre, descripcion, precio, imagen, stock) 
        VALUES ('$this->nombre', '$this->descripcion','$this->precio','$this->imagen', '$this->stock')";
        $conexion->exec($insercion);
    }
    public function update()
    {
        $conexion = TiendaBD::connectDB();
        $actualizacion = "UPDATE productos 
                          SET nombre = '$this->nombre',
                              descripcion = '$this->descripcion',
                              precio = '$this->precio',
                              imagen = '$this->imagen',
                              stock = '$this->stock' 
                          WHERE id = '$this->id'";
        $conexion->exec($actualizacion);
    }


    public function delete()
    {
        $conexion = TiendaBD::connectDB();
        $borrado = "DELETE FROM productos WHERE id='$this->id'";
        $conexion->exec($borrado);
    }
    public static function getProductos()
    {
        $conexion = TiendaBD::connectDB();
        $seleccion = "SELECT * FROM productos ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $productos = [];
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new productos(
                $registro->id,
                $registro->nombre,
                $registro->descripcion,
                $registro->precio,
                $registro->imagen,
                $registro->stock
            );
        }
        return $productos;
    }
    public static function getProductosById($id)
    {
        $conexion = TiendaBD::connectDB();
        $seleccion = "SELECT * FROM productos WHERE id=\"" . $id . "\"";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $productos = new productos(
                $registro->id,
                $registro->nombre,
                $registro->descripcion,
                $registro->precio,
                $registro->imagen,
                $registro->stock
            );
            return $productos;
        } else {
            return false;
        }
        $conexion = null;
    }
    // Reponemos productos del stock
    public function reponer($numero)
    {
        if ($numero > 0) {
            $conexion = TiendaBD::connectDB();
            // Tomamos el producto correspondiente al ID
            $producto = Productos::getProductosById($this->id);

            if ($producto) { // Validamos que el producto exista
                // Calculamos el nuevo stock y actualizamos el producto
                $nuevoStock = $producto->getStock() + $numero;
                $producto->stock = $nuevoStock;
                $producto->update();
            }
            $conexion = null; // Cerramos la conexión
        }
    }

    // Retiramos productos del stock
    public function vender($numero)
    {
        if ($numero > 0) {
            $conexion = TiendaBD::connectDB();
            // Tomamos el producto correspondiente al ID
            $producto = Productos::getProductosById($this->id);

            if ($producto) { // Validamos que el producto exista
                // Verificamos que haya suficiente stock
                if ($producto->getStock() >= $numero) {
                    // Calculamos el nuevo stock y actualizamos el producto
                    $nuevoStock = $producto->getStock() - $numero;
                    $producto->update(); // Asumimos que update() está bien implementado
                }
            }
            $conexion = null; // Cerramos la conexión
        }
    }

    // Añadir producto a la cesta considerando el stock
    public function anadirCarro($cantidad, &$cesta)
    {
        if ($this->stock >= $cantidad) {
            $cesta[$this->id] = isset($cesta[$this->id]) ? $cesta[$this->id] + $cantidad : $cantidad;
            return true;
        }
        return false; // No hay suficiente stock
    }

    // Procesar compra desde la cesta
    public static function procesarCompra(&$cesta)
    {
        $conexion = TiendaBD::connectDB();
        $factura = "Factura:\n";
        foreach ($cesta as $idProducto => $cantidad) {
            $producto = self::getProductosById($idProducto);
            if ($producto && $producto->getStock() >= $cantidad) {
                $nuevoStock = $producto->getStock() - $cantidad;
                $producto->stock = $nuevoStock;
                $producto->update();

                $factura .= "Producto: {$producto->getNombre()} | Cantidad: $cantidad | Precio: {$producto->getPrecio()}\n";
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
    }
    public static function actualizarStock($id, $nuevoStock) {
        $conexion = TiendaBD::connectDB();
        $stmt = $conexion->query("UPDATE productos SET stock = ? WHERE codigo = ?");
       
        return $stmt->execute();
    }

    
}
