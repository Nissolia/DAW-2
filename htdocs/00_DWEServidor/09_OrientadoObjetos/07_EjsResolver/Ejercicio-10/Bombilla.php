<?php
// hacer con static del interruptor general
class Bombilla
{
    private $encendida;
    private $potencia;
    private $ubicacion;

    public function __construct($ubicacion, $potencia)
    {
        // la ponemos por defecto pagada
        $this->encendida = false;
        $this->potencia = $potencia;
        $this->ubicacion = $ubicacion;
    }

    public function encender()
    {
        $this->encendida = true;
    }

    public function apagar()
    {
        $this->encendida = false;
    }

    public function estaEncendida()
    {
        return $this->encendida;
    }
    // la usamos para la potencia que esta activa
    public function getPotencia()
    {
        return $this->encendida ? $this->potencia : 0;
    }
    // la usamos para ver la potencia de la bombilla
    public function getPotenciaBombilla()
    {
        return $this->potencia;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }
}
