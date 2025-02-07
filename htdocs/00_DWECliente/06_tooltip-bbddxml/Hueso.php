<?php
class Hueso {

    public string $id;
    public string $nombre_web;
    public string $descripcion;

    function __construct(string $id, string $nombre_web, string $descripcion)
    {
        $this->id = $id;
        $this->nombre_web = $nombre_web;
        $this->descripcion = $descripcion;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNombre_web(): string
    {
        return $this->nombre_web;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
}
?>
