<?php
class Gato extends Mamifero {
    public function maullar() {
        return $this->nombre . " está maullando.";
    }

    public function cazar() {
        return $this->nombre . " está cazando.";
    }

    public function ronronear() {
        return $this->nombre . " está ronroneando.";
    }
}
?>
