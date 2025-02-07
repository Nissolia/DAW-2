
<?php
// funcion comoda
function kelvinToCelsius($kelvin)
{
    return round(($kelvin - 273.15), 2);
}
// datos a usar
$ciudades = [
    "Cádiz,Spain",
    "Madrid,Spain",
    "Valencia,Spain",
    "Sevilla,Spain",
    "Malaga,Spain",
    "Murcia,Spain",
    "Bilbao,Spain",
    "Zaragoza,Spain",
    "Barcelona,Spain"
];


// miramos la ciudad
if (isset($_REQUEST['ciudad'])) {

    $tituloPag = "El tiempo en " . $_REQUEST['ciudad'];
    $query = urlencode($_REQUEST['ciudad']);
    // cielo humedad nivelMar presion viento nubes
    $ciudad = $query;
    // volcamos los datos si los tenemos
    $datos = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q={$ciudad}&appid=60940607e5ea693bd7d0d7008c876bd5");
} else {
    $tituloPag = "Selecciona una ciudad ";
}
// datos si se ha seleccionado una ciudad
if (isset($datos)) {
    $tiempo = json_decode($datos);
    $imprimir =  "Temperatura: " . kelvinToCelsius($tiempo->main->temp) . "ºC<br>";
} else {
    $imprimir = "";
}
// $active = $_POST['proActive'] == 1 ? true : false;

if (isset($_REQUEST['humedad'])) {
    $imprimir .= " Humedad: " . $tiempo->main->humidity . "%<br>";
}
if (isset($_REQUEST['nubes'])) {
    $imprimir .= " Nubes: " . $tiempo->clouds->all . "%<br>";
}

if (isset($_REQUEST['presion'])) {
    $imprimir .= "Presión: " . $tiempo->main->pressure . "mb<br>";
}
if (isset($_REQUEST['viento'])) {
    $imprimir .= "Velocidad: " . $tiempo->wind->speed . "km/h<br>
    Grados: " . $tiempo->wind->deg . "º<br>";
}
if (isset($_REQUEST['nivelMar'])) {
    $imprimir .= " Nivel del mar: " . $tiempo->main->sea_level . "<br>";
}
