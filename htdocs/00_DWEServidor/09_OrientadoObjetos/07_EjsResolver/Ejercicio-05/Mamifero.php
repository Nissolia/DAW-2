<?php
class Mamifero extends Animal {
    public function amamantar() {
        return $this->nombre . " está amamantando a sus crías.";
    }

    public function caminar() {
        return $this->nombre . " está caminando.";
    }

    public function hacerSonido() {
        return $this->nombre . " hace un sonido característico de mamífero.";
    }
}
?>
