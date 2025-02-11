<?php
require_once 'EscuelaDB.php';
require_once 'Alumno.php';
require_once 'Asignatura.php';
class AlumnoAsignatura {
	private $matricula;
	private $codigo;

	function __construct($matricula="", $codigo=0) {
		$this->codigo = $codigo;	
		$this->matricula = $matricula;
	}

	public function insert() {
		$conexion = EscuelaDB::connectDB();
		if (Alumno::getAlumnoById($this->matricula) && Asignatura::getAsignaturaById($this->codigo)) {
			$insercion = "INSERT INTO alumnoasignatura (matricula, codigo) VALUES (\"".$this->matricula."\", \"".$this->codigo."\")";
			$conexion->exec($insercion);
			return true;
		} else {
			return false;
		}
	}
	public function delete() {
		$conexion = EscuelaDB::connectDB();
		$borrado = "DELETE FROM alumnoasignatura WHERE matricula=\"".$this->matricula."\" AND codigo=\"".$this->codigo."\"";
		$conexion->exec($borrado);
	}
	public function deleteAsignatura() {
		$conexion = EscuelaDB::connectDB();
		$borrado = "DELETE FROM alumnoasignatura WHERE codigo=\"".$this->codigo."\"";
		$conexion->exec($borrado);
	}
	public function deleteAlumno() {
		$conexion = EscuelaDB::connectDB();
		$borrado = "DELETE FROM alumnoasignatura WHERE matricula=\"".$this->matricula."\"";
		$conexion->exec($borrado);
	}
	public static function getAsignaturasByAlu($mat) {
		$conexion = EscuelaDB::connectDB();
		$seleccion = "SELECT codigo FROM alumnoasignatura WHERE matricula=\"".$mat."\"";
		$consulta = $conexion->query($seleccion);
		$asignaturas = [];
		while ($registro = $consulta->fetchObject()) {
			$asignaturas[] = Asignatura::getAsignaturaById($registro->codigo);
		}
		return $asignaturas;
	}
	public static function getMatricula($matricula, $codigo) {
		$conexion = EscuelaDB::connectDB();
		$seleccion = "SELECT * FROM alumnoasignatura WHERE matricula='$matricula' AND codigo='$codigo'";
		$consulta = $conexion->query($seleccion);
		if ($consulta->rowCount() > 0) {
			$registro = $consulta->fetchObject();
            $matriculacion = new AlumnoAsignatura($registro->matricula, $registro->codigo);
            return $matriculacion;
		}else {
			return false;
		}
	}
	public static function getAsignaturasLibres($mat) {
		$conexion = EscuelaDB::connectDB();
		$seleccion = "SELECT codigo FROM asignatura WHERE codigo NOT IN(SELECT codigo FROM alumnoasignatura WHERE matricula=\"".$mat."\") ORDER BY nombre";
		$consulta = $conexion->query($seleccion);
		$asignaturas = [];
		while ($registro = $consulta->fetchObject()) {
			$asignaturas[] = Asignatura::getAsignaturaById($registro->codigo);
		}
		return $asignaturas;
	}
	public static function getAlumnosByAsig($cod) {
		$conexion = EscuelaDB::connectDB();
		$seleccion = "SELECT matricula FROM alumnoasignatura WHERE codigo=\"".$cod."\"";
		$consulta = $conexion->query($seleccion);
		$alumnos = [];
		while ($registro = $consulta->fetchObject()) {
			$alumnos[] = Alumno::getAlumnoById($registro->matricula);
		}
		return $alumnos;
	}
}