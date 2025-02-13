<?php
require_once 'FotografiasDB.php';
require_once 'like.php';
class Foto
{
	private $id;
	private $imagen;
	private $id_usuario;

	function __construct($id = 0, $imagen = "", $id_usuario = 0)
	{
		$this->id = $id;
		$this->imagen = $imagen;
		$this->id_usuario = $id_usuario;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	public function getImagen()
	{
		return $this->imagen;
	}
	public function setImagen($imagen)
	{
		$this->imagen = $imagen;
		return $this;
	}
	public function getId_usuario()
	{
		return $this->id_usuario;
	}
	public function setId_usuario($id)
	{
		$this->id_usuario = $id;
		return $this;
	}
	public function insert()
	{
		$conexion = FotografiasDB::connectDB();
		$insercion = "INSERT INTO fotos VALUES (null, '$this->imagen', $this->id_usuario)";
		$conexion->exec($insercion);
	}
	public function delete()
	{
		$conexion = FotografiasDB::connectDB();
		$borrado = "DELETE FROM fotos WHERE id=$this->id";
		$conexion->exec($borrado);
	}
	public function update()
	{
		$conexion = FotografiasDB::connectDB();
		$actualiza = "UPDATE fotos SET id_usuario=$this->id_usuario WHERE id=$this->id";
		$conexion->exec($actualiza);
	}
	public static function getFotos()
	{
		$conexion = FotografiasDB::connectDB();
		$seleccion = "SELECT * FROM fotos ORDER BY imagen";
		$consulta = $conexion->query($seleccion);
		$fotos = [];
		while ($registro = $consulta->fetchObject()) {
			$fotos[] = new Foto($registro->id, $registro->imagen, $registro->id_usuario);
		}
		return $fotos;
	}
	public static function getFotosById($id)
	{
		$conexion = FotografiasDB::connectDB();
		$seleccion = "SELECT * FROM fotos WHERE id = $id";
		$consulta = $conexion->query($seleccion);
		$fotos = [];
		while ($registro = $consulta->fetchObject()) {
			$fotos[] = new Foto($registro->id, $registro->imagen, $registro->id_usuario);
		}
		return $fotos;
	}

	public static function getFotoById($id) {
		$conexion = FotografiasDB::connectDB();
		$consulta = $conexion->query("SELECT * FROM fotos WHERE id = $id");
		$resultado = $consulta->fetchObject('Foto');
		return $resultado ?: null; // Si no encuentra nada, devuelve null
	}
	
	
}
