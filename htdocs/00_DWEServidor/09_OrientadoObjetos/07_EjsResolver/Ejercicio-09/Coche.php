<?php
class Coche
{
    private $matricula;
    private $modelo;
    private $precio;

    // atributos para ver el coche mas caro
    private static $modeloCaro = "-";
    private static $precioCaro = 0;

    public function __construct($matricula, $modelo, $precio)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->precio = $precio;

        // actualizamos el coche mas caro, esto solo se usa en esta clase
        $this->actualizarMasCaro($modelo, $precio);
    }

    // miramos cual es el metodo mas caro con esta forma
    private function actualizarMasCaro($modelo, $precio)
    {
        if ($precio > self::$precioCaro) {
            self::$modeloCaro = $modelo;
            self::$precioCaro = $precio;
        }
    }

    public static function masCaro()
    {
        return "Modelo más caro: " . self::$modeloCaro . ", " . self::$precioCaro . " €";
    }

    // Getter y Setters
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function imprimir()
    {
        return '<tr><td>' . $this->matricula . '</td><td>' . $this->modelo . '</td><td>' . $this->precio . '</td><td>No procede</td></tr>';
    }
}
