<?php
require_once 'TiendaDB.php';
require_once 'Producto.php';
class Cesta {
    private $id_cliente;
    private $cod_producto;
    private $cantidad;

    function __construct($id_cliente=0, $cod_producto="", $cantidad=1) {
        $this->id_cliente = $id_cliente;	
        $this->cod_producto = $cod_producto;
        $this->cantidad = $cantidad;
    }

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO cesta (id_cliente, cod_producto, cantidad) VALUES ($this->id_cliente, $this->cod_producto, $this->cantidad)";
        $conexion->exec($insercion);
        $conexion = null;
    }
    public function delete() {
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM cesta WHERE id_cliente=$this->id_cliente AND cod_producto=$this->cod_producto";
        $conexion->exec($borrado);
        $conexion = null;
    }
    public function añadir($num=1) {
        $conexion = TiendaDB::connectDB();
        $this->cantidad+=$num;
        $actualiza = "UPDATE cesta SET cantidad=$this->cantidad WHERE id_cliente=$this->id_cliente AND cod_producto=$this->cod_producto";
        $conexion->exec($actualiza);
        $conexion = null;
    }
    
    public static function getCestaById($id_cliente, $cod_producto) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM cesta WHERE id_cliente=$id_cliente AND cod_producto=$cod_producto";
        $consulta = $conexion->query($seleccion);
        if ($registro = $consulta->fetchObject()) {
            $conexion = null;
            return new Cesta($registro->id_cliente, $registro->cod_producto, $registro->cantidad);
        }else{
            $conexion = null;
            return false;
        }
    }
    // public static function getProductosByCliente($id_cliente) {
    //     $conexion = TiendaDB::connectDB();
    //     $seleccion = "SELECT * FROM cesta WHERE id_cliente=$id_cliente";
    //     $consulta = $conexion->query($seleccion);
    //     $productos = [];
    //     while ($registro = $consulta->fetchObject()) {
    //         $productos[] = Producto::getProductoById($registro->cod_producto);
    //     }
    //     return $productos;
    // }
    public static function getCestaByCliente($id_cliente) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM cesta WHERE id_cliente=$id_cliente";
        $consulta = $conexion->query($seleccion);
        $cesta = [];
        while ($registro = $consulta->fetchObject()) {
            $cesta[] = new Cesta($registro->id_cliente, $registro->cod_producto, $registro->cantidad);
        }
        $conexion = null;
        return $cesta;
    }
    public static function getCantidadByCliente($id_cliente) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT SUM(cantidad) as total FROM cesta WHERE id_cliente=$id_cliente";
        $consulta = $conexion->query($seleccion);
        $cantidad = $consulta->fetchObject()->total??0;
        $conexion = null;
        return $cantidad;
    }
    public static function getTotalByCliente($id_cliente) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM cesta WHERE id_cliente=$id_cliente";
        $consulta = $conexion->query($seleccion);
        $total = 0;
        while ($registro = $consulta->fetchObject()) {
            if ($producto = Producto::getProductoById($registro->cod_producto)){
                $total += ($producto->getPrecio() * $registro->cantidad);
            }
        }
        $conexion = null;
        return $total;
    }
    
    public static function vaciarCestaByCliente($id_cliente) {
        $conexion = TiendaDB::connectDB();
		$borrado = "DELETE FROM cesta WHERE id_cliente=$id_cliente";
		$conexion->exec($borrado);
        $conexion = null;
	}

    public function getId_cliente()
    {
        return $this->id_cliente;
    }
    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }
    public function getCod_producto()
    {
        return $this->cod_producto;
    }
    public function setNombre($cod_producto)
    {
        $this->cod_producto = $cod_producto;

        return $this;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
