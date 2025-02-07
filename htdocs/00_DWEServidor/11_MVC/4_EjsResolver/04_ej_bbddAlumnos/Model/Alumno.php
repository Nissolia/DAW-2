<?php require_once 'EscuelaDB.php';
class Alumno
{
    // alumno
    private $matricula;
    private $nombre;
    private $apellidos;
    private $curso;

    // construct
    function __construct($matricula = "", $nombre = "", $apellidos = "", $curso = "")
    {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->curso = $curso;
    }
    // getters
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCurso()
    {
        return $this->curso;
    }

    // funciones de mysql
    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO alumno (matricula, nombre, apellidos, curso) 
        VALUES ('$this->matricula','$this->nombre', '$this->apellidos','$this->curso')";
        $conexion->exec($insercion);
    }
    public function update($nombre, $apellidos, $curso, $matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $actualizacion = "UPDATE alumno 
                          SET nombre = '$this->nombre',
                              apellidos = '$this->apellidos',
                              curso = '$this->curso',
                          WHERE matricula = '$this->matricula'";
        $conexion->exec($actualizacion);
    }


    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM alumno WHERE matricula='$this->matricula'";
        $conexion->exec($borrado);
    }
    public static function getAlumno()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $alumno = [];
        while ($registro = $consulta->fetchObject()) {
            $alumno[] = new alumno(
                $registro->matricula,
                $registro->nombre,
                $registro->apellidos,
            );
        }
        return $alumno;
    }
    public static function getAlumnoByMatricula($id)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno WHERE matricula=\"" . $id . "\"";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $alumno = new alumno(
                $registro->matricula,
                $registro->nombre,
                $registro->apellidos,
                $registro->curso,
            );
            return $alumno;
        } else {
            return false;
        }
        $conexion = null;
    }
}
