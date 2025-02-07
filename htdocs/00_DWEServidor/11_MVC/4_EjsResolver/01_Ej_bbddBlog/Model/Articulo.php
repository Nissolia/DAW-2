<?php require_once 'BlogBD.php';
class Articulo
{
    private $id;
    private $titulo;
    private $fecha;
    private $contenido;
    function __construct($id = "", $titulo = "", $fecha = "", $contenido = "")
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->contenido = $contenido;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getfecha()
    {
        return date("d/m/Y - H:i",strtotime($this->fecha));
        // return $this->fecha;
    }
    public function getContenido()
    {
        return $this->contenido;
    }
    public function insert()
    {
        $conexion = BlogBD::connectDB();
        $insercion = "INSERT INTO articulo (titulo, fecha, contenido) VALUES ('$this->titulo', NOW(), '$this->contenido')";
        $conexion->exec($insercion);
    }
    public function update($id, $titulo, $contenido)
    {
        $conexion = BlogBD::connectDB();
        $actualizacion = "UPDATE articulo 
                          SET titulo = '$titulo', fecha = NOW(), contenido = '$contenido' 
                          WHERE id = $id";
        $conexion->exec($actualizacion);
    }

    public function delete()
    {
        $conexion = BlogBD::connectDB();
        $borrado = "DELETE FROM articulo WHERE id='$this->id'";
        $conexion->exec($borrado);
    }
    public static function getArticulos()
    {
        $conexion = BlogBD::connectDB();
        $seleccion = "SELECT * FROM articulo ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $articulos = [];
        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new articulo(
                $registro->id,
                $registro->titulo,
                $registro->fecha,
                $registro->contenido
            );
        }
        return $articulos;
    }
    public static function getArticuloById($id)
    {
        $conexion = BlogBD::connectDB();
        $seleccion = "SELECT * FROM articulo WHERE id=\"" . $id . "\"";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $articulo = new articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
            return $articulo;
        } else {
            return false;
        }
    }
}
