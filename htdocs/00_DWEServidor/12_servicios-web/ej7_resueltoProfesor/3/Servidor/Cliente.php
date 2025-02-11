<?php
require_once 'TiendaDB.php';
class Cliente {
    private $nombre;
    private $token;
    private $peticiones;

    function __construct($nombre="", $token="nulo", $peticiones=0) {	
        $this->nombre = $nombre;
        $this->token = $token;
        $this->peticiones = $peticiones;
    }

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO clientes (nombre, token, peticiones) VALUES (\"".$this->nombre."\", \"".$this->token."\", \"".$this->peticiones."\")";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM clientes WHERE nombre=\"".$this->nombre."\"";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = TiendaDB::connectDB();
        $actualiza = "UPDATE clientes SET nombre=\"".$this->nombre."\", token=\"".$this->token."\", peticiones=\"".$this->peticiones."\" WHERE nombre=\"".$this->nombre."\"";
        $conexion->exec($actualiza);
    }
    public static function getClientes() {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT nombre, token, peticiones FROM clientes ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $clientes = [];
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->nombre, $registro->token, $registro->peticiones);
        }
        return $clientes;
    }
    public static function getClienteById($nombre) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT nombre, token, peticiones FROM clientes WHERE nombre=\"".$nombre."\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $cliente = new Cliente($registro->nombre, $registro->token, $registro->peticiones);
        return $cliente;
    }
    public static function comprueba($nombre, $token) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM clientes WHERE nombre='$nombre' AND token='$token'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            return true;
        }else{
            return false;
        }
    }
    public function sumaConsulta() {
        $this->peticiones++;
        $this->update();
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
