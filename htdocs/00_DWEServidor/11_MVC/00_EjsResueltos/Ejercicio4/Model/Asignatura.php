<?php
require_once 'EscuelaDB.php';
class Asignatura {
	private $codigo;
	private $nombre;

	function __construct($codigo=0, $nombre="") {
		$this->codigo = $codigo;	
		$this->nombre = $nombre;
	}

	public function insert() {
		$conexion = EscuelaDB::connectDB();
		$insercion = "INSERT INTO asignatura (nombre) VALUES (\"".$this->nombre."\")";
		$conexion->exec($insercion);
	}
	public function delete() {
		$conexion = EscuelaDB::connectDB();
		$borrado = "DELETE FROM asignatura WHERE codigo=\"".$this->codigo."\"";
		$conexion->exec($borrado);
	}
	public function update() {
		$conexion = EscuelaDB::connectDB();
		$actualiza = "UPDATE asignatura SET nombre=\"".$this->nombre."\" WHERE codigo=\"".$this->codigo."\"";
		$conexion->exec($actualiza);
	}
	public static function getAsignaturas() {
		$conexion = EscuelaDB::connectDB();
		$seleccion = "SELECT codigo, nombre FROM asignatura ORDER BY nombre";
		$consulta = $conexion->query($seleccion);
		$asignaturas = [];
		while ($registro = $consulta->fetchObject()) {
			$asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
		}
		return $asignaturas;
	}
	public static function getAsignaturaById($codigo) {
		$conexion = EscuelaDB::connectDB();
		$seleccion = "SELECT codigo, nombre FROM asignatura WHERE codigo=\"".$codigo."\"";
		$consulta = $conexion->query($seleccion);
		$registro = $consulta->fetchObject();
		$asignatura = new Asignatura($registro->codigo, $registro->nombre);
		return $asignatura;
	}

	public function getCodigo(){
		return $this->codigo;
	}
	public function setCodigo($codigo){
		$this->codigo = $codigo;
		return $this;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
		return $this;
	}
}