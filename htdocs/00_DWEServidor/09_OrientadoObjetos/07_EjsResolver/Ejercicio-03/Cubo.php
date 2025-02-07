<!-- Crear una clase cubo que contenga información sobre la capacidad y
 su contenido actual en litros. Se podrá consultar tanto la capacidad 
 como el contenido en cualquier momento. Dotar a la clase de la
 capacidad de verter el contenido de un cubo en otro
 (hay que tener en cuenta si el contenido del cubo origen cabe 
 en el cubo destino, si no cabe, se verterá solo el contenido que quepa). 
 Hacer una página principal para probar el funcionamiento 
 con un par de cubos. -->

<?php
class Cubo
{
    private $capacidad;
    private $contenidoAct;
    //constructor
    public function __construct($ca = 10, $co = 0)
    {
        // tema capacidad y contenido, contenido debe tener la misma capacidad
        $this->contenidoAct = $co;
        $this->capacidad = $ca;
    }
    // get disponibles, es mejor para ver si hay hueco o no
    // getter y setters
    // setcontenido si capacidad mayor o igual contenido metemos contenido nuevo
    function getCapacidad()
    {
        return $this->capacidad;
    }
    function getContenidoAct()
    {
        return $this->contenidoAct;
    }
    //metodos
    // meter el cubo llamado en este, primero cuanto le vabe la cubo. llamamos get disponible
    function verterUnoOtro($otro)
    {
        // if ($cubo->getCapacidad() < $lpasado) {
        //     $this->contenidoAct += $cubo->getCapacidad();
        // } else   if ($this->contenidoAct < $lpasado) {

        //     $this->contenidoAct += $this->capacidad;
        // } else {
        //     $this->contenidoAct += $lpasado;
        // }

        if ($this->contenidoAct > $this->capacidad) {
            $this->contenidoAct = $this->capacidad;
        }
        return "<h3 style='color:blue;'>El cubo tiene ahora: $this->contenidoAct litros</h3>";
    }
    public function __toString()
    {
        return "<hr> El cubo tiene una <b>capacidad</b> de $this->capacidad l<br>
        y el <b>contenido actual</b> de $this->contenidoAct l.
       ";
    }
}
