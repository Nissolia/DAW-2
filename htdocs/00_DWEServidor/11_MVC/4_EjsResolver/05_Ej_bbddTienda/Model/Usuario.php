<?php
require_once 'TiendaBD.php';

class Usuario
{
    private $id;
    private $nombre;
    private $pass;
    private $rol;


    public function __construct($id, $nombre, $pass, $rol)
    {
        $this->nombre = $nombre;
        $this->id = $id;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    public function getPass()
    {
        return $this->pass;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getRol()
    {
        return $this->rol;
    }

    
    public static function getUsuario()
    {
        $conexion = TiendaBD::connectDB();
        $seleccion = "SELECT * FROM usuario ORDER BY rol";
        $consulta = $conexion->query($seleccion);
        $usuario = [];
        while ($registro = $consulta->fetchObject()) {
            $usuario[] = new Usuario(
                $registro->id,
                $registro->nombre,
                $registro->pass,
                $registro->rol
            );
        }
        $conexion = null;
        return $usuario;
    }
    // comprobar where nombre and pass son iguales a los de nuestra bdd - con cow cont si no encuentra nada devuelve faalso el contrario es un objeto
}
