<?php
require_once '../Model/Incidencia.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();

$data['incidencias'] = Usuario::getIncidenciasResueltasByAdmin($_SESSION['usuario']->getId());

// Pasar los datos a la vista
include '../View/historico_v.php';
