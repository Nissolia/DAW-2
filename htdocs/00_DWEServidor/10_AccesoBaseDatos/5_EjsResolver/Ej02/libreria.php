<?php

function pedirConexion($tabla, $bd)
{
    try {

        // $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root","root"); 
        $conexion = new PDO("mysql:host=localhost;dbname=" . $bd . ";charset=utf8", "root",  "");
        // tiene que existir la base de datos para que funcione
        // echo "Se ha establecido una conexión con el servidor de bases de datos de " . $tabla;
    } catch (PDOException $e) {
        echo "<h1 style='color:red;'>No se ha podido establecer conexión con el servidor de bases de
        datos.</h1><br>";
        echo "<hr>";
        die("Error: " . $e->getMessage());
    }
    return $conexion;
}
