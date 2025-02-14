<?php
require_once '../Model/Incidencia.php';
require_once '../Model/Usuario.php';
const RUTA = "http://localhost//00_DWEServidor/Examenes/NoeliaBanosJimenezExMVCAPI/Service/servicio.php";

// consultar el historico de incidencias resueltas - devuelve array de objetos
// con descripcion reparador y fecha. si no hay nada similar se devuelve el error
// 404 y mensaje informativo

if (!isset($_REQUEST['token'])) {
    $mensaje = "FALTA TOKEN DE ACCESO";
    $codEstado = 400;
} else if (!isset($_REQUEST['user'])) {
    $mensaje = "FALTA EL USUARIO";
    $codEstado = 400;
} else {
    // miramos las incidencias resueltas
    if (count(Incidencia::getIncidenciasResueltas()) > 0) {
        $incidencias = Incidencia::getIncidenciasResueltas();
        foreach ($incidencias as $incidencia) {
            // con este se obtiene el id del admin
            $admin = Usuario::getUsuarioById($incidencia->getAdmin());
            // descripcion, reparador y fecha
            $devolver[] = ['descripcion' => $incidencia->getDescripcion(), 'reparador' => $admin->getNombre(), 'fecha' => $incidencia->getFecha()];
        }
    } else {
        $mensaje = "NO EXISTE NINGUNA INCIDENCIA";
        $codEstado = 404;
    }
}
if (isset($_REQUEST['propietario']) && isset($_REQUEST['destinatario'])) {
    // Usuario::getAdminById($_REQUEST['propietario'])
    // Usuario::getAdminById($_REQUEST['destinatario'])

    if (Usuario::getUsuarioById($_REQUEST['propietario']) ||  Usuario::getUsuarioById($_REQUEST['destinatario'])) {

        if (Usuario::getAdminById($_REQUEST['propietario']) ||  Usuario::getAdminById($_REQUEST['destinatario'])) {
            Usuario::cambioAdminIncidenciasAdmins($_REQUEST['propietario'], $_REQUEST['destinatario']);
        } else {
            // si alguno de los dos no existe
            $mensaje = "ESE USUARIO NO TIENE EL PERFIL";
            $codEstado = 409;
        }
    } else {
        $mensaje = "NO EXISTE ALGUN USUARIO O";
        $codEstado = 404;
    }
}



// peticion para asignar todas las incidencias en estado reparando de un usuario a otro
//  usuario distinto. recibe como parametro propietario(id admin profe) destinatoario id 
//  del admin que la recibe. si no existe alguno devolver el 404 si uno no tene perfil 
//  devuelve 409

// lo que se devuelve al final
header("HTTP/1.1 $codEstado $mensaje");
header("Content-Type: application/json;charset=utf-8");
echo json_encode($devolver);
