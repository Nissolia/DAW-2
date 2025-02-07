<?php require_once 'EscuelaDB.php';
class Asignatura
{

    // asignatura
    private $codigoAsignatura;
    private $nombre;

    // construct
    function __construct($nombre = "", $codigoAsignatura = "")
    {
        $this->nombre = $nombre;
        $this->codigoAsignatura = $codigoAsignatura;
    }
    // getters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCodigoAsignatura()
    {
        return $this->codigoAsignatura;
    }

    // funciones de mysql
    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO asignatura (codigo-asignatura, nombre) 
        VALUES ('$this->codigoAsignatura', '$this->nombre')";
        $conexion->exec($insercion);
    }
    public function update()
    {
        $conexion = EscuelaDB::connectDB();
        $actualizacion = "UPDATE asignatura 
                          SET codigo-asignatura = '$this->codigoAsignatura',
                              nombre = '$this->nombre'
                          WHERE id = '$this->codigoAsignatura'";
        $conexion->exec($actualizacion);
    }


    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM asignatura WHERE codigo-asignatura='$this->codigoAsignatura'";
        $conexion->exec($borrado);
    }
    public static function getAsignatura()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM asignatura ORDER BY nombre";
        $consulta = $conexion->query($seleccion);
        $asignatura = [];
        while ($registro = $consulta->fetchObject()) {
            $asignatura[] = new Asignatura(
                $registro->codigoAsignatura,
                $registro->nombre,
            );
        }
        return $asignatura;
    }
    
    public static function getAsignaturaById($id)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = 'SELECT * FROM asignatura WHERE codigo-asignatura	=\"' . $id . ' \"';
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $asignatura = new Asignatura(
                $registro->codigoAsignatura,
                $registro->nombre,
            );
            return $asignatura;
        } else {
            return false;
        }
        $conexion = null;
    }
}
