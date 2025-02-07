<?php
function actualizarFichero($usuario, $reservas)
{
    $archivo = $usuario . '.rsv';
    $contenido = "";
    
    // La primera línea es la contraseña del usuario, que mantenemos sin modificar
    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
        $contraseña = array_shift($lineas); // Obtenemos la primera línea (contraseña)
        $contenido .= $contraseña . "\n";
    } else {
        // Si el archivo no existe, usa una contraseña predeterminada o genera un error
        $contenido .= "CONTRASEÑA_NO_DEF\n"; // Personaliza este mensaje si es necesario
    }
    
    // Añadir las reservas serializadas
    foreach ($reservas as $reserva) {
        $contenido .= serialize($reserva) . "\n";
    }

    // Escribe todo el contenido al archivo
    file_put_contents($archivo, $contenido);
}

function añadirFichero($usuario, $reserva)
{
    $archivo = $usuario . '.rsv';
    
    // Si el archivo no existe, genera un error
    if (!file_exists($archivo)) {
        die("El archivo del usuario no existe. Asegúrate de crear primero la contraseña.");
    }

    // Añadir una nueva línea para la reserva
    $contenido = serialize($reserva) . "\n";
    file_put_contents($archivo, $contenido, FILE_APPEND);
}
?>
