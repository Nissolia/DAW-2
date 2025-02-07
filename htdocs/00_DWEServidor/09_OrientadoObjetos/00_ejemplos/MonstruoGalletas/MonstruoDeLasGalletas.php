<?php
class MonstruoDeLasGalletas
{
    private $galletas; // galletas comidas
    public function __construct()
    {
        $this->galletas = 0;
    }
    public function getGalletas()
    {
        return $this->galletas;
    }
    public function come($g)
    {
        if ($g <= 0) {
            echo "<h3 style='color:red;'>Tu si que eres un mosntruo... No me quieres dar galletas</h3>";
        } else {
            $this->galletas = $this->galletas + $g;
        }
    }
}
