<!DOCTYPE html>
<html lang="es">

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

    <?php
    // a la hora de guardar la comida para mostrarla, hay que almacenarla en un array con
    // toda la comida que tenemos, se hace esto para que podamos poner un elemento vacío
    $almacenComida = [];
    // array con los tipos de comida que tenemos y los ingredientes disponibles
    $comida = [
        "Pizza" => ["Jamon", "Atun", "Bacon", "Pepperoni", "Queso", "Champiñones"],
        "Hamburguesa" => ["Lechuga", "Tomate", "Queso", "Huevo", "Cebolla"],
        "Perrito" => ["Cebolla", "Mostaza", "Ketchup", "Extra"],
        "Serranito" => ["Pimiento", "Jamon", "Tortilla", "Mayonesa", "Filete", "Lechuga"]
    ];

    // array del pedido completo
    $pedidoCompleto = [];
  
    if (isset($_REQUEST['pedidoCodificado'])) {
        // si hay algo codificado nos lo guardamos en el array que tenemos listo
        $pedidoCompleto = unserialize(base64_decode($_REQUEST['pedidoCodificado']));
    }

    // si hay un pedido nuevo
    if (isset($_REQUEST['pedido'])) {
        //a la hora de que se envie el pedido quiero que se guarde en una array normal, que sea dentro del array tal que asi: ["perrito","ketchup","extra"] para luego poder manipularlo más comodamente
        foreach ($_REQUEST['pedido'] as $tipoComida => $ingredientesSeleccionados) {
          foreach ($ingredientesSeleccionados as $dato) {
            $pedidoComida[]=$tipoComida.$dato;
          }

          
            if (!isset($pedidoCompleto[$tipoComida])) {
                $pedidoCompleto[$tipoComida] = [];
            }
            $pedidoCompleto[$tipoComida][] = $ingredientesSeleccionados;
        }
    }

    // Codificar el pedido completo para mantenerlo en el formulario
    $pedidoCodificado = base64_encode(serialize($pedidoCompleto));

    // Si se ha pulsado el botón de ver pedido,
    // a la hora de hacer el pedido ha de mostrarse elpedido pero no quiero que se repita en la página que el ingrediente es el mismo nombre que el tipo de comida, que este solo salga si es algo diferente a este
   //lo ideal seria hacerlo sin tabla
    if (isset($_REQUEST['verPedido'])) {
        echo "<h2>Pedido final</h2>";
        if (count($pedidoCompleto) != 0) {
            echo "<table class='table'>";
            echo "<tr><th class='td'>Comida</th><th class='td'>Ingredientes</th></tr>";
            foreach ($pedidoCompleto as $tipoComida => $listaIngredientes) {
                foreach ($listaIngredientes as $ingredientes) {
                    echo "<tr>";
                    echo "<td class='td'>" . $tipoComida . "</td>";
                    if ( $tipoComida != $ingredientes) {
                        echo "<td class='td'>" . implode(", ", $ingredientes) . "</td>";
                    }else{
                         echo "<td class='td'>" . "Sin ingredientes" . "</td>";

                     }
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