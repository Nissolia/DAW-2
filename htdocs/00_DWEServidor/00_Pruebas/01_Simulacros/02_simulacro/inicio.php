<?php 
if(session_status() === PHP_SESSION_NONE) session_start();
$mensaje = "";
$usuContra = false;
if (isset($_COOKIE['usuario'])) {
   $_SESSION['usuario'] = $_COOKIE['usuario'];
   $_SESSION['contrasena'] = $_COOKIE['contrasena'];
}
// si la contraseña es incorrecta se mete aqui
if (isset($_REQUEST['contrasena'])) {
    $lineas = file("usuarios.txt");
    
    
    // print_r($lineas);  // para ver que contiene el array 
    foreach ($lineas as $array => $valor) {
        //print_r($array);//esto es lo que contiene el index
        // print_r($valor); //la info que tiene el array
        // devuelve la posicion del index donde esta ese elemento
        $posicionComa = strpos($valor,",");
        // tomamos el usuario y la contraseña del substr
        $usuario = substr($valor, 0, ($posicionComa));
        $contrasena = substr($valor, ($posicionComa+1));
        if ($usuario == $_REQUEST['usuario'] && $contrasena == $_REQUEST['contrasena'] ) {
            $usuContra = true;
        }
    }
    
    if (!$usuContra) {
        $mensaje = "<p style='color:red;'>Contraseña incorrecta</p>";
    }else{
       
        if (isset($_REQUEST['recordarContra'])) {
           setcookie("usuario",$_REQUEST['usuario']  , strtotime("now"));
           setcookie("contrasena",$_REQUEST['contrasena']  , strtotime("now"));
        }
        $mensaje = ""; 
        $_SESSION['usuario'] = $_REQUEST['usuario'];
        $_SESSION['contrasena'] = $_REQUEST['contrasena'];
    }
 
}
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
 }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>

<body>
    <h1>MAS QUE NOTAS</h1>
    <h2>Notas accesibles en cualquier lugar</h2>

    <hr>
    <h3>Inicia sesion para ver el panel de notas</h3>
    <form action="" method="post">
        USUARIO: <input type="text" name="usuario"><br>
        CONTRASEÑA: <input type="password" name="contrasena"><br>
        <input type="checkbox" name="recordarContra"> Recordar contraseña<br>
        <input type="submit" value="Aceptar">
    </form>
    <!-- mensaje por si la sesion no es correcta -->
    <?= $mensaje ?>
    <hr>
<h3>Registrate, es gratis</h3>
<form action="registro.php" method="post">
  <input type="hidden" name="registrarse">
  <input type="submit" value="Registrarse">
</form>
</body>

</html>