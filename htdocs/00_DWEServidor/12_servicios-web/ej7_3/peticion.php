<?php
$url = "http://localhost//00_DWEServidor/12_servicios-web/_ejemplos/productos/consultaProductos.php";
if (isset($_REQUEST['filtraPrecio'])) {
    $parametros = '?min=' . $_REQUEST['min'] . '&max=' . $_REQUEST['max'];
    mostrarDatos($url, $parametros);
} else if (isset($_REQUEST['filtraNombre'])) {
    $parametros = "?nombre=" . $_REQUEST['nombre'];
    mostrarDatos($url, $parametros);
} else if (isset($_REQUEST['insertar'])) {
    $datos = ["nombre" => $_REQUEST['nombre'], "precio" => $_REQUEST['precio'], "stock" => $_REQUEST['stock']];
    pideServicio($url, $datos, "POST");
} else if (isset($_REQUEST['borrar'])) {
    $datos = ["nombre" => $_REQUEST['nombre']];
    pideServicio($url, $datos, "DELETE");
} else if (isset($_REQUEST['stock'])) {
    $datos = ["nombre" => $_REQUEST['nombre'], "cantidad" => $_REQUEST['cantidad']];
    pideServicio($url, $datos, "PUT");
}
function mostrarEstado($codEstado, $mensaje)
{
    echo "STATUS: " . $codEstado;
    echo "<br>" . $mensaje;
}
function mostrarDatos($url, $parametros)
{
    $data = @file_get_contents($url . $parametros);
    $respuesta = json_decode($data);
    $codEstado = substr($http_response_header[0], 9, 3);
    $mensaje = substr($http_response_header[0], 13);
    if ($codEstado == 200) {
        echo "<table border='1'><tr><th>Nombre</th><th>Precio</th><th>stock</th></tr>";
        foreach ($respuesta as $producto) {
            echo "<tr><td>" . $producto->nombre . "</td>";
            echo "<td>" . $producto->precio . "</td>";
            echo "<td>" . $producto->stock . "</td></tr>";
        }
        echo "</table>";
    } else {
        mostrarEstado($codEstado, $mensaje);
    }
    echo "<a href='index.php'><h3>VOLVER A LA PÁGINA DE CONSULTAS</h3></a>";
}
function pideServicio($url, $datos, $metodo)
{
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => $metodo,
            "content" => http_build_query($datos)
        ],
    ];
    $contexto = stream_context_create($opciones);
    @file_get_contents($url, false, $contexto);
    $codEstado = substr($http_response_header[0], 9, 3);
    $mensaje = substr($http_response_header[0], 13);
    mostrarEstado($codEstado, $mensaje);
}
