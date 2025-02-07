<!-- Confeccionar una clase Menu, con los atributos titulo y enlace (ambos son arrays).
 Crear los métodos necesarios que permitan añadir elementos al menú.
 Crear los  métodos que permitan mostrar el menú en forma horizontal
 o vertical (según que método llamemos). -->
 <?php
class Menu
{
    private $titulo = [];
    private $enlace = [];

    // Métodos para añadir elementos al menú
    public function __construct($t, $e) {  $this->titulo[] = $t;
        $this->enlace[] = $e;}

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getEnlace()
    {
        return $this->enlace;
    }

    public function setTitulo($t)
    {
        $this->titulo[] = $t; // Añade al array
    }

    public function setEnlace($e)
    {
        $this->enlace[] = $e; // Añade al array
    }


    // Mostrar menú en forma vertical
    public function vertical()
    {
        $cadena = "";
        $cadena .= "<table>";
        $cadena .= "<tr><th>Título</th><th>Enlace</th></tr>";
        for ($i = 0; $i < count($this->titulo); $i++) {
            $cadena .= "<tr>";
            $cadena .= "<td>" . $this->titulo[$i] . "</td>";
            $cadena .= "<td><a href='" . $this->enlace[$i] . "'>" . $this->enlace[$i] . "</a></td>";
            $cadena .= "</tr>";
        }
        $cadena .= "</table>";
        return $cadena;
    }

    // Mostrar menú en forma horizontal
    public function horizontal()
    {
        $cadena = "";
        $cadena .= "<table>";
        $cadena .= "<tr>";
        for ($i = 0; $i < count($this->titulo); $i++) {
            $cadena .= "<th>" . $this->titulo[$i] . "</th>";
        }
        $cadena .= "</tr><tr>";
        for ($i = 0; $i < count($this->enlace); $i++) {
            $cadena .= "<td><a href='" . $this->enlace[$i] . "'>" . $this->enlace[$i] . "</a></td>";
        }
        $cadena .= "</tr>";
        $cadena .= "</table>";
        return $cadena;
    }
}
?>
