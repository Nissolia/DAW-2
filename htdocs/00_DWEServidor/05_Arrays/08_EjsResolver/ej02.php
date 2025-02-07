<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Realizar una página web para realizar pedidos de comida rápida. Tenemos varios tipos de
comida: Pizza: jamon, atun, bacon, pepperoni; Hamburguesa: lechuga, tomate, queso; Perrito
caliente: lechuga, cebolla, patata; etc (la carta con todas las comidas y sus ingredientes estará
almacenada en un array). A través de formularios distintos, uno para cada tipo de comida se va
añadiendo comida al pedido con sus respectivos ingredientes, hasta que se pulse el botón
finalizar pedido (en otro formulario), con lo que se mostrará el pedido completo en una tabla,
con toda la comida y los ingredientes seleccionados de cada una. Usa la función serialize() y
unserialize() para pasar arrays como cadenas Nota: con arrays de 2 dimensiones la serialización
se corrompe, así que hay que usar la función en combinación con otra de la siguiente forma:
$cadenaTexto=base64_encode(serialize($array));
$array=unserialize(base64_decode($cadenaTexto));  -->

    <!-- lo importante de esta parte es que cada vez que el usuario selecciona una
    pizza o lo que sea, este se guarda en hidden, para que cada vez que recarge 
    la página esto se guarde de una forma en la que el usuario no lo vea visualmente,
    y al final a darle al boton de ver pedido se vean todos los productos que la 
    persona ha seleccionado, deben de poder repetirse pizza, hamburgesa o lo que sea, es 
    necesario que deje que el usuario pueda añadir cosas repetidas -->
    <!-- Página para realizar pedidos de comida rápida. -->

    <?php
    // a la hora de guardar la comida para mostrarla, hay que almacenarla en un array con
    // toda la comida que tenemos, se hace esto para que podamos poner un elemento vacío
    $almacenComida = [];
    // array con los tipos de comida que tenemos y los ingredientes disponibles
    $comida = [
        "pizza" => ["jamon", "atun", "bacon", "pepperoni", "queso", "champiñones"],
        "hamburguesa" => ["lechuga", "tomate", "queso", "huevo", "cebolla"],
        "perrito" => ["cebolla", "mostaza", "ketchup", "extra"],
        "serranito" => ["pimiento", "jamon", "tortilla", "mayonesa", "filete", "lechuga"]
    ];

    // Array para almacenar el pedido completo
    $pedidoCompleto = [];

    // Si hay un pedido codificado previo, lo cargamos
    if (isset($_POST['pedidoCodificado'])) {
        $pedidoCompleto = unserialize(base64_decode($_POST['pedidoCodificado']));
    }

    // Si se añade un nuevo pedido
    if (isset($_POST['pedido'])) {
        foreach ($_POST['pedido'] as $tipoComida => $ingredientesSeleccionados) {
            if (!isset($pedidoCompleto[$tipoComida])) {
                $pedidoCompleto[$tipoComida] = [];
            }
            $pedidoCompleto[$tipoComida][] = $ingredientesSeleccionados;
        }
    }

    // Codificar el pedido completo para mantenerlo en el formulario
    $pedidoCodificado = base64_encode(serialize($pedidoCompleto));

    // Si se ha pulsado el botón de ver pedido
    if (isset($_POST['verPedido'])) {
        echo "<h2>Pedido final</h2>";
        if (count($pedidoCompleto) != 0) {
            echo "<table class='table'>";
            echo "<tr><th class='td'>Comida</th><th class='td'>Ingredientes</th></tr>";
            foreach ($pedidoCompleto as $tipoComida => $listaIngredientes) {
                foreach ($listaIngredientes as $ingredientes) {
                    echo "<tr>";
                    echo "<td class='td'>" . $tipoComida . "</td>";
                    // if ( $tipoComida == $ingredientes) {
                    echo "<td class='td'>" . implode(", ", $ingredientes) . "</td>";
                    // }
                    echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            echo "<p>No se ha añadido nada al pedido.</p>";
        }
    } else {
    ?>
        <h1>Comida rápida</h1>
        <hr>
        <?php
        // Recorremos el array de comida para generar los formularios de selección
        foreach ($comida as $tipoComida => $ingredientes) {
            echo "<form action='ej02.php' method='post'>";
            echo "<h2>" . ($tipoComida) . "</h2>"; // Mostrar el tipo de comida

            foreach ($ingredientes as $ingrediente) {
                // Mantener la línea original con un campo oculto adicional
                echo "<input type='hidden' name='pedido[$tipoComida][]' value='$tipoComida'>";
                echo "<input type='checkbox' name='pedido[$tipoComida][]' value='$ingrediente'> $ingrediente <br>";
            }

            // Incluir el pedido ya codificado en un campo oculto
            echo "<input type='hidden' name='pedidoCodificado' value='$pedidoCodificado'>";
            echo "<input class='boton' type='submit' value='Añadir $tipoComida al pedido'>";
            echo "<hr>";
            echo "</form>";
        }
        ?>

        <!-- Formulario para ver el pedido final -->
        <form action="ej02.php" method="post">
            <input type='hidden' name='pedidoCodificado' value='<?php echo $pedidoCodificado; ?>'>
            <input class='boton' type="submit" name="verPedido" style='background-color: rgb(64, 64, 158);' value="VER PEDIDO COMPLETO">
        </form>

    <?php
    }
    ?>
</body>

</html>