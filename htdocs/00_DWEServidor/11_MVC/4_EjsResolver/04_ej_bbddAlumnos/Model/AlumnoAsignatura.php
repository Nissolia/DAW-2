<?php require_once 'EscuelaDB.php';
require_once 'Alumno.php';
require_once 'Asignatura.php';
// clase asignatura
class AlumnoAsignatura
{
    // alumno-asignatura
    private $matricula;
    private $codigoAsignatura;

    // construct
    function __construct($codigoAsignatura = "", $matricula = "")
    {
        $this->codigoAsignatura = $codigoAsignatura;
        $this->matricula = $matricula;
    }
    // getters
    public function getCodigoAsignatura()
    {
        return $this->codigoAsignatura;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }
    // funciones de mysql
    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO alumno-asignatura (matricula, codigoAsignatura) 
        VALUES ('$this->matricula', '$this->codigoAsignatura')";
        $conexion->exec($insercion);
    }
    public function update()
    {
        $conexion = EscuelaDB::connectDB();
        $actualizacion = "UPDATE alumno-asignatura 
                          SET matricula = '$this->matricula',
                              codigoAsignatura = '$this->codigoAsignatura',
                          WHERE codigoAsignatura = '$this->codigoAsignatura'";
        $conexion->exec($actualizacion);
    }


    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM alumno-asignatura WHERE codigo-asignatura='$this->codigoAsignatura'";
        $conexion->exec($borrado);
    }
    public static function getAlumnoAsignatura()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno-asignatura ORDER BY matricula";
        $consulta = $conexion->query($seleccion);
        $alumnoAsignatura = [];
        while ($registro = $consulta->fetchObject()) {
            $alumnoAsignatura[] = new AlumnoAsignatura(
                $registro->matricula,
                $registro->codigoAsignatura
            );
        }
        return $alumnoAsignatura;
    }
    public static function getAlumnoAsignaturaById($id)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno-asignatura WHERE codigo-asignatura=\"" . $id . "\"";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $alumnoAsignatura = new AlumnoAsignatura(
                $registro->codigoAsignatura,
                $registro->matricula,
            );
            return $alumnoAsignatura;
        } else {
            return false;
        }
        $conexion = null;
    }
}
// alumnosbyasignatura(id-asignatura) - devuelve array con alumnos
function alumnosByAsignatura($idAsignatura)
{
    $conexion = EscuelaDB::connectDB();
    $seleccion = "SELECT * FROM alumno-asignatura WHERE codigo-asignatura=\"" . $idAsignatura . "\"";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
        $registro = $consulta->fetchObject();
        return Alumno::getAlumnoByMatricula($registro);
    } else {
        return false;
    }
    $conexion = null;
}
// asignaturasbyalumno(matricula-alumno) - array asignaturas
function asignaturasByAlumno($matAlumno)
{
    $conexion = EscuelaDB::connectDB();
    $seleccion = "SELECT * FROM alumno-asignatura WHERE matricula=\"" . $matAlumno . "\"";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
        $registro = $consulta->fetchObject();
        return Asignatura::getAsignaturaById($registro);
    } else {
        return false;
    }
    $conexion = null;
}
// asignaturasLibresbyalumno(matricula-alumno) - array de las asignaturas en las que no participa
function asignaturasLibresByAlumno($matAlumno)
{
    // select * from asignatura where id not in
    // (select ... id de los que essta matruiculado)
    $conexion = EscuelaDB::connectDB();
    $seleccion = "SELECT * FROM asignatura WHERE 
    matricula=' . $matAlumno . ' not in (SELECT * FROM alumno-asignatura WHERE )";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
        $registro = $consulta->fetchObject();
        return Asignatura::getAsignaturaById($registro);
    } else {
        return false;
    }
    $conexion = null;
}
