<?php
require_once 'FotografiasDB.php';
require_once 'Usuario.php';
require_once 'Foto.php';
class Like
{
	private $id_foto;
	private $id_usuario;

	function __construct($id_foto = 0, $id_usuario = 0)
	{
		$this->id_foto = $id_foto;
		$this->id_usuario = $id_usuario;
	}
	public function getId_usuario()
	{
		return $this->id_usuario;
	}
	public function getId_foto()
	{
		return $this->id_foto;
	}
	public function insert()
	{
		$conexion = FotografiasDB::connectDB();
		$insercion = "INSERT INTO likes (id_foto, id_usuario) VALUES ($this->id_foto, $this->id_usuario)";
		$conexion->exec($insercion);
	}
	public function delete()
	{
		$conexion = FotografiasDB::connectDB();
		$borrado = "DELETE FROM likes WHERE id_foto=$this->id_foto AND id_usuario=$this->id_usuario";
		$conexion->exec($borrado);
	}
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

	public static function contarLikes($id_foto)
	{
		$conexion = FotografiasDB::connectDB();
		// select count(*) from likes where id_foto where id_foto
		$seleccion = "SELECT COUNT(*) as conteo FROM likes WHERE id_foto = $id_foto";
		$consulta = $conexion->query($seleccion);
		$fila = $consulta->fetchObject();
        $conexion = null;
		return $fila->conteo;
	}
}
