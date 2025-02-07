<?php
class Animal {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function respirar() {
        return $this->nombre . " está respirando.";
    }

    public function dormir() {
        return $this->nombre . " está durmiendo.";
    }

    public function comer() {
        return $this->nombre . " está comiendo.";
    }
}
?>
