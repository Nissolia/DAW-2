<?php
require_once 'TiendaDB.php';
class Usuario {
    private $id;
    private $nombre;
    private $pass;
    private $rol;

    function __construct($id=0, $nombre="", $pass=0, $rol="cliente") {
        $this->id = $id;	
        $this->nombre = $nombre;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO usuario (nombre, pass, rol) VALUES ('$this->nombre', $this->pass, '$this->rol')";
        $conexion->exec($insercion);
    }
    public function delete() {
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM usuario WHERE id=$this->id";
        $conexion->exec($borrado);
    }
    public function update() {
        $conexion = TiendaDB::connectDB();
        $actualiza = "UPDATE usuario SET nombre='$this->nombre', pass=$this->pass, rol='$this->rol' WHERE id=$this->id";
        $conexion->exec($actualiza);
    }
    public static function getUsuarios() {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM usuario ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->id, $registro->nombre, $registro->pass, $registro->rol);
        }
        return $usuarios;
    }
    public static function getUsuarioById($id) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM usuario WHERE id=$id";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $usuario = new Usuario($registro->id, $registro->nombre, $registro->pass, $registro->rol);
        return $usuario;
    }
    public static function comprobar($nombre, $pass) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT * FROM usuario WHERE nombre='$nombre' AND pass='$pass'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro=$consulta->fetchObject();
            return new Usuario($registro->id, $registro->nombre, $registro->pass, $registro->rol);
        } else {
            return false;
        }        
    }


    public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id = $id;

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
    public function getpass()
    {
        return $this->pass;
    }
    public function setpass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
    public function getrol()
    {
        return $this->rol;
    }
    public function setrol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
}
