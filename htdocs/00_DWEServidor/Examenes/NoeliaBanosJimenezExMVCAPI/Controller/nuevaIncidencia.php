<?php
require_once '../Model/Incidencia.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();

$data['fechaActual'] = date("Y/m/d", strtotime("now"));

// Pasar los datos a la vista
include '../View/incidencia_v.php';
