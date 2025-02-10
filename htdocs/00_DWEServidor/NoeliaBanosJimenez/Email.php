<?php
if (session_status() === PHP_SESSION_NONE) session_start();
class Email
{
    private $emisor;
    private $receptor;
    private $asunto;
    // string con formado dd-mm-aaaa
    private $fecha;
    // atributo estático 
    private static $importantes = 0;

    public function __construct($emisor, $receptor, $fecha, $asunto)
    {
        $this->emisor = trim($emisor);
        if (strtoupper($emisor) == strtoupper($receptor)) {
            $this->receptor = trim($receptor . "_bis");
        } else {
            $this->receptor = trim($receptor);
        }
        $this->asunto = trim($asunto);
        $this->fecha = trim($fecha);
        //    comprobamos que ha creado un email importante
        Email::comprobarImportante() ? Email::$importantes++ : 0;
    }
    // GETTERS
    public function getEmisor()
    {
        return $this->emisor;
    }

    public function getReceptor()
    {
        return $this->receptor;
    }

    public function getAsunto()
    {
        return $this->asunto;
    }

    public function getFecha()
    {
        return date("d-m-Y", strtotime($this->fecha));
    }
    function destacarAsunto()
    {
        // si NO da true es que no es importante
        if (Email::comprobarImportante()) {
            $frase = "IMPORTANTE " . $this->asunto;
            $this->asunto = $frase;
            // le añadimos +1 a importantes si es que lo cambiamos
            Email::$importantes++;
        }
    }
    // se comprueba si en el asunto tiene la palabra importante
    function comprobarImportante()
    {
        if (str_starts_with($this->asunto, "IMPORTANTE")) {
            return true;
        } else {
            return false;
        }
    }
    function retrasarEnvio()
    {
        // si la fecha es anterior al dia actual
        // creia que funcionaba pero no
        if (time(time($this->fecha) < (strtotime('now')))) {
            $_SESSION['error'] = "<h3 style='color:red;'>No puede ser una fecha anterior...</h3>";
        } else {
            // le sumamos a la fecha que tenemos un día
            $this->fecha += strtotime("$this->fecha+1 day");
        }
    }
static function sumarImportantes(){
    Email::$importantes += 1;
}
    // GETTER de importante
    static function getImportantes()
    {
        Email::$importantes;
    }
    function imprimir(){
        return Email::getEmisor().",".Email::getReceptor().",".Email::getFecha().",".Email::getAsunto();
        
    }
}
