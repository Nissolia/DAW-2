<?php
require_once '../Model/MantenimientoDB.php';
class Incidencia
{
    private $id;
    private $descripcion;
    private $profesor;
    private $fecha;
    private $estado;
    private $admin;

    function __construct($id = 0, $descripcion = "", $profesor = "", $fecha = "", $estado = "", $admin = "")
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->profesor = $profesor;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->admin = $admin;
    }

    public function insert()
    {
        $conexion = MantenimientoDB::connectDB();
        $insercion = "INSERT INTO incidencia (descripcion, profesor, fecha, estado) 
                        VALUES ('$this->descripcion', '$this->profesor',now(),'PENDIENTE')";
        $conexion->exec($insercion);
    }
    public function delete()
    {
        $conexion = MantenimientoDB::connectDB();
        $borrado = "DELETE FROM incidencia WHERE id='$this->id'";
        $conexion->exec($borrado);
    }
    public function update()
    {
        $conexion = MantenimientoDB::connectDB();
        $update = "UPDATE incidencia SET estado='$this->estado', admin=$this->admin WHERE id='$this->id'";
        $conexion->exec($update);
    }
    public static function getIncidencias()
    {
        $conexion = MantenimientoDB::connectDB();
        $seleccion = "SELECT * FROM incidencia";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->descripcion, $registro->profesor, $registro->fecha, $registro->estado, $registro->admin);
        }
        return $incidencias;
    }
    public static function getIncidenciaById($id)
    {
        $conexion = MantenimientoDB::connectDB();
        $seleccion = "SELECT * FROM incidencia WHERE id='$id'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $usuario = new Incidencia($registro->id, $registro->descripcion, $registro->profesor, $registro->fecha, $registro->estado, $registro->admin);
        return $usuario;
    }
    public static function getIncidenciaByAdmin($admin)
    {
        $conexion = MantenimientoDB::connectDB();
        $seleccion = "SELECT * FROM incidencia WHERE 'admin'=$admin";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $usuario = new Incidencia($registro->id, $registro->descripcion, $registro->profesor, $registro->fecha, $registro->estado, $registro->admin);
        return $usuario;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getProfesor()
    {
        return $this->profesor;
    }
    public function getFecha()
    {
        return date("d/m/Y", strtotime($this->fecha));
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAdmin()
    {
        return $this->admin;
    }
    public function setAdmin($admin)
    {
        $this->admin = $admin;
        return $this;
    }
    public static function getIncidenciasVisibles()
    {
        $conexion = MantenimientoDB::connectDB();
        // si da false no existe ese profesor en las incidencias

        // miramos que la incidencia coincida con el nombre del profesor
        $seleccion = "SELECT * FROM `incidencia` WHERE `estado` NOT LIKE 'RESUELTA'";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->descripcion, $registro->profesor, $registro->fecha, $registro->estado, $registro->admin);
        }
        return $incidencias;
    }
    public static function getIncidenciasResueltas()
    {
        $conexion = MantenimientoDB::connectDB();
        // si da false no existe ese profesor en las incidencias

        // miramos que la incidencia coincida con el nombre del profesor
        $seleccion = "SELECT * FROM `incidencia` WHERE `estado` LIKE 'RESUELTA'";
        $consulta = $conexion->query($seleccion);
        $incidencias = [];
        while ($registro = $consulta->fetchObject()) {
            $incidencias[] = new Incidencia($registro->id, $registro->descripcion, $registro->profesor, $registro->fecha, $registro->estado, $registro->admin);
        }
        return $incidencias;
    }
}
