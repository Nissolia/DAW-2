<?php

if (session_status() === PHP_SESSION_NONE) session_start();
// sesiones usadas
if (!isset($_SESSION['emisores'])) {
    $_SESSION['emisores'] = [];
}
/////////////////////////////////////////////////
// funcion usuarios ficheros
function usuariosFichero($nomFichero)
{
    // creamos las opciones que tendremos disponibles en el fichero
    $arrayLineas = file($nomFichero);
    //   inicializamos a cero para repartir el array
    foreach ($arrayLineas as $key => $value) {
        // separamos los arrays por el caracter de la coma
        $usuarios = explode(",", $value);
        //  creamos la sesion de usuarios
        // print_r($usuarios);
        // echo "<hr>";
        // esto al hacerlo en el index funcionaba y ahora no se porque no va :( )
        $_SESSION['usuarios'][] = new Email($usuarios[0], $usuarios[1], $usuarios[2], $usuarios[3]);
        // print_r($_SESSION['usuarios']);
        // echo "<hr>"; // comprobacion si se guardo correctamente en sesion
    }
    foreach ($_SESSION['usuarios'] as $key => $value) {
        // tenemos el emisor
        if (!in_array($value->getEmisor(), $_SESSION['emisores'])) { //si no existe en sesion lo añadimos
            // guardamos los emisores en una sesion para usarlo en el session y donde corresponda
            $_SESSION['emisores'][] = $value->getEmisor();
        }
    }
}
// funcion para añadir un nuevo email
function anadirEmail($objEmail)
{
    $_SESSION['usuarios'][] = $objEmail;
    $finalArray = count($_SESSION['usuarios']) - 1;
    $archivo = fopen("emails.txt", "a"); //archivo que va a escribir al final

    $_SESSION['usuarios'][$finalArray]->imprimir();
    $objString =  base64_encode(serialize($_SESSION['usuarios'][$finalArray]));
    fputs($archivo,  $objString);

    fclose($archivo);
}
function actualizarFichero()
{
    $archivo = fopen("emails.txt", "a"); //archivo que va a escribir al final
    foreach ($_SESSION['usuarios'] as $index => $value) {
        $value->imprimir();
        $objString =    base64_encode(serialize($value->imprimir()));
        fputs($archivo,  $objString);
    }
    fclose($archivo);
    // $_SESSION['usuarios']
}
