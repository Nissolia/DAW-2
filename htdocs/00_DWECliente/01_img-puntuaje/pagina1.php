<?php
header('Content-Type: text/html; charset=utf-8');
$ar=fopen("puntaje.txt","a") or
  die("No se pudo abrir el archivo");
fputs($ar,"Nombre:".$_REQUEST['nombre']."<br>");
fputs($ar,"Voto:".$_REQUEST['puntaje']."<br><br>");
fclose($ar);
$ar=fopen("puntaje.txt","r") or
  die("No se pudo abrir el archivo");
while (!feof($ar))
{
  $linea=fgets($ar);
  echo $linea;
}
fclose($ar);
?>