<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$_SESSION['Pruebas'] = "Prueba ";
for ($i = 0; $i < 10; $i++) {
    $_SESSION['textolargo'] =    $_SESSION['Pruebas'] . $i;
}
header('Location:'.getenv('HTTP_REFERER'));
