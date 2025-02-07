<?php
class Provincias
{
    public int $id;
    public string $nombre;
    public int $comunidad;

    function __construct($id, $nombre, $comunidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->comunidad = $comunidad;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getComunidad()
    {
        return $this->comunidad;
    }
}
