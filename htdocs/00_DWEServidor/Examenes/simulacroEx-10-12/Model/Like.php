<?php
require_once 'FotografiasDB.php';
require_once 'Usuario.php';
require_once 'Foto.php';

class Like
{
    private $id_foto;
    private $id_usuario;

    // Constructor con valores por defecto
    function __construct($id_foto = 0, $id_usuario = 0)
    {
        $this->id_foto = $id_foto;
        $this->id_usuario = $id_usuario;
    }

    // Métodos getters
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function getId_foto()
    {
        return $this->id_foto;
    }

    // Insertar un like en la base de datos
    public function insert()
    {
        $conexion = FotografiasDB::connectDB();
        
        // Escapar los valores para evitar inyecciones SQL, usando quote() para mayor seguridad
        $id_foto = $conexion->quote($this->id_foto);
        $id_usuario = $conexion->quote($this->id_usuario);

        // Consulta de inserción con valores escapados
        $insercion = "INSERT INTO likes (id_foto, id_usuario) VALUES ($id_foto, $id_usuario)";
        $conexion->exec($insercion);
    }

    // Eliminar un like de la base de datos
    public function delete()
    {
        $conexion = FotografiasDB::connectDB();

        // Escapar los valores para evitar inyecciones SQL
        $id_foto = $conexion->quote($this->id_foto);
        $id_usuario = $conexion->quote($this->id_usuario);

        // Consulta de eliminación con valores escapados
        $borrado = "DELETE FROM likes WHERE id_foto = $id_foto AND id_usuario = $id_usuario";
        $conexion->exec($borrado);
    }

    // Obtener todos los likes
    public static function getLikes()
    {
        $conexion = FotografiasDB::connectDB();
        $seleccion = "SELECT * FROM likes ORDER BY id_foto";
        $consulta = $conexion->query($seleccion);
        $likes = [];
        while ($registro = $consulta->fetchObject()) {
            $likes[] = new Like($registro->id_foto, $registro->id_usuario);
        }
        return $likes;
    }

    // Contar la cantidad de likes para una fotografía
    public static function contarLikes($id_foto)
    {
        $conexion = FotografiasDB::connectDB();

        // Escapar el valor para evitar inyecciones SQL
        $id_foto = $conexion->quote($id_foto);

        // Consulta de conteo de likes
        $seleccion = "SELECT COUNT(*) AS conteo FROM likes WHERE id_foto = $id_foto";
        $consulta = $conexion->query($seleccion);
        $fila = $consulta->fetchObject();
        $conexion = null; // Cerrar la conexión explícitamente
        return $fila->conteo;
    }

    // Obtener los likes de una foto específica por su id
    public static function getLikeById($id)
    {
        $conexion = FotografiasDB::connectDB();

        // Escapar el valor para evitar inyecciones SQL
        $id = $conexion->quote($id);

        // Consulta de likes por id
        $seleccion = "SELECT * FROM likes WHERE id_foto = $id";
        $consulta = $conexion->query($seleccion);
        $fotos = [];
        while ($registro = $consulta->fetchObject()) {
            $fotos[] = new Like($registro->id_foto, $registro->id_usuario);
        }
        return $fotos;
    }
}
?>
