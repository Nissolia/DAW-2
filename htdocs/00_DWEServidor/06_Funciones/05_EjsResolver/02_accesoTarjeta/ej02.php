<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Disponemos de 2 tarjetas de coordenadas para controlar el acceso a una web. Cada tarjeta corresponde a un
perfil de usuario ‘admin’ o ‘estandar’, cada número número registrado en la tarjeta se identifica por su fila (de
la 1 a la 5) y su columna (de la A a la E). Los valores registrados en cada tarjeta son fijos y os lo podéis inventar.
Crea una página principal que sirva de control de acceso a una segunda página. Se pedirá el perfil de usuario
(admin o estándar) y una clave aleatoria correspondiente a la tarjeta de coordenadas de su perfil (fila y
columna), se comprobará si es correcto usando 2 funciones: dameTarjeta() a la que se le pasa el perfil y
devuelve una matriz correspondiente a la tarjeta de coordenadas de ese perfil, y compruebaClave() a la que se
le pasa la matriz de coordenadas, las coordenadas y un valor, y devolverá un booleano según sea correcto el
valor en la matriz de coordenadas. Ambas funciones estarán almacenadas en una librería controlAcceso.php.
Si el usuario se ha identificado correctamente se muestra un enlace de acceso a la página protegida (cualquiera)
y si no mostrará un enlace para volver a intentarlo de nuevo.
Usar una tercera función imprimeTarjeta() que recibe una tarjeta y devuelve el código html correspondiente a
una tabla con el el valor de todas las coordenadas. (imprimir las tarjetas de cada perfil en la página de acceso
para poder comprobar el correcto funcionamiento de la página) -->
<!-- ------------------------------------------------------------------------------- -->
<!-- debajo de la tabla pone introduce la siguiente coordenada  fila X y columna y J
 hay que poner la coordenada correcta
 se ponen las letras al inicio y debe de pedirte cosas diferentes 
de manera oculta se envia la fila y columna de manera oculta -->

<?php
require 'controlAcceso.php';

// Variables de mensajes
$mensaje = "";

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $perfil = $_POST['perfil'];
    $fila = $_POST['fila'];
    $columna = $_POST['columna'];
    $valorIngresado = $_POST['valor'];

    // Obtener la tarjeta correspondiente al perfil
    $tarjeta = dameTarjeta($perfil);

    // Comprobar si el valor ingresado es correcto
    if (compruebaClave($tarjeta, $fila, $columna, $valorIngresado)) {
        $mensaje = "<p>Acceso concedido. <a href='pagina_protegida.php'>Ir a la página protegida</a></p>";
    } else {
        $mensaje = "<p>Clave incorrecta. <a href='index.php'>Inténtalo de nuevo</a></p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Acceso</title>
</head>
<body>
    <h1>Control de acceso</h1>
    
    <form method="POST">
        <label for="perfil">Perfil:</label>
        <select name="perfil" id="perfil" required>
            <option value="admin">Admin</option>
            <option value="estandar">Estandar</option>
        </select><br>
        
        <label for="fila">Fila:</label>
        <input type="text" name="fila" id="fila" required>
        
        <label for="columna">Columna:</label>
        <input type="text" name="columna" id="columna" required>
<br>
        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" required>
        
        <button type="submit">Acceder</button>
    </form>

    <?php
    echo $mensaje;

    // Muestra las tarjetas de ambos perfiles para verificación
    echo "<h2>Tarjeta Admin</h2>";
    echo imprimeTarjeta(dameTarjeta('admin'));

    echo "<h2>Tarjeta Estandar</h2>";
    echo imprimeTarjeta(dameTarjeta('estandar'));
    ?>
</body>
</html>



</body>
</html>