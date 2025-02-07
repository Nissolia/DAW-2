<?php
if (session_status() == PHP_SESSION_NONE) session_start();
// atributo de clase
if (!isset($_SESSION['kilometrajeTotal'])) {
    $_SESSION['kilometrajeTotal'] = 0;
}
class Coche
{
    public static function getKilometrajeTotal()
    {
        return $_SESSION['kilometrajeTotal'];
    }
    private $marca;
    private $modelo;
    private $kilometraje;
    public function __construct($ma, $mo)
    {
        $this->marca = $ma;
        $this->modelo = $mo;
        $this->kilometraje = 0;
    }
    public function getKilometraje()
    {
        return $this->kilometraje;
    }
    public function recorre($km)
    {
        $this->kilometraje += $km;
        $_SESSION['kilometrajeTotal'] += $km;
    }
}
