<?php // Clase Pinguino que hereda de Ave
class Pinguino extends Ave {
    public function nadar() {
        return $this->nombre . " está nadando en el agua.";
    }

    public function deslizarse() {
        return $this->nombre . " se desliza sobre el hielo.";
    }

    public function hacerSonido() {
        return $this->nombre . " emite un sonido característico de pingüino.";
    }
}?>