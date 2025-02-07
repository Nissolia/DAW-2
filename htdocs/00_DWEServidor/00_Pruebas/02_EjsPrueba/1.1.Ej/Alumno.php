<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['notasGlobales'])) {
    $_SESSION['notasGlobales'] = [];
}

class Alumno
{
    private $nombre;
    private $curso;
    private $notas = [];

    public function __construct($nom, $cur)
    {
        $this->nombre = $nom;
        $this->curso = $cur;
    }

    public function mediaNotas()
    {
        $suma = 0;
        $contador = 0;

        foreach ($this->notas as $nota) {
            $suma += $nota;
            $contador++;
        }

        return $contador > 0 ? $suma / $contador : 0; // Evitamos división por cero.
    }

    public function insertarNotas($notas)
    {
        // Supongamos que se recibe un string separado por comas.
        $temporal = explode(',', $notas); // Separamos el string en elementos.

        foreach ($temporal as $nota) {
            if ($nota >= 0 && $nota <= 10) {
                $this->notas[] = floatval($nota); // Convertimos manualmente a número.
            }
        }

        $this->actualizarNotasGlobales();
    }

    private function actualizarNotasGlobales()
    {
        foreach ($this->notas as $nota) {
            $_SESSION['notasGlobales'][] = $nota;
        }
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function setCurso($curso)
    {
        $this->curso = $curso;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getNotas()
    {
        return $this->notas;
    }

    public function setNotas($notas)
    {
        $this->notas = [];

        foreach ($notas as $nota) {
            $this->notas[] = floatval($nota); // Conversión manual a número.
        }

        return $this;
    }

    public function imprimir()
    {
        $info = "Nombre: {$this->nombre}\n";
        $info .= "Curso: {$this->curso}\n";
        $info .= "Notas: ";

        foreach ($this->notas as $nota) {
            $info .= $nota . ", ";
        }

        $info = trim($info, ", ") . "\n"; // Quitamos la última coma.
        $info .= "Media: " . $this->mediaNotas() . "\n";

        return $info;
    }
}
?>
