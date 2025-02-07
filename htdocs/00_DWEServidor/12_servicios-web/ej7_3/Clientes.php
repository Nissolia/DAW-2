<?php require_once 'TiendaBD.php';
class Clientes
{
    private $nombre;
    private $token;
    private $peticiones;

    // construct
    function __construct($nombre = "", $token = "", $peticiones = "")
    {
        $this->nombre = $nombre;
        $this->token = $token;
        $this->peticiones = $peticiones;
    }
    // getters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function getPeticiones()
    {
        return $this->peticiones;
    }
    // funciones de mysql
    public function insert()
    {
        $conexion = TiendaBD::connectDB();
        $insercion = "INSERT INTO clientes (nombre, token, peticiones) 
        VALUES ('$this->nombre', '$this->token','$this->peticiones')";
        $conexion->exec($insercion);
    }

    public function update()
    {
        $conexion = TiendaBD::connectDB();
        $actualizacion = "UPDATE clientes 
                          SET nombre = '$this->nombre',
                              token = '$this->token',
                              peticiones = '$this->peticiones'";
        $conexion->exec($actualizacion);
    }

    public function delete()
    {
        $conexion = TiendaBD::connectDB();
        $borrado = "DELETE FROM clientes WHERE nombre='$this->nombre'";
        $conexion->exec($borrado);
    }

    public static function getclientesFiltroPrecio($min, $max)
    {
        $conexion = TiendaBD::connectDB();
        $consulta = $conexion->query("SELECT * FROM clientes WHERE precio BETWEEN $min AND $max");
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'clientes');
    }

    public static function getclientesFiltroNombre($nombre)
    {
        $conexion = TiendaBD::connectDB();
        $consulta = $conexion->query("SELECT * FROM clientes WHERE nombre LIKE '%$nombre%'");
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'clientes');
    }
}
