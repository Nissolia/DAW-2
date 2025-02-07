<!-- unset sirve para borrar un espacio del array > tarjeta[i] -->

<?php
// Función que devuelve una matriz de coordenadas según el perfil
function dameTarjeta($perfil) {
    // tarjeta asociativa para añadir las cosas
    $tarjetaAdmin = [
        ['','1', '2', '3', '4'],
        ['A', '122', '366', '455', '666'],
        ['B', '555', '666', '444', '999'],
        ['C', '009', '000', '123', '988'],
        ['D', '222', '655', '888', '012']
    ];

    $tarjetaEstandar = [
        ['','1', '2', '3', '4'],
        ['A', '123', '111', '999', '888'],
        ['B', '321', '122', '255', '066'],
        ['C', '456', '788', '658', '258'],
        ['D', '789', '000', '666', '112']
    ];

    return $perfil === 'admin' ? $tarjetaAdmin : $tarjetaEstandar;
}

// Función que comprueba si el valor ingresado es correcto en la matriz de coordenadas
function compruebaClave($tarjeta, $fila, $columna, $valor) {
    // Mapea las filas y columnas en índices numéricos para la matriz
    $filaIndice = intval($fila) - 1;
    $columnaIndice = ord(strtoupper($columna)) - ord('A');

    // Verifica que el valor ingresado coincida con el de la tarjeta en las coordenadas especificadas
    return isset($tarjeta[$filaIndice][$columnaIndice]) && $tarjeta[$filaIndice][$columnaIndice] === $valor;
}

// Función que imprime una tarjeta en una tabla HTML
function imprimeTarjeta($tarjeta) {
    $html = "<table border='1'>";
    foreach ($tarjeta as $fila) {
        $html .= "<tr>";
        foreach ($fila as $valor) {
            $html .= "<td>{$valor}</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}
?>
