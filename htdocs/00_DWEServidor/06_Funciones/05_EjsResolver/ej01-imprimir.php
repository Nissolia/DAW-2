<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 Imprimir</title>
    <style>
        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body> <!-- Crear una página web para generar de manera aleatoria una combinación de apuesta en la lotería primitiva. Se
pedirán 6 números (entre 1 y 49) y el número de serie (entre 1 y 999). El usuario podrá rellenar los números
pedidos que desee, dejando en blanco el resto, de modo que la combinación generada respete los números
elegidos y genere aleatoriamente el resto hasta completar la combinación (el número de serie también es
opcional). El usuario también podrá rellenar de manera opcional una caja de texto como título para su
combinación.

Crear una función combinacion() que sea llamada para generar la combinación en función de los parámetros
recibidos y devuelva el array generado.
Crear una función imprimeApuesta() que reciba un array y un texto, y devuelva una cadena con el código hml
de una tabla con 2 filas, la primera fila con el texto y la segunda con el array recibido. Usaremos esta función
para mostrar el resultado de la combinación generada. Si la función no recibe ningún texto como título en la
primera fila incluirá el texto "Combinación generada para la Primitiva". -->
    <?php
    // Función para generar la combinación de la Primitiva
    function combinacion($num)
    {
        // Crear un array vacío para los números de la combinación
        $combinacion = [];

        // Comprobar y generar números aleatorios si no se ha rellenado un número
        for ($i=0; $i < 6; $i++) { 
            $combinacion[] = isset($num[$i]) ? $num[$i] : rand(1, 49);
        }
        
        $combinacion[] = isset($n2) ? $n2 : rand(1, 49);
        $combinacion[] = isset($n3) ? $n3 : rand(1, 49);
        $combinacion[] = isset($n4) ? $n4 : rand(1, 49);
        $combinacion[] = isset($n5) ? $n5 : rand(1, 49);
        $combinacion[] = isset($n6) ? $n6 : rand(1, 49);

        // Generar número de serie aleatorio si no se ha proporcionado
        $combinacion['serie'] = isset($serie) ? $serie : rand(1, 999);

        // Retornar el array con los números de la combinación
        return $combinacion;
    }

    // Función para imprimir la apuesta en una tabla
    function imprimeApuesta($combinacion, $titulo = null)
    {
        // Si no se ha proporcionado un título, usar uno por defecto
        if ($titulo == null) {
            $titulo = "Combinación generada para la Primitiva";
        }

        // Crear el HTML para la tabla
        $tabla = "<table>";
        $tabla .= "<tr><th colspan='7'>" . ($titulo) . "</th></tr>";
        $tabla .= "<tr>";

        // Añadir los números de la combinación
        for ($i = 0; $i < 6; $i++) {
            $tabla .= "<td >" . ($combinacion[$i]) . "</td>";
        }

        // Añadir el número de serie
        $tabla .= "<td >Serie: " . ($combinacion['serie']) . "</td>";
        $tabla .= "</tr>";
        $tabla .= "</table>";

        // Retornar la tabla generada
        return $tabla;
    }
    // Verificar si se ha enviado el formulario
    if (isset($_POST['generar'])) {
        // Obtener los valores ingresados por el usuario
        $n1 = !empty($_POST['n1']) ? (int)$_POST['n1'] : null;
        $n2 = !empty($_POST['n2']) ? (int)$_POST['n2'] : null;
        $n3 = !empty($_POST['n3']) ? (int)$_POST['n3'] : null;
        $n4 = !empty($_POST['n4']) ? (int)$_POST['n4'] : null;
        $n5 = !empty($_POST['n5']) ? (int)$_POST['n5'] : null;
        $n6 = !empty($_POST['n6']) ? (int)$_POST['n6'] : null;
        $serie = !empty($_POST['serie']) ? (int)$_POST['serie'] : null;
        $titulo = !empty($_POST['titulo']) ? $_POST['titulo'] : null;

        // Generar la combinación
        $combinacionGenerada = combinacion($n1, $n2, $n3, $n4, $n5, $n6, $serie);

        // Mostrar la combinación usando la función imprimeApuesta
        echo imprimeApuesta($combinacionGenerada, $titulo);
    } else {
        // Redirigiendo a pagina principal
        header("Location: ej01.php");
    }
    ?>
    <a href="ej01.php"> Volver</a>

</body>

</html>