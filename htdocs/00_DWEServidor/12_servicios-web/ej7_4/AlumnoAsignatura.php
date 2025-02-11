<?php
require_once 'EscuelaDB.php';
require_once 'Alumno.php';
require_once 'Asignatura.php';

class AlumnoAsignatura
{
    private $matricula;
    private $codigoAsignatura;

    function __construct($matricula = "", $codigoAsignatura = "")
    {
        $this->matricula = $matricula;
        $this->codigoAsignatura = $codigoAsignatura;
    }

    public function getCodigoAsignatura()
    {
        return $this->codigoAsignatura;
    }

    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO alumno_asignatura (matricula, codigoAsignatura) 
                      VALUES ('$this->matricula', '$this->codigoAsignatura')";
        return $conexion->exec($insercion);
    }

    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM alumno_asignatura 
                    WHERE matricula='$this->matricula' AND codigoAsignatura='$this->codigoAsignatura'";
        return $conexion->exec($borrado);
    }

    public static function getAsignaturasByAlu($matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno_asignatura WHERE matricula='$matricula'";
        $consulta = $conexion->query($seleccion);
        $asignaturas = [];

        while ($registro = $consulta->fetchObject()) {
            $asignaturas[] = new AlumnoAsignatura(
                $registro->matricula,
                $registro->codigoAsignatura
            );
        }
        return $asignaturas;
    }

    public static function getMatricula($matricula, $codigoAsignatura)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno_asignatura 
                      WHERE matricula='$matricula' AND codigoAsignatura='$codigoAsignatura'";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount() > 0) {
            return true; // La matrícula ya existe
        } else {
            return false; // La matrícula no existe
        }
    }

    public static function deleteAlumno($matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM alumno_asignatura WHERE matricula='$matricula'";
        return $conexion->exec($borrado);
    }
}