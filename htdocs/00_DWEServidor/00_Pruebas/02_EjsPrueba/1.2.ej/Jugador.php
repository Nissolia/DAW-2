<?php
include_once 'Cartas.php';
if (session_status() === PHP_SESSION_NONE) session_start();


class Jugador
{
    
    private $nombre;
    private $ganadas;
    private $perdidas;
    // iniciamos a 0 las ganadas y perdidas
    public function __construct($nom)
    {
        $this->nombre = $nom;
        $this->ganadas = 0;
        $this->perdidas = 0;
    }
    

    public function getPerdidas()
    {
        return $this->perdidas;
    }

    public function setPerdidas($perdidas)
    {
        $this->perdidas = $perdidas;

        return $this;
    }

    public function getGanadas()
    {
        return $this->ganadas;
    }


    public function setGanadas($ganadas)
    {
        $this->ganadas = $ganadas;

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
    function sumarPerdidas(){
        $this->perdidas ++;
    }
    function sumarGanadas(){
        $this->ganadas ++;
    }
}
