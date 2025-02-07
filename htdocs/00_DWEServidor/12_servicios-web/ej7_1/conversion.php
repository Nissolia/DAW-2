<?php
function convertir($cantidad, $tipo) {
    $tasa_conversion = 166.386; // 1 euro = 166.386 pesetas

    if ($tipo == "euros") {
        return $cantidad / $tasa_conversion . " euros";
    } else if ($tipo == "pesetas") {
        return $cantidad * $tasa_conversion . " pesetas";
    } else {
        return "Error: Debes indicar 'euros' o 'pesetas'.";
    }
}

?>
