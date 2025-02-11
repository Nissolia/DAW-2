<?php
require_once 'TiendaDB.php';
class Producto {
    private $codigo;
    private $nombre;
    private $precio;
    private $imagen;
    private $stock;

    function __construct($codigo=0, $nombre="", $precio=0, $imagen="", $stock=0) {
        $this->codigo = $codigo;	
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->stock = $stock;
    }

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO productos (nombre, precio, imagen) VALUES (\"".$this->nombre."\", \"".$this->precio."\", \"".$this->imagen."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM productos WHERE codigo=\"".$this->codigo."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = TiendaDB::connectDB();
        $actualiza = "UPDATE productos SET nombre=\"".$this->nombre."\", precio=\"".$this->precio."\", imagen=\"".$this->imagen."\" WHERE codigo=\"".$this->codigo."\"";
        $conexion->exec($actualiza);
    }
    public static function getProductos() {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT codigo, nombre, precio, imagen, stock FROM productos ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $productos = [];
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->imagen, $registro->stock);
        }
        return $productos;
    }

    public static function getProductosFiltroPrecio($min, $max) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT codigo, nombre, precio, imagen, stock FROM productos WHERE precio >= ".$min." AND precio <=".$max;
        $consulta = $conexion->query($seleccion);
        $productos = [];
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->imagen, $registro->stock);
        }
        return $productos;
    }

    public static function getProductosFiltroNombre($cad) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT codigo, nombre, precio, imagen, stock FROM productos WHERE nombre LIKE \"%".$cad."%\"";
        $consulta = $conexion->query($seleccion);
        $productos = [];
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->imagen, $registro->stock);
        }
        return $productos;
    }
    public static function getProductoById($id) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT codigo, nombre, precio, imagen, stock FROM productos WHERE codigo=\"".$id."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $producto = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->imagen, $registro->stock);
        return $producto;
    }
    public function añade($cant) {
        $conexion = TiendaDB::connectDB();
        $cant+=Producto::getProductoById($this->codigo)->getStock();
        $actualiza = "UPDATE productos SET stock=\"".$cant."\" WHERE codigo=\"".$this->codigo."\"";
        $conexion->exec($actualiza);
    }
    public function vender($cant){
        $conexion = TiendaDB::connectDB();
        $stock=Producto::getProductoById($this->codigo)->getStock();
        $diferencia=$stock-$cant;
        if ($diferencia>=0) {
            $actualiza = "UPDATE productos SET stock=\"".$diferencia."\" WHERE codigo=\"".$this->codigo."\"";
            $conexion->exec($actualiza);
        }
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
    public function getStock()
    {
        return $this->stock;
    }
}
