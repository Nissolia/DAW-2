<?php
require_once '../Model/MantenimientoDB.php';
class Usuario
{
    private $id;
    private $nombre;
    private $perfil;

    function __construct($id = 0, $nombre = "", $perfil = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->perfil = $perfil;
    }

    public function insert()
    {
        $conexion = MantenimientoDB::connectDB();
        $insercion = "INSERT INTO usuario (nombre, perfil) VALUES ('$this->nombre', '$this->perfil')";
        $conexion->exec($insercion);
    }

    public static function getUsuarios()
    {
        $conexion = MantenimientoDB::connectDB();
        $seleccion = "SELECT * FROM usuario";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->id, $registro->nombre, $registro->perfil);
        }
        return $usuarios;
    }
    public static function getUsuarioById($id)
    {
        $conexion = MantenimientoDB::connectDB();
        $seleccion = "SELECT * FROM usuario WHERE id=$id";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $usuario = new Usuario($registro->id, $registro->nombre, $registro->perfil);
            return $usuario;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }
    // GET USUARIO BY NOMBRE
    public static function getUsuarioByNombre($nombre)
    {
        $conexion = MantenimientoDB::connectDB();
        $seleccion = "SELECT * FROM usuario WHERE nombre = '$nombre'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $usuario = new Usuario($registro->id, $registro->nombre, $registro->perfil);
        return $usuario;
    }
    // admin
    public static function getAdminById($id)
    {
        $conexion = MantenimientoDB::connectDB();
        $seleccion = "SELECT * FROM usuario WHERE id=$id and perfil = 'admin'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $usuario = new Usuario($registro->id, $registro->nombre, $registro->perfil);
            return $usuario;
        } else {
            return false;
        }
    }
    // Get incidencias by admin
    public static function getIncidenciasByAdmin($idAdmin)
    {
        $conexion = MantenimientoDB::connectDB();
        // si da false no existe ese profesor en las incidencias
        if (Usuario::getAdminById($idAdmin)) {
            // miramos que la incidencia coincida con el nombre del profesor
            $seleccion = "SELECT * FROM incidencia where `admin` LIKE $idAdmin and estado LIKE 'PENDIENTES' and estado LIKE 'REPARANDO'";
            $consulta = $conexion->query($seleccion);
            $usuario = [];
            while ($registro = $consulta->fetchObject()) {
                $registro = $consulta->fetchObject();
                $usuario[] = new Usuario($registro->id, $registro->nombre, $registro->perfil);
            }
            return $usuario;
        } else {
            return false;
        }
    }
    // indicencias resueltas por el profesor
    public static function getIncidenciasResueltasByAdmin($idAdmin)
    {
        $conexion = MantenimientoDB::connectDB();
        // si da false no existe ese profesor en las incidencias
        if (Usuario::getAdminById($idAdmin)) {
            // miramos que la incidencia coincida con el nombre del profesor
            $seleccion = "SELECT * FROM incidencia where `admin` = $idAdmin and estado LIKE 'RESUELTA'";
            $consulta = $conexion->query($seleccion);
            $usuario = [];
            while ($registro = $consulta->fetchObject()) {
                $registro = $consulta->fetchObject();
                $usuario[] = new Usuario($registro->id, $registro->nombre, $registro->perfil);
            }
            return $usuario;
        } else {
            return false;
        }
    }
    // get incidencias by estado
    public static function getIncidenciasByEstado($estado)
    {
        $conexion = MantenimientoDB::connectDB();
        // si da false no existe ese profesor en las incidencias
        if ($estado != 'RESUELTA' || $estado != 'PENDIENTE' || $estado != 'REPARANDO') {
            // devolvemos falso si nos dan información incorrecta
            return false;
        } else {
            // miramos que la incidencia coincida con el nombre del profesor
            $seleccion = "SELECT * FROM incidencia where estado LIKE $estado";
            $consulta = $conexion->query($seleccion);
            $estado = [];
            while ($registro = $consulta->fetchObject()) {
                $registro = $consulta->fetchObject();
                $estado[] = new Usuario($registro->id, $registro->nombre, $registro->perfil);
            }
            return $estado;
        }
    }
    // nuevo id de admin para incidencias
    public static function cambioAdminIncidencias($idIncidencia, $idNuevo)
    {
        // si existe nos dara true y podemos actualizar el id que nos han pasado
        $conexion = MantenimientoDB::connectDB();
        $actualizando = "UPDATE incidencia SET `admin`='$idNuevo' where id = $idIncidencia ";
        $conexion->exec($actualizando);
    }
    // nuevo id de admin para incidencias
    public static function cambioAdminIncidenciasAdmins($idAntiguo, $idNuevo)
    {
        // si existe nos dara true y podemos actualizar el id que nos han pasado
        $conexion = MantenimientoDB::connectDB();

        $actualizando = "UPDATE incidencia SET `admin`='$idNuevo' where `incidencia`.`id` = $idAntiguo ";
        $conexion->exec($actualizando);
    }
}
 // ayuda de examen: metodos que segun solucion 
 // ultima linea cambio admin de incidencia : actualiza admin al nuevo,
//  incidencias en estado de reparacion
 // con id admin recibido al nuevo