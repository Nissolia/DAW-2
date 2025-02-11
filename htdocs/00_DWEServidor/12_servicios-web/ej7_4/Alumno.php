<?php
require_once 'EscuelaDB.php';

class Alumno
{
    private $matricula;
    private $nombre;
    private $apellidos;
    private $curso;

    public function __construct($matricula = "", $nombre = "", $apellidos = "", $curso = "")
    {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->curso = $curso;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $sql = "INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$this->matricula, $this->nombre, $this->apellidos, $this->curso]);
    }

    public function update()
    {
        $conexion = EscuelaDB::connectDB();
        $sql = "UPDATE alumno SET nombre = ?, apellidos = ?, curso = ? WHERE matricula = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$this->nombre, $this->apellidos, $this->curso, $this->matricula]);
    }

    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $sql = "DELETE FROM alumno WHERE matricula = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$this->matricula]);
    }

    public static function getAlumno()
    {
        $conexion = EscuelaDB::connectDB();
        $sql = "SELECT * FROM alumno ORDER BY nombre";
        $stmt = $conexion->query($sql);
        $alumnos = [];
        while ($registro = $stmt->fetchObject()) {
            $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
        }
        return $alumnos;
    }

    public static function getAlumnoByMatricula($id)
    {
        $conexion = EscuelaDB::connectDB();
        $sql = "SELECT * FROM alumno WHERE matricula = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        
        if ($stmt->rowCount() > 0) {
            $registro = $stmt->fetchObject();
            return new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
        }
        return false;
    }

    public static function getAlumnosFiltroNombre($nombre)
    {
        $conexion = EscuelaDB::connectDB();
        $sql = "SELECT * FROM alumno WHERE nombre LIKE ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(["%$nombre%"]);
        $alumnos = [];
        while ($registro = $stmt->fetchObject()) {
            $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
        }
        return $alumnos;
    }

    public static function getAlumnosFiltroGrupo($grupo)
    {
        $conexion = EscuelaDB::connectDB();
        $sql = "SELECT * FROM alumno WHERE curso = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$grupo]);
        $alumnos = [];
        while ($registro = $stmt->fetchObject()) {
            $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
        }
        return $alumnos;
    }
}